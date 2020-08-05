<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komik;

class KomikController extends Controller
{
    // menampilkan semua data komik
    public function tampilKomik()
    {
        $komik = \App\Komik::all();

        return response()->json(
            [
                "message" => "berhasil",
                "data" => $komik
            ]
        );
    }

    // menampilkan komik dengan ID tertentu
    public function tampilKomikById($id)
    {
        $komik = \App\Komik::find($id);

        return response()->json(
            [
                "message" => "berhasil",
                "data" => $komik
            ]
        );
    }

    // menambahkan data komik
    public function tambahKomik(Request $request)
    {
        $komik = new \App\Komik;

        $komik->judul = $request->judul;
        $komik->slug = \Str::slug($request->judu);
        $komik->penulis = $request->penulis;
        $komik->penerbit = $request->penerbit;
        $komik->tebal_komik = $request->tebal_komik;
        $komik->harga_sewa = $request->harga_sewa;

        $komik->save();

        return response()->json(
            [
                "message" => "berhasil",
                "data" => $komik
            ]
        );
    }

    // mengubah data komik
    public function ubahKomik(Request $request, $id)
    {
        $komik = \App\Komik::find($id);
        if ($komik) {
            $komik->judul = $request->judul ? $request->judul : $komik->judul;
            $komik->slug = \Str::slug($request->title ? $request->title : $komik->title);
            $komik->penulis = $request->penulis ? $request->penulis : $request->penulis;
            $komik->penerbit = $request->penerbit ? $request->penerbit : $request->penerbit;
            $komik->tebal_komik = $request->tebal_komik ? $request->tebal_komik : $request->tebal_komik;
            $request->harga_sewa = $request->harga_sewa ? $request->harga_sewa : $request->harga_sewa;

            $komik->save();

            return response()->json(
                [
                    "message" => "berhasil",
                    "data" => $komik
                ]
            );
        } else {
            return response()->json(
                [
                    "message" => "Komik dengan ID  " . $id . " tidak ditemukan",
                ]
            );
        }
    }

    // menghapus komik
    public function hapusKomik($id)
    {
        $komik = \App\Komik::find($id);

        if ($komik) {
            $komik->delete();
            return response()->json(
                [
                    "message" => "berhasil",
                ]
            );
        } else {
            return response()->json(
                [
                    "message" => "Komik dengan ID  " . $id . " tidak ditemukan",
                ]
            );
        }
    }
}
