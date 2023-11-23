<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LinkTerkait;
use Illuminate\Http\Request;
use App\Models\InformasiUmum;
use Yajra\DataTables\Facades\DataTables;

class InformasiUmumController extends Controller
{
    public function visimisi()
    {
        $data = InformasiUmum::where('id', 1)->first();

        return view('visimisi', compact('data'));
    }
    public function storeVisimisi(Request $request)
    {
        InformasiUmum::where('id', 1)->first()->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('visimisi')->with('edit', 'ok');
    }

    public function sosmed()
    {
        $data = InformasiUmum::where('id', 1)->first();

        return view('sosmed', compact('data'));
    }

    public function storeSosmed(Request $request)
    {
        InformasiUmum::where('id', 1)->first()->update([
            'fb' => $request->fb,
            'yt' => $request->yt,
            'ig' => $request->ig,
            'twitter' => $request->twitter,
        ]);

        return redirect()->route('sosmed')->with('edit', 'ok');
    }

    public function kontak()
    {
        $data = InformasiUmum::where('id', 1)->first();

        return view('kontak', compact('data'));
    }

    public function storeKontak(Request $request)
    {
        InformasiUmum::where('id', 1)->first()->update([
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'maps' => $request->maps,
        ]);

        return redirect()->route('kontak')->with('edit', 'ok');
    }
    public function sampul()
    {
        $data = InformasiUmum::where('id', 1)->first();

        return view('sampul', compact('data'));
    }

    public function storeSampul(Request $request)
    {
        if ($request->file('path_gambar')) {
            $path_gambar = $request->file('path_gambar')->storeAs(
                'public/' . Carbon::now()->isoFormat('Y') . '/' . Carbon::now()->isoFormat('MMMM'),
                date('Ymdhis') . '.' . $request->file('path_gambar')->extension()
            );
        }

        InformasiUmum::where('id', 1)->first()->update([
            'path_gambar' => $path_gambar
        ]);

        return redirect()->route('sampul')->with('edit', 'ok');
    }

    public function gantiPassword()
    {
        return view('ganti-password');
    }
}