<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DepartemenController extends Controller

{

    public function store(Request $request)
    {

        $kode_dept = $request->kode_dept;
        $nama_dept = $request->nama_dept;

        try {
            $data = [
                'kode_dept' => $kode_dept,
                'nama_dept' => $nama_dept,

            ];
            $simpan = DB::table('departemen')->insert($data);
            if ($simpan) {
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function index(Request $request)
    {
        $nama_dept = $request->nama_dept;
        $query = Departemen::query();
        $query->select('*');
        if (!empty($nama_dept)) {
            $query->where('nama_dept', 'like', '%' . $nama_dept . '%');
        }
        $departemen = $query->get();
        // $departemen = DB::table('departemen')->orderBy('kode_dept')->get();
        return view('departemen.index', compact('departemen'));
    }

    public function edit(Request $request)
    {
        $kode_dept = $request->kode_dept;

        $departemen = DB::table('departemen')->where('kode_dept', $kode_dept)->first();

        return view('departemen.edit', compact('departemen'));
    }

    public function update($kode_dept, Request $request)
    {
        $kode_dept = $request->kode_dept;
        $nama_dept = $request->nama_dept;


        try {
            $data = [
                'kode_dept' => $kode_dept,
                'nama_dept' => $nama_dept,

            ];

            DB::table('departemen')->where('kode_dept', $kode_dept)->update($data);
            return Redirect::back()->with(['success', 'Data Berhasil di Update']);
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning', 'Data Gagal di Update']);
        }
    }

    public function delete($kode_dept)
    {
        $delete = DB::table('departemen')->where('kode_dept', $kode_dept)->delete();
        if ($delete) {
            return redirect::back()->with(['succes' => 'Data Berhasil di hapus']);
        } else {
            return redirect::back()->with(['succes' => 'Data Gagal di hapus']);
        }
    }
}