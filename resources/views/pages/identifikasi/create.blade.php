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
                    <input id="kecamatan" type="text" class="form-control" name="kecamatan">
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
