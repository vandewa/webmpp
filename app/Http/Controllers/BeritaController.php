<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Models\File as Files;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Berita::with(['kategori'])->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . route('berita.edit', $data->id) . '" class="btn btn-outline-primary rounded-round"><i class="far fa-plus-square mr-2"></i>Edit</a>
                        <a href="' . route('berita.destroy', $data->id) . '" class="btn btn-outline-danger rounded-round delete-data-table"><i class="fas fa-trash mr-2"></i>Hapus</a>
                    </div>';
                })
                ->addColumn(
                    'tombol',
                    function ($data) {
                        $check = $data->publish_st ? "checked" : "";
                        return '<label class="switch">
                        <input type="checkbox" ' . $check . ' onclick="publish(' . $data->id . ')">
                        <span class="slider round"></span>
                        </label>';
                    }
                )
                ->addColumn('tanggal', function ($a) {
                    return Carbon::createFromTimeStamp(strtotime($a->created_at))->isoFormat('D MMMM Y');
                })
                ->rawColumns(['action', 'tombol'])
                ->make(true);
        }

        return view('berita.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $berita = Berita::create([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'isi_berita' => $request->isi_berita,
            'kategori_tp' => $request->kategori_tp,
            'created_by' => auth()->user()->id,
        ]);

        if ($request->document) {
            foreach ($request->document as $file) {
                Files::create([
                    'berita_id' => $berita->id,
                    'nama_file' => $file,
                    'path' => 'berita/' . $file
                ]);
            }
        }

        return redirect()->route('berita.index')->with('store', 'oke');
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
        $data = Berita::find($id);

        return view('berita.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Berita::find($id)->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'isi_berita' => $request->isi_berita,
            'kategori_tp' => $request->kategori_tp,

        ]);

        if ($request->document) {
            foreach ($request->document as $file) {
                // $path = storage_path('app/public/' . Carbon::now()->isoFormat('Y') . '/' . Carbon::now()->isoFormat('MMMM') . '/');
                // $from = storage_path('tmp/uploads/' . $file);
                // $to = $path . $file;
                // File::move($from, $to);
                Files::create([
                    'berita_id' => $id,
                    'nama_file' => $file,
                    'path' => 'berita/' . $file
                ]);
            }
        }

        return redirect()->route('berita.index')->with('edit', 'oke');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $a = Berita::with('foto')->find($id);
        if ($a) {
            foreach ($a->foto as $item) {
                Storage::disk('gcs')->delete('berita/' . $item->nama_file);
            }
        }
        Berita::destroy($id);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function changeAccess(Request $request)
    {
        $comp = Berita::where('id', $request->id)->first();
        $comp->publish_st = !$comp->publish_st;
        $comp->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Data has been successfully changed!'
            ],
            200
        );
    }
}
