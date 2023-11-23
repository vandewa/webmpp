<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Aplikasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Aplikasi::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . route('aplikasi.edit', $data->id) . '" class="btn btn-outline-primary rounded-round"><i class="far fa-plus-square mr-2"></i>Edit</a>
                        <a href="' . route('aplikasi.destroy', $data->id) . '" class="btn btn-outline-danger rounded-round delete-data-table"><i class="fas fa-trash mr-2"></i>Hapus</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('aplikasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aplikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->file('logo')) {
            $logo = $request->file('logo')->storeAs(
                'public/' . Carbon::now()->isoFormat('Y') . '/' . Carbon::now()->isoFormat('MMMM'),
                date('Ymdhis') . '.' . $request->file('logo')->extension()
            );
        }

        Aplikasi::create([
            'nama' => $request->nama,
            'url' => $request->url,
            'keterangan' => $request->keterangan,
            'logo' => $logo,
        ]);

        return redirect()->route('aplikasi.index')->with('store', 'oke');

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
        $data = Aplikasi::find($id);

        return view('aplikasi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Aplikasi::find($id)->update([
            'nama' => $request->nama,
            'url' => $request->url,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->file('logo')) {
            $logo = $request->file('logo')->storeAs(
                'public/' . Carbon::now()->isoFormat('Y') . '/' . Carbon::now()->isoFormat('MMMM'),
                date('Ymdhis') . '.' . $request->file('logo')->extension()
            );

            Aplikasi::find($id)->update([
                'logo' => $request->logo,
            ]);
        }

        return redirect()->route('aplikasi.index')->with('edit', 'oke');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Aplikasi::destroy($id);
    }
}
