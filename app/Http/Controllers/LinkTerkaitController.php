<?php

namespace App\Http\Controllers;

use App\Models\LinkTerkait;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LinkTerkaitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = LinkTerkait::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . route('link-terkait.edit', $data->id) . '" class="btn btn-outline-primary rounded-round"><i class="far fa-plus-square mr-2"></i>Edit</a>
                        <a href="' . route('link-terkait.destroy', $data->id) . '" class="btn btn-outline-danger rounded-round delete-data-table"><i class="fas fa-trash mr-2"></i>Hapus</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('link-terkait.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('link-terkait.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        LinkTerkait::create([
            'nama' => $request->nama,
            'link' => $request->link,
        ]);

        return redirect()->route('link-terkait.index')->with('store', 'ok');

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
        $data = LinkTerkait::find($id);

        return view('link-terkait.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        LinkTerkait::find($id)->update([
            'nama' => $request->nama,
            'link' => $request->link,
        ]);

        return redirect()->route('link-terkait.index')->with('edit', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LinkTerkait::destroy($id);
    }
}
