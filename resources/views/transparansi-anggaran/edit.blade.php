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
                            {{ Form::model($data, ['route' => ['lhkasn.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'perjanjian-kinerja')
                            {{ Form::model($data, ['route' => ['perjanjian-kinerja.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'calk')
                            {{ Form::model($data, ['route' => ['calk.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'laporan-aset')
                            {{ Form::model($data, ['route' => ['laporan-aset.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'renja')
                            {{ Form::model($data, ['route' => ['renja.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'renstra')
                            {{ Form::model($data, ['route' => ['renstra.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'pobl')
                            {{ Form::model($data, ['route' => ['pobl.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'program-kegiatan')
                            {{ Form::model($data, ['route' => ['program-kegiatan.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'realisasi-anggaran')
                            {{ Form::model($data, ['route' => ['realisasi-anggaran.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'lkjip')
                            {{ Form::model($data, ['route' => ['lkjip.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'dpa')
                            {{ Form::model($data, ['route' => ['dpa.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'rka')
                            {{ Form::model($data, ['route' => ['rka.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @elseif(Request::segment(1) == 'neraca')
                            {{ Form::model($data, ['route' => ['neraca.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @endif
                        @include('transparansi-anggaran.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
