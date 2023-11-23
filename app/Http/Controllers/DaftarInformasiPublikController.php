<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPublik;
use Yajra\DataTables\Facades\DataTables;

class DaftarInformasiPublikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = InformasiPublik::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . route('daftar-informasi-publik.edit', $data->id) . '" class="btn btn-outline-primary rounded-round"><i class="far fa-plus-square mr-2"></i>Edit</a>
                        <a href="' . route('daftar-informasi-publik.destroy', $data->id) . '" class="btn btn-outline-danger rounded-round delete-data-table"><i class="fas fa-trash mr-2"></i>Hapus</a>
                    </div>';
                })
                ->rawColumns(['action', 'tombol'])
                ->make(true);
        }

        return view('daftar-informasi-publik.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('daftar-informasi-publik');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        InformasiPublik::create([
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('daftar-informasi-publik.index')->with('store', 'oke');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = InformasiPublik::find($id);

        return view('daftar-informasi-publik.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        InformasiPublik::find($id)->update([
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('daftar-informasi-publik.index')->with('edit', 'oke');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        InformasiPublik::destroy($id);
    }
}
