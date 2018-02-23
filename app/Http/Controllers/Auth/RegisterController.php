<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verify','role']);
    }

    //funday add
    //import dari Facades

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


        //arahkan ke halaman pemberitahuan untuk melihat email
        return redirect('/status/'.$request -> username);
    }

    //end funday add

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:6|confirmed',
            'school' => 'required|string|min:5',
            'phone' => 'required|string|min:5',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            //'password' => bcrypt($data['password']),
            'school' => $data['school'],
            'phone' => $data['phone'],
            'token' => str_random(20),
            'status' => '0'
        ]);

        //mengirim email imagesetbrush
        Mail::to($user -> email) -> send(new UserRegistered($user));
    }

    public function mustVerify($username){
      $user = User::where('username', $username)
              -> first();
      return view('auth.status', compact('user'));
    }

    public function showVerify($token, $id){

      $user = User::findOrFail($id);

      if($token == $user -> token){
        if($user -> status != '1'){
          return view('auth.verify');
        }
        else dd('Anda Sudah Melakukan Verify');
      } else dd('Token Anda Salah');
    }

    public function verify(Request $request, $token, $id){
      $this -> validate($request, [
        'email' => 'required|string|max:255',
        'password' => 'required|string|min:6|confirmed',
            ]);

      $user = User::findOrFail($id);


      if($token == $user -> token){
        if($user -> status != '1'){
          if($request -> email == $user -> username || $request -> email == $user -> email){
            $user -> update([
                'status' => 1,
                'password' => bcrypt($request -> password)
            ]);
          }

            else dd('Username / Email Salah');
        }
        else dd('Anda Sudah Melakukan Verify');
      } else dd('Token Anda Salah');


      return redirect('/login')->with('msg','berhasil verifikasi silahkan melakukan login kembali dengan password baru');
    }
}
