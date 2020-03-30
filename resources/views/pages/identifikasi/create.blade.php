@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Identifikasi</div>

            <div class="card-body">
              <form action="{{ route('identifikasi.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- KECAMATAN --}}
                <div class="form-group row">
                  <label for="kecamatan" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                  <div class="col-md-6">
                    <select class="form-control" id="kecamatan" name="kecamatan">
                      <option value="">Pilih salah satu</option>
                      <option value="negara">negara</option>
                      <option value="medoyo">medoyo</option>
                      <option value="pekutatan">pekutatan</option>
                      <option value="melaya">melaya</option>
                      <option value="jembrana">jembrana</option>
                      <option value="selemadeg">selemadeg</option>
                      <option value="selemadeg_timur">selemadeg_timur</option>
                      <option value="selemadeg_barat">selemadeg_barat</option>
                      <option value="kerambitan">kerambitan</option>
                      <option value="tabanan">tabanan</option>
                      <option value="kediri">kediri</option>
                      <option value="marga">marga</option>
                      <option value="penebel">penebel</option>
                      <option value="baturiti">baturiti</option>
                      <option value="pupuan">pupuan</option>
                      <option value="kuta">kuta</option>
                      <option value="mengwi">mengwi</option>
                      <option value="abiansemal">abiansemal</option>
                      <option value="petang">petang</option>
                      <option value="kuta_selatan">kuta_selatan</option>
                      <option value="kuta_utara">kuta_utara</option>
                      <option value="sukawati">sukawati</option>
                      <option value="blahbatuh">blahbatuh</option>
                      <option value="gianyar">gianyar</option>
                      <option value="tampaksiring">tampaksiring</option>
                      <option value="ubud">ubud</option>
                      <option value="tegalallang">tegalallang</option>
                      <option value="payangan">payangan</option>
                      <option value="nusa_penida">nusa_penida</option>
                      <option value="banjarangkan">banjarangkan</option>
                      <option value="klungkung">klungkung</option>
                      <option value="dawan">dawan</option>
                      <option value="susut">susut</option>
                      <option value="bangli">bangli</option>
                      <option value="tembuku">tembuku</option>
                      <option value="kintamani">kintamani</option>
                      <option value="rendang">rendang</option>
                      <option value="sidemen">sidemen</option>
                      <option value="manggis">manggis</option>
                      <option value="karangasem">karangasem</option>
                      <option value="abang">abang</option>
                      <option value="bebandem">bebandem</option>
                      <option value="selat">selat</option>
                      <option value="kubu">kubu</option>
                      <option value="gerogak">gerogak</option>
                      <option value="seririt">seririt</option>
                      <option value="busung_biu">busung_biu</option>
                      <option value="banjar">banjar</option>
                      <option value="sukasada">sukasada</option>
                      <option value="buleleng">buleleng</option>
                      <option value="sawan">sawan</option>
                      <option value="kubutambahan">kubutambahan</option>
                      <option value="tejakula">tejakula</option>
                      <option value="denpasar_selatan">denpasar_selatan</option>
                      <option value="denpasar_timur">denpasar_timur</option>
                      <option value="denpasar_barat">denpasar_barat</option>
                      <option value="denpasar_utara">denpasar_utara</option>
                    </select>
                  </div>
                </div>

                {{-- TANGGAL LAHIR --}}
                <div class="form-group row">
                  <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                  <div class="col-md-6">
                    <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir">
                  </div>
                </div>

                {{-- FOTO --}}
                <div class="form-group row">
                  <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                  <div class="col-md-6">
                    <input id="foto" type="file" name="foto">
                  </div>
                </div>

                {{-- Button --}}
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
