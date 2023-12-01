<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BikeController extends Controller
{
    public function index(Request $request) {
        $sortBy = $request->input('sort_by', 'alphabet');
        $sortColumn = 'nama_sepatu';
        $sortDirection = 'DESC';
        $searchTerm = $request->input('search', '');

        switch ($sortBy) {
            case 'alphabet':
                $sortColumn = 'nama_sepatu';
                $sortDirection = 'ASC';
                break;
            case 'reversed':
                $sortColumn = 'nama_sepatu';
                $sortDirection = 'DESC';
                break;
        }

        $data = DB::select("
        SELECT *
        FROM sepatu
        WHERE sepatu.deleted_at IS NULL
        ORDER BY $sortColumn $sortDirection
    ");

    if ($searchTerm !== '') {
        $data = DB::select("
        SELECT *
        FROM sepatu
        WHERE sepatu.nama_sepatu LIKE '%$searchTerm%'
        AND sepatu.deleted_at IS NULL
        ORDER BY $sortColumn $sortDirection
        ");
    }
        return view ('sepatu.listsepatu')->with('data', $data);
    }

    public function createBikePage() {
        $data = DB::select("
        SELECT *
        FROM sellers
        ");
        return view ('sepatu.createshoes')->with('data', $data);
    }

    public function createBike(Request $request) {
        $request->validate([
            'merek_sepatu' => 'required',
            'jenis_sepatu' => 'required',
            'nama_sepatu' => 'required',
            'masa_garansi' => 'required|numeric',
            'harga' => 'required',
            'id_penjual' => 'required'
        ]);

        DB::insert("
        INSERT INTO sepatu (merek_sepatu, jenis_sepatu, nama_sepatu, masa_garansi, harga, id_penjual)
        VALUES (?, ?, ?, ?, ?, ?)
        ", [
        $request->merek_sepatu,
        $request->jenis_sepatu,
        $request->nama_sepatu,
        $request->masa_garansi,
        $request->harga,
        $request->id_penjual,
    ]);

    return redirect()->route('bikeIndex');
    }

    public function editBikePage($id) {
        $data = DB::select("
        SELECT *
        FROM sellers
        ");

        $currentdata = DB::select("
        SELECT *
        FROM sepatu
        WHERE id_sepatu = $id
        ");

        $currentdata = $currentdata[0];
        return view ('sepatu.editsepatu')->with('data', $data)->with('currentdata', $currentdata);
    }

    public function editBike(Request $request, $id) {
        $request->validate([
            'merek_sepatu' => 'required',
            'jenis_sepatu' => 'required',
            'nama_sepatu' => 'required',
            'masa_garansi' => 'required|numeric',
            'harga' => 'required',
            'id_penjual' => 'required'
        ]);

        DB::update("
        UPDATE sepatu
        SET merek_sepatu = ?,
            jenis_sepatu = ?,
            nama_sepatu = ?,
            masa_garansi = ?,
            harga = ?,
            id_penjual = ?
        WHERE id_sepatu = ?
    ", [
        $request->merek_sepatu,
        $request->jenis_sepatu,
        $request->nama_sepatu,
        $request->masa_garansi,
        $request->harga,
        $request->id_penjual,
        $id
    ]);

    return redirect()->route('bikeIndex');
    }

    public function deleteBike($id) {
        $date = date("Y-m-d");
        DB::update("
        UPDATE sepatu
        SET deleted_at = '$date'
        WHERE id_sepatu = ?
    ", [
        $id
    ]);

    return redirect()->route('bikeIndex');
    }

    public function trashBikeIndex(Request $request) {
        $sortBy = $request->input('sort_by', 'alphabet');
        $sortColumn = 'nama_sepatu';
        $sortDirection = 'DESC';
        $searchTerm = $request->input('search', '');

        switch ($sortBy) {
            case 'alphabet':
                $sortColumn = 'nama_sepatu';
                $sortDirection = 'ASC';
                break;
            case 'reversed':
                $sortColumn = 'nama_sepatu';
                $sortDirection = 'DESC';
                break;
        }

        $data = DB::select("
        SELECT *
        FROM sepatu
        WHERE sepatu.deleted_at IS NOT NULL
        ORDER BY $sortColumn $sortDirection
    ");

    if ($searchTerm !== '') {
        $data = DB::select("
        SELECT *
        FROM sepatu
        WHERE sepatu.nama_sepatu LIKE '%$searchTerm%'
        AND sepatu.deleted_at IS NOT NULL
        ORDER BY $sortColumn $sortDirection
        ");
    }

        return view ('sepatu.trashsepatu')->with('data', $data);
    }

    public function hardDeleteBike($id) {
        DB::delete("
        DELETE FROM sepatu
        WHERE id_sepatu = ?
    ", [
        $id
    ]);

    return redirect()->route('trashBikeIndex');
    }

    public function recoverBike($id) {

        DB::update("
        UPDATE sepatu
        SET deleted_at = NULL
        WHERE id_sepatu = ?
    ", [
        $id
    ]);

    return redirect()->route('trashBikeIndex');
    }
}
