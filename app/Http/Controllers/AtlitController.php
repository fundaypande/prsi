<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atlit;

class AtlitController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function myPosts()
  {
      return view('atlit.atlit');
  }

  public function search(Request $request)
  {
      $posts = Atlit::with(['user','sekolah'])
              ->where('name','like','%'.$request->sub.'%')
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
      $posts = Atlit::with(['user','sekolah'])->latest()->paginate(10);
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
      $post = Atlit::create($request->all());
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
      $post = Atlit::find($id)->update($request->all());
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
      Atlit::find($id)->delete();
      return response()->json(['done']);
  }
}
