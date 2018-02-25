<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class UserController extends Controller
{
  public function showPass(){
    return view('auth.passwords.update');
  }

  public function show(){
      $users = User::orderBy('role','asc')->paginate(10);

      return view('admin.users.user', compact('users'));
    }

  public function updatePass(Request $request){
    $this -> validate($request, [
      'oldpass' => 'required|string|min:6',
      'password' => 'required|string|min:6|confirmed',
          ]);

    $request_data = $request->All();
    $current_password = Auth::User()->password;
    if(Hash::check($request_data['oldpass'], $current_password))
      {
        $id = Auth::User() -> id;
        $user = User::findOrFail($id);
        $user -> update([
          'password' => bcrypt($request -> password)
        ]);
        Auth::logout();
        return redirect('/login')->with('msg','Password berhasil dirubah silahkan login kemabli');
      }
      else
      {
        return redirect('profile/pass')->with('msg-warning','Password lama salah');
      }

  }

  public function profile($id = null){
      $idSum = null;
      if($id == null){
        $users = User::findOrFail(Auth::User() -> id);
      } else {
        if(Auth::User() -> id == $id)
          return redirect('profile');
        $users = User::findOrFail($id);
      }

      return view('user.profile', compact('users'));
    }

    public function update(Request $request, $id){
      $user = User::findOrFail($id);

      $this -> validate($request, [
              'name' => 'required|min:3',
              'email' => 'required|min:3|email',
              'sekolah' => 'required|min:1',
              'telepon' => 'required|min:3',
            ]);
      if(Auth::User() -> id == $user -> id){
        $user -> update([
          'name' => $request -> name,
          'email' => $request -> email,
          'phone' => $request -> telepon,
          'school' => $request -> sekolah,
        ]);
      } else abort(404);


      return redirect('profile')->with('msg', 'Data Profile Berhasil Diedit');

    }

    public function updatePic(Request $request, $id)
    {
      $this -> validate($request, [
              'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

      $user = User::findOrFail($id);

        $input = $request->gambar;
        $input = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move('gambar/', $input);

        $oldPic = $user -> gambar;
        if($oldPic != null){
          $image_path = 'gambar/'.$oldPic;
          if(file_exists($image_path)){
              unlink($image_path);//unlink untuk menghapus foto lama pada saat proses create and store
          }
        }

        $user -> update([
          'gambar' => $input,
        ]);

      return redirect('profile')->with('msg', 'Berhasil ubah foto profile');
      //return response()->json(['error'=>$validator->errors()->all()]);
    }

    //merubah role admin
    public function role($id, $stat){
      $user = User::findOrFail($id);
      if(Auth::user()->id == $id){
        return redirect('admin/user')->with('msg-warning', 'Anda tidak bisa merubah role anda sendiri');
      }

      $role = '1';
      if($stat == '1')
        $role = '0';

      $user -> update([
        'role' => $role,
      ]);

      return redirect('admin/user')->with('msg', 'Berhasil rubah role user');
    }

    public function destroy($id){
      if(Auth::user()->id == $id){
        return redirect('admin/user')->with('msg-warning', 'Anda tidak boleh menghapus data user anda sendiri');
      }
      $user = User::findOrFail($id);
          $user -> delete();
        return redirect('admin/user')->with('msg', 'Data user berhasil di hapus');
    }
}
