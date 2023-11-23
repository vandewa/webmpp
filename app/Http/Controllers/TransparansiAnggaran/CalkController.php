<?php

namespace App\Http\Controllers\TransparansiAnggaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransparansiAnggaran;
use Yajra\DataTables\Facades\DataTables;

class CalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_03')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . route('calk.edit', $data->id) . '" class="btn btn-outline-primary rounded-round"><i class="far fa-plus-square mr-2"></i>Edit</a>
                        <a href="' . route('calk.destroy', $data->id) . '" class="btn btn-outline-danger rounded-round delete-data-table"><i class="fas fa-trash mr-2"></i>Hapus</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transparansi-anggaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TransparansiAnggaran::create([
            'tahun' => $request->tahun,
            'link' => $request->link,
            'transparansi_anggaran_tp' => $request->transparansi_anggaran_tp,
        ]);

        return redirect()->route('calk.index')->with('store', 'oke');

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
        $data = TransparansiAnggaran::find($id);

        return view('transparansi-anggaran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        TransparansiAnggaran::find($id)->update([
            'tahun' => $request->tahun,
            'link' => $request->link,
        ]);

        return redirect()->route('calk.index')->with('edit', 'oke');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TransparansiAnggaran::destroy($id);
    }
}
