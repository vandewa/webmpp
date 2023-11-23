@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::model($data, ['route' => ['attachment.update', $data->id], 'method' => 'put', 'files' => true]) }}
                        @include('attachment.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
