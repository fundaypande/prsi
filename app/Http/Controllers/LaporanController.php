<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daftar;
use App\Atlit;
use App\Lomba;
use App\Umur;

class LaporanController extends Controller
{
    public function index(){
      return view('laporan.laporan');
    }

    public function starting(){
      $daftar = Daftar::all();
      return view('laporan.starting');
    }

    public function indexAjax(Request $request)
    {
        $posts = Daftar::join('atlits', function ($join) {
            $join->on('atlits.id', '=', 'daftars.user_id')
                 ->where('atlits.sekolah_id', '=', 5);
                  })->paginate(10);


        return response()->json($posts);
    }
}
