<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\Berita;
use App\Models\Pendiri;
use App\Models\Visitor;
use App\Models\Aplikasi;
use App\Jobs\TambahVisitor;
use App\Models\LinkTerkait;
use App\Models\Simpeg\Tb01;
use Illuminate\Http\Request;
use App\Models\InformasiUmum;
use App\Models\Penyelenggara;
use App\Models\InformasiPublik;
use Illuminate\Support\Facades\DB;
use App\Models\TransparansiAnggaran;
use Illuminate\Support\Facades\Http;
use App\Models\DaftarInformasiPublik;
use Yajra\DataTables\Facades\DataTables;
use hisorange\BrowserDetect\Parser as Browser;

class HomeController extends Controller
{
    public function index()
    {
        TambahVisitor::dispatch($_SERVER['REMOTE_ADDR']);

        $berita = Berita::with(['sampul', 'dibuat'])
            ->where('publish_st', 1)
            ->where('kategori_tp', 'KATEGORI_TP_01')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $prestasi = Berita::with(['sampul', 'dibuat'])
            ->where('publish_st', 1)
            ->where('kategori_tp', 'KATEGORI_TP_02')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // return $berita;

        $hari_ini = DB::table('visitors')->whereDate('created_at', date('Y-m-d'))->count();
        $bulan_ini = DB::table('visitors')->whereMonth('created_at', date('m'))->count();
        $tahun_ini = DB::table('visitors')->whereYear('created_at', date('Y'))->count();

        $info_umum = InformasiUmum::where('id', 1)->first();

        $aplikasi = Aplikasi::all();

        $faq = Faq::all();

        $penyelenggara = Penyelenggara::all();


        return view('home.index', compact('berita', 'hari_ini', 'bulan_ini', 'tahun_ini', 'info_umum', 'aplikasi', 'prestasi', 'faq', 'penyelenggara'));
    }

    public function cariBerita(Request $request)
    {

        $cari = $request->judul;

        $posting = Berita::with(['sampul', 'dibuat'])
            ->where('judul', 'like', "%" . $cari . "%")
            ->orderBy('created_at', 'desc')
            ->simplePaginate(8)
            ->appends(['judul' => $request->judul]);

        $jumlah = Berita::where('judul', 'like', "%" . $cari . "%")->count();


        return view('home.cari', compact('posting', 'cari', 'jumlah'));

    }

    public function berita($id)
    {
        $data = Berita::with(['sampul', 'dibuat'])->where('slug', $id)->first();

        views($data)->cooldown(2)->record();

        return view('detail-berita', compact('data'));
    }

    public function listNews()
    {
        $data = Berita::with(['sampul', 'dibuat'])
            ->where('publish_st', 1)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(8);

        return view('list-berita', compact('data'));
    }

    public function trackingPerizinan(Request $request)
    {

        $data = '';
        $meta = '';
        $kode = '';

        if ($request->filled('q')) {
            $kode = $request->q;
            $response = Http::withoutVerifying()->post(config('app.aprizob_url'), [
                'kode_transaksi' => $request->q
            ]);
            $response = $response->collect();
            $data = $response['data'];
            $meta = $response['meta'];
        }


        return view('tracking-perizinan', compact('data', 'meta', 'kode'));
    }

    public function halaman($id)
    {
        $data = Menu::where('slug', $id)->first();

        return view('detail-halaman', compact('data'));

    }

    public function organisasi($id)
    {
        $data = Penyelenggara::where('id', $id)->first();

        return view('organisasi', compact('data'));

    }

    public function lhkasn(Request $request)
    {
        $judul = 'LHKASN (Laporan Harta Kekayaan Aparatur Sipil Negara)';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_01')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }
    public function perjanjianKinerja(Request $request)
    {
        $judul = 'PERJANJIAN KINERJA';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_02')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));
    }

    public function calk(Request $request)
    {
        $judul = 'CaLK (Catatan Atas Laporan Keuangan)';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_03')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }
    public function laporanAset(Request $request)
    {
        $judul = 'LAPORAN ASET';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_04')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }
    public function renja(Request $request)
    {
        $judul = 'RENJA (Rencana Kerja)';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_05')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }
    public function renstra(Request $request)
    {
        $judul = 'RENSTRA (Rencana Strategis)';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_06')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }
    public function pobl(Request $request)
    {
        $judul = 'POBL (Perkembangan Kegiatan Belanja Langsung)';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_07')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }

    public function programKegiatan(Request $request)
    {
        $judul = 'PROGRAM KEGIATAN';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_08')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }

    public function realisasiAnggaran(Request $request)
    {
        $judul = 'REALISASI ANGGARAN';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_09')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }

    public function lkjip(Request $request)
    {
        $judul = 'LKjIP (Laporan Kinerja Instansi Pemerintah)';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_10')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }

    public function dpa(Request $request)
    {
        $judul = 'DPA (Dokumen Pelaksanaan Anggaran)';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_11')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }

    public function rka(Request $request)
    {
        $judul = 'RKA (Rencana Kerja dan Anggaran)';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_12')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }

    public function neraca(Request $request)
    {
        $judul = 'NERACA';

        if ($request->ajax()) {

            $data = TransparansiAnggaran::where('transparansi_anggaran_tp', 'TRANSPARANSI_ANGGARAN_TP_13')->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank"><i class="far fa-eye mr-2"></i>Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('transparansi-anggaran', compact('judul'));

    }
    public function daftarInformasiPublik()
    {
        return view('daftar-informasi-publik');
    }

    public function getDIP(Request $request)
    {
        if ($request->ajax()) {

            $data = DaftarInformasiPublik::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return
                        '<div class="list-icons">
                        <a href="' . asset($data->preview_image) . '" class="btn btn-info rounded-round" target="_blank">Detail</a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }
    public function getDIP2(Request $request)
    {
        $terbaru = InformasiPublik::max('tahun');
        $data = InformasiPublik::where('tahun', $terbaru)->first();

        return view('dip2', compact('data'));

    }

    public function cariTahun(Request $request)
    {

        $cari = $request->tahun;

        $data = InformasiPublik::where('tahun', $cari)->first();

        return view('dip2', compact('data'));


    }

    public function pagePersonil()
    {
        $data = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'nip', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru', DB::Raw("
        case when jabfung is null and jabfungum is null then jabatan.jab
           when jabfung is null then jabfungum
           else  jabfung end as jabatan
       "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
            ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
            ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
            ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
            ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
            ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
            ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
            ->where('tb_01.kdunit', 16)
            ->where('idjenkedudupeg', 1)
            ->orderBy('a_golruang.idgolru', 'desc')
            ->get();


        return view('personil', compact('data'));

    }

}