<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        return view('backend.content.kategori.list', compact('kategori'));
    }

    public function tambah()
    {
        return view('backend.content.kategori.formTambah');

    }

    public function prosesTambah(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['Success', 'Berhasil Tambah Kategori']);
        } catch (\Exception $e) {
            return redirect(route('kategori.index'))->with('pesan', ['Danger', 'Gagal Tambah Kategori']);

        }
    }

    public function ubah($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('backend.content.kategori.formUbah', compact('kategori'));

    }

    public function prosesUbah(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        $kategori = kategori::findOrFail($request->id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['Success', 'Berhasil Ubah Kategori']);
        } catch (\Exception) {
            return redirect(route('kategori.index'))->with('pesan', ['Danger', 'Gagal Ubah Kategori']);

        }
    }

    public function hapus($id)
    {
        $kategori = kategori::findOrFail($id);

        try {
            $kategori->delete();
            return redirect(route('kategori.index'))->with('pesan', ['Success', 'Berhasil Hapus Kategori']);
        } catch (\Exception) {
            return redirect(route('kategori.index'))->with('pesan', ['Danger', 'Gagal Hapus Kategori']);

        }
    }

    public function exportPdf()
    {
        $kategori = kategori::all();
        $pdf = Pdf::loadView('backend.content.kategori.export', compact('kategori'));
        return $pdf->download('Data Kategori.pdf');
    }
}

