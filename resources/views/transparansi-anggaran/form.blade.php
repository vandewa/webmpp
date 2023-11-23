<div class="card card-info mt-3">
    <div class="card-header">
        @if (Request::segment(1) == 'lhkasn')
            <h3 class="card-title">LHKASN</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_01" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'perjanjian-kinerja')
            <h3 class="card-title">PERJANJIAN KINERJA</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_03" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'calk')
            <h3 class="card-title">CaLK</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_03" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'laporan-aset')
            <h3 class="card-title">LAPORAN ASET</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_04" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'renja')
            <h3 class="card-title">RENJA</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_05" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'renstra')
            <h3 class="card-title">RENSTRA</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_06" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'pobl')
            <h3 class="card-title">POBL</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_07" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'program-kegiatan')
            <h3 class="card-title">PROGRAM KEGIATAN</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_08" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'realisasi-anggaran')
            <h3 class="card-title">REALISASI ANGGARAN</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_09" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'lkjip')
            <h3 class="card-title">LKjIP</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_10" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'dpa')
            <h3 class="card-title">DPA</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_11" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'rka')
            <h3 class="card-title">RKA</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_12" name="transparansi_anggaran_tp">
        @elseif(Request::segment(1) == 'neraca')
            <h3 class="card-title">NERACA</h3>
            <input type="hidden" value="TRANSPARANSI_ANGGARAN_TP_13" name="transparansi_anggaran_tp">
        @endif
    </div>


    <div class="card-body">
        <div class="form-group">
            <label>Tahun</label>
            {{ Form::number('tahun', null, ['class' => 'form-control ', 'placeholder' => 'Tahun']) }}
        </div>
        <div class="form-group">
            <label>Link</label>
            {{ Form::text('link', null, ['class' => 'form-control ', 'placeholder' => 'https://google.com']) }}
        </div>
        <div class="form-group">
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    {!! JsValidator::formRequest('App\Http\Requests\TransparansiAnggaranValidation') !!}
@endpush
