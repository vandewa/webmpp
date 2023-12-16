<?php

namespace App\Http\Controllers;

use App\Models\Penyelenggara;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class PenyelenggaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Penyelenggara::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . route('penyelenggara.edit', $data->id) . '" class="btn btn-outline-primary rounded-round"><i class="far fa-plus-square mr-2"></i>Edit</a>
                        <a href="' . route('penyelenggara.destroy', $data->id) . '" class="btn btn-outline-danger rounded-round delete-data-table"><i class="fas fa-trash mr-2"></i>Hapus</a>
                    </div>';

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('penyelenggara.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyelenggara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Penyelenggara::create([
            'nama_opd' => $request->nama_opd,
            'layanan' => $request->layanan,
        ]);

        return redirect()->route('penyelenggara.index')->with('store', 'oke');
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
        $data = Penyelenggara::find($id);

        return view('penyelenggara.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Penyelenggara::find($id)->update([
            'nama_opd' => $request->nama_opd,
            'layanan' => $request->layanan,
        ]);

        return redirect()->route('penyelenggara.index')->with('edit', 'oke');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penyelenggara::destroy($id);
    }
}
