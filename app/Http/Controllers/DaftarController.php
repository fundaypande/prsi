<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daftar;
use App\Atlit;
use App\Lomba;
use App\Umur;

class DaftarController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function myPosts()
  {
      return view('daftar.daftar');
  }

  public function search(Request $request)
  {
      $posts = Daftar::with(['user','atlit','lomba','umur'])
              ->paginate(10);
      return response()->json($posts);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($sub = null, Request $request)
  {
      $posts = Daftar::with(['user','atlit','lomba','umur'])
                ->paginate(10);
      return response()->json($posts);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $post = Daftar::create($request->all());
      return response()->json($post);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $post = Daftar::find($id)->update($request->all());
      return response()->json($post);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Daftar::find($id)->delete();
      return response()->json(['done']);
  }

  //Controller untuk pengambilan data-data pendaftaran
  public function atlit(){
      $posts = Atlit::all();
      return response()->json($posts);
  }

  public function lomba(){
      $posts = Lomba::all();
      return response()->json($posts);
  }

  public function umur(){
      $posts = Umur::all();
      return response()->json($posts);
  }
}
