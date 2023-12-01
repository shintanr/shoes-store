<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellingController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'latest');

        $sortColumn = 'transaksi.tanggal_transaksi';
        $sortDirection = 'DESC';

        $searchTerm = $request->input('search', '');

        switch ($sortBy) {
            case 'alphabet':
                $sortColumn = 'sepatu.nama_sepatu';
                $sortDirection = 'ASC';
                break;
            case 'reversed':
                $sortColumn = 'sepatu.nama_sepatu';
                $sortDirection = 'DESC';
                break;
            case 'latest':
                $sortColumn = 'transaksi.tanggal_transaksi';
                break;
            case 'oldest':
                $sortColumn = 'transaksi.tanggal_transaksi';
                $sortDirection = 'ASC';
                break;
        }

        $data = DB::select("
            SELECT users.*, transaksi.*, sepatu.*, transaksi.harga AS harga_akhir
            FROM users
            INNER JOIN transaksi ON users.id = transaksi.id_user
            INNER JOIN sepatu ON transaksi.id_sepatu = sepatu.id_sepatu
            WHERE sepatu.deleted_at IS NULL
            ORDER BY $sortColumn $sortDirection
        ");

        if ($searchTerm !== '') {
            $data = DB::select("
                SELECT users.*, transaksi.*, sepatu.*, transaksi.harga AS harga_akhir
                FROM users
                INNER JOIN transaksi ON users.id = transaksi.id_user
                INNER JOIN sepatu ON transaksi.id_sepatu = sepatu.id_sepatu
                WHERE sepatu.nama_sepatu LIKE '%$searchTerm%'
                AND sepatu.deleted_at IS NULL
                ORDER BY $sortColumn $sortDirection
            ");
        }

        return view('transaksi.datapenjualan')->with('data', $data);
    }
}
