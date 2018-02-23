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

class GuestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Untuk menangani controller dari user yang ingin melakukan verifikasi
    | Registrasi
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
        $this->middleware('guest');
    }

    //end funday add

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
