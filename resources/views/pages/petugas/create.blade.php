@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Pendaftaran Petugas</div>

            <div class="card-body">
              <form action="{{ route('petugas.store') }}" method="post">
                @csrf

                {{-- NAMA --}}
                <div class="form-group row">
                  <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Petugas') }}</label>

                  <div class="col-md-6">
                    <input id="nama" type="text" class="form-control" name="nama">
                  </div>
                </div>

                {{-- INSTANSI --}}
                <div class="form-group row">
                  <label for="instansi" class="col-md-4 col-form-label text-md-right">{{ __('Instansi') }}</label>

                  <div class="col-md-6">
                    <input id="instansi" type="text" class="form-control" name="instansi">
                  </div>
                </div>

                {{-- USERNAME --}}
                <div class="form-group row">
                  <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                  <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username">
                  </div>
                </div>

                {{-- PASSWORD --}}
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">
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
