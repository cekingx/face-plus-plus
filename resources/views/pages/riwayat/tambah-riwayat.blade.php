@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Data Diri Pendatang</div>

            <div class="card-body">
              <form action="{{route('riwayat_tinggal.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- NIK --}}
                <div class="form-group row">
                  <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                  <div class="col-md-6">
                    <input id="nik" type="text" class="form-control" name="nik">
                  </div>
                </div>

                {{-- Riwayat Tinggal --}}
                
                <div class="form-group row">
                  <label for="riwayat_tinggal" class="col-md-4 col-form-label text-md-right">{{ __('Riwayat Tinggal') }}</label>

                  <div class="col-md-6">
                    <textarea class="form-control" id="riwayat_tinggal" name="riwayat_tinggal" rows="3"></textarea>
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
