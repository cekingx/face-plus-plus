@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Data Diri Pendatang</div>

            <div class="card-body">
              <form action="{{route('pendatang.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- NIK --}}
                <div class="form-group row">
                  <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                  <div class="col-md-6">
                    <input id="nik" type="text" class="form-control" name="nik">
                  </div>
                </div>

                {{-- NAMA --}}
                <div class="form-group row">
                  <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                  <div class="col-md-6">
                    <input id="nama" type="text" class="form-control" name="nama">
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
