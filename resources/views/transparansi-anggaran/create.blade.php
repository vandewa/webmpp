@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (Request::segment(1) == 'lhkasn')
                            {{ Form::open(['route' => ['lhkasn.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'perjanjian-kinerja')
                            {{ Form::open(['route' => ['perjanjian-kinerja.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'calk')
                            {{ Form::open(['route' => ['calk.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'laporan-aset')
                            {{ Form::open(['route' => ['laporan-aset.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'renja')
                            {{ Form::open(['route' => ['renja.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'renstra')
                            {{ Form::open(['route' => ['renstra.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'pobl')
                            {{ Form::open(['route' => ['pobl.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'program-kegiatan')
                            {{ Form::open(['route' => ['program-kegiatan.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'realisasi-anggaran')
                            {{ Form::open(['route' => ['realisasi-anggaran.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'lkjip')
                            {{ Form::open(['route' => ['lkjip.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'dpa')
                            {{ Form::open(['route' => ['dpa.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'rka')
                            {{ Form::open(['route' => ['rka.store'], 'files' => true]) }}
                        @elseif(Request::segment(1) == 'neraca')
                            {{ Form::open(['route' => ['neraca.store'], 'files' => true]) }}
                        @endif
                        @include('transparansi-anggaran.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
