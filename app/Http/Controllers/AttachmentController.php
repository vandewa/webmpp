<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Attachment;
use App\Http\Requests\AttachmentStoreValidation;
use App\Http\Requests\AttachmentUpdateValidation;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Attachment::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . route('attachment.edit', $data->id) . '" class="btn btn-outline-primary rounded-round"><i class="far fa-plus-square mr-2"></i>Edit</a>
                        <a href="' . route('attachment.destroy', $data->id) . '" class="btn btn-outline-danger rounded-round delete-data-table"><i class="fas fa-trash mr-2"></i>Hapus</a>
                    </div>';

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('attachment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attachment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttachmentStoreValidation $request)
    {
        $path = storage_path('app/public/dokumen');

        if (!file_exists($path)) {
            mkdir($path);
        }

        $file = $request->file('path');
        $extension = $file->getClientOriginalExtension();
        $namanya = 'public/dokumen/' . date('Ymdhis') . '.' . $extension;

        if ($request->hasFile('path')) {
            $file->move($path, $namanya);
        }

        Attachment::create([
            'nama_file' => $request->nama_file,
            'path' => $namanya
        ]);

        return redirect()->route('attachment.index')->with('store', 'oke');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Attachment::find($id);

        return view('attachment.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttachmentUpdateValidation $request, $id)
    {
        Attachment::find($id)->update([
            'nama_file' => $request->nama_file
        ]);

        return redirect()->route('attachment.index')->with('edit', 'oke');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Attachment::find($id);
        unlink((str_replace('public', 'storage', $data->path)));
        Attachment::destroy($id);
    }
}
