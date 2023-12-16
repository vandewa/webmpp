@section('title', 'Website Resmi Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Wonosobo')
@section('meta-description')
    <meta content="Website Resmi Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Wonosobo" name="description" />
@endsection
@extends('layouts.front.app')
@section('content')
    <!-- Start Banner-->
    <div class="banner-area shape auto-height text-center text-normal text-light shadow dark-hard bg-fixed"
        style="background-image: url({{ $info_umum->preview_image }}); height:100%;width:100%object-fit:cover;"
        id="dashboard">
        <div class="container">
            <div class="row">
                <div class="container"
                    style="display: flex;
                        align-items: center; /* Untuk tengah atas/bawah */
                        justify-content: center; /* Untuk tengah kiri/kanan */
                        height: 100vh; /* Mengisi tinggi viewport */">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content" style="text-align: center;">
                                <img src="{{ asset('pemda.png') }}" alt="" style="width: 200px;">
                                <h2>MAL <span> PELAYANAN </span> PUBLIK</h2>
                                <br>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div style="background: white; width:300px;  margin: 0 auto;">
                                <p style="color: black;">
                                    <b>Jam Operasional Pelayanan</b><br>
                                    <b>Senin - Kamis 08.00-15.00</b><br>
                                    <b>Jumat 08.00-10.00</b><br>
                                </p>
                            </div>
                        </div>


                    </div>



                    {{-- <div class="col-md-8 col-md-offset-2"> --}}
                    {{-- <div class="banner banner-carousel owl-carousel owl-theme"> --}}
                    {{-- <div class="item">
                                <img alt="Thumb" src="{{ asset('gostart/assets/img/800x600.png') }}">
                            </div> --}}
                    {{-- <div class="item">
                                <img alt="Thumb" src="{{ asset('gostart/assets/img/800x600.png') }}">
                            </div> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Our About -->
    <div class="about-area shape-less default-padding" id="profil">
        <div class="container">
            <div class="row">
                <!-- Start About Content -->
                <div class="about-content mb-4">
                    <div class="col-md-12 info">
                        <div class="content-info">
                            <div class="row">
                                <div class="col-md-8 left-info">
                                    <h4>Selamat Datang di</h4>
                                    <h2>Mal Pelayanan Publik (MPP) Kabupaten Wonosobo</h2>

                                    <p>
                                        <i>"Prinsip peningkatan pelayanan yang mudah, murah, aman, berkualitas, dan
                                            cepat, harus menjadi fokus penting penyelenggara layanan, sehingga
                                            profesionalisme pelaksana pelayanan menjadi hal yang utama dalam
                                            penyelenggaraan MPP mendatang"
                                        </i>
                                    </p>
                                    <p>
                                        <i>
                                            "Saya meminta seluruh Perangkat Daerah, instansi vertikal, maupun BUMN/BUMD
                                            penyelenggara layanan yang tergabung dalam MPP, untuk dapat terus
                                            berkomitmen dalam menyelenggarakan pelayanan publik yang prima kepada
                                            masyarakat”.
                                        </i>

                                    </p>
                                    <p>
                                        <b>Bupati Wonosobo.</b>
                                    </p>

                                </div>
                                <div class="col-md-4">
                                    <div style="margin-top: 40pt;">
                                        <img src="{{ $info_umum->preview_bupati }}" alt=""
                                            style="max-height: 500px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End About -->

                <br><br>

                <!-- Start About Content -->
                <div class="row">
                    <div class="col-md-6">
                        <div style="margin-top:10px;">
                            <img src="{{ asset('maklumat.png') }}" alt="" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-6 right-info">
                        <div style="margin-top: 1%;">
                            {!! $info_umum->visi ?? '' !!}
                        </div>

                    </div>
                </div>
                <!-- End About -->

                <div class="row" style="margin-top:20px;">
                    <div class="col-md-12">
                        {!! $info_umum->arti ?? '' !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Our About -->

    <div id="features" class="features-area bg-gray shape default-padding" style="margin-bottom: 20px;">
        <div class="container">
            <div class="row align-items-center counter-wrapper gy-6 text-center">
                @foreach ($penyelenggara as $list)
                    <a href="{{ route('organisasi', $list->id) }}" target="_blank">
                        <div class="col-md-2">
                            <h3 class="bg-light rounded p-2">{{ $list->nama_opd ?? '' }}</h3>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Start Portfolio -->
    <div id="berita" class="portfolio-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h4>Kumpulan</h4>
                        <h2><strong>Berita </strong>Terbaru </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-full">
            <div class="portfolio-items text-light masonary portfolio-carousel-3-col owl-carousel owl-theme">
                @foreach ($berita as $list)
                    <div class="pf-item col-sm-12">
                        <a href="{{ route('detail.berita', $list->slug) }}">
                            <div class="item-effect">
                                <div class="thumb">
                                    <img src="{{ $list->sampul->preview_image ?? '' }}" alt="thumb"
                                        style="height:100%;width:100%;object-fit:cover">
                                </div>
                                <div class="icons">
                                    <h4>
                                        <a href="{{ route('detail.berita', $list->slug) }}">{{ $list->judul }}</a>
                                    </h4>
                                    <div class="cat">
                                        <a href="{{ route('detail.berita', $list->slug) }}">
                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($list->created_at))->isoFormat('D MMMM Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Portfolio -->

    <!-- Start Portfolio -->
    <div style="margin-top:100px;">
        <div id="prestasi" class="portfolio-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h4>Kumpulan</h4>
                            <h2><strong>Prestasi </strong>& Inovasi </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-full">
                <div class="portfolio-items text-light masonary portfolio-carousel-3-col owl-carousel owl-theme">
                    @foreach ($prestasi as $list)
                        <div class="pf-item col-sm-12">
                            <a href="{{ route('detail.berita', $list->slug) }}">
                                <div class="item-effect">
                                    <div class="thumb">
                                        <img src="{{ $list->sampul->preview_image ?? '' }}" alt="thumb"
                                            style="height:100%;width:100%;object-fit:cover">
                                    </div>
                                    <div class="icons">
                                        <h4>
                                            <a href="{{ route('detail.berita', $list->slug) }}">{{ $list->judul }}</a>
                                        </h4>
                                        <div class="cat">
                                            <a href="{{ route('detail.berita', $list->slug) }}">
                                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($list->created_at))->isoFormat('D MMMM Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- End Portfolio -->

    <!-- Start Our featur -->
    <div id="aplikasi" class="features-area default-padding-top text-center bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h4>Pelayanan MPP</h4>
                        <h2>Daftar <strong>Aplikasi</strong> MPP Wonosobo</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Start Features Content -->
                <div class="col-md-12 info">
                    <div class="info-items one-line">
                        <div class="features">
                            <div class="row">
                                @foreach ($aplikasi as $list)
                                    <!-- Single item -->
                                    <div class="single-item col-md-3 col-sm-6">
                                        <div class="item wow fadeInUp" data-wow-delay="400ms">
                                            <img src="{{ $list->preview_image ?? '' }}" alt=""
                                                style="max-height: 200px;">
                                            <br><br>
                                            <a href="{{ $list->url ?? '' }}" target="_blank">
                                                <h4>{{ $list->nama ?? '' }}</h4>
                                            </a>
                                            <span>
                                                {{ $list->keterangan ?? '' }}
                                            </span>

                                        </div>
                                    </div>
                                    <!-- End Single item -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Features Content -->

            </div>
        </div>
    </div>
    <!-- End Our Features -->

    <!-- Start Contact Area
                                                                                                                                                                                                                                                                                                                                                                                                                                                            ============================================= -->
    <div id="faq" class="contact-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h4>Pertanyaan & Jawaban</h4>
                        <h2><strong>FAQ</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact-items">
                <div class="row">
                    <div class="col-md-12 faq">
                        <div class="acd-items acd-arrow">
                            <div class="panel-group symb" id="accordion">
                                @foreach ($faq as $index => $list)
                                    <!-- Single Item -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                    href="#ac{{ $index + 1 }}">
                                                    <strong>{{ $index + 1 }}</strong> {{ $list->pertanyaan ?? '' }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="ac{{ $index + 1 }}" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                {!! $list->jawaban ?? '' !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- Start Our featur -->
    <div id="skm" class="features-area default-padding-top text-center bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h4>SKM</h4>
                        <h2>Survey <strong>Kepuasan </strong>Masyarakat</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Start Features Content -->
                <div class="col-md-12 info">
                    <div class="info-items one-line">
                        <div class="features">
                            <div class="row">
                                <a href="https://skm.wonosobokab.go.id/" target="_blank">
                                    <img src="{{ asset('skm.png') }}" alt="" height="100">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Features Content -->
            </div>
        </div>
    </div>
    <!-- End Our Features -->

    <!-- Start Our featur -->
    <div id="helpdesk" class="features-area default-padding-top text-center bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h4>Helpdesk</h4>
                        <h2><strong>Kontak </strong>Kami</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Start Features Content -->
                <div class="col-md-12 info">
                    <div class="info-items one-line">
                        <div class="features">
                            <div class="row">
                                <a href="{{ $info_umum->wa ?? '' }}" target="_blank">
                                    <img src="{{ asset('wa.png') }}" alt="" height="100">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Features Content -->
            </div>
        </div>
    </div>
    <!-- End Our Features -->

    <!-- Start Fun Fact Area-->
    <div class="fun-fact-area text-center default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h4>Total</h4>
                        <h2>Data <strong>Pengunjung</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="fun-fact-items">
                <div class="row">
                    <div class="col-md-4 item">
                        <div class="fun-fact">
                            <i class="flaticon-dashboard"></i>
                            <div class="timer" data-to="{{ $hari_ini }}" data-speed="5000">{{ $hari_ini }}
                            </div>
                            <span class="medium">Hari ini</span>
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="fun-fact">
                            <i class="flaticon-dashboard"></i>
                            <div class="timer" data-to="{{ $bulan_ini }}" data-speed="5000">{{ $bulan_ini }}
                            </div>
                            <span class="medium">Bulan Ini</span>
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="fun-fact">
                            <i class="flaticon-dashboard"></i>
                            <div class="timer" data-to="{{ $tahun_ini }}" data-speed="5000">{{ $tahun_ini }}
                            </div>
                            <span class="medium">Tahun Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Fact Area -->

@endsection

@push('css')
    <style>
        p {
            font-size: 14px;
        }
    </style>
@endpush
