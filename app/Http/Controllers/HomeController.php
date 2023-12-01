<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        $data = DB::select('
        SELECT users.*, transaksi.*, sepatu.*
        FROM users
        INNER JOIN transaksi ON users.id = transaksi.id_user
        INNER JOIN sepatu ON transaksi.id_sepatu = sepatu.id_sepatu
        WHERE sepatu.deleted_at IS NULL
        ORDER BY transaksi.tanggal_transaksi DESC
        LIMIT 5

        ');
        // dd($data);

    return view('home')->with('data', $data);
    }
}
