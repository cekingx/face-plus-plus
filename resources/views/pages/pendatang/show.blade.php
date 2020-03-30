@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Data Diri Pendatang</div>

            <div class="card-body">
              {{-- NIK --}}
              <div class="form-group row">
                <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                <div class="col-md-6">
                  <p id="nik" class="form-control">{{ $data->nik }}</p>
                </div>
              </div>

              {{-- NAMA --}}
              <div class="form-group row">
                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                <div class="col-md-6">
                  <p id="nama" class="form-control">{{ $data->nama }}</p>
                </div>
              </div>

              {{-- TEMPAT LAHIR --}}
              <div class="form-group row">
                <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                <div class="col-md-6">
                  <p id="tempat_lahir" class="form-control">{{ $data->tempat_lahir }}</p>
                </div>
              </div>

              {{-- TANGGAL LAHIR --}}
              <div class="form-group row">
                <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                <div class="col-md-6">
                  <p id="tanggal_lahir" class="form-control">{{ $data->tanggal_lahir }}</p>
                </div>
              </div>

              {{-- JENIS KELAMIN --}}
              <div class="form-group row">
                <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                <div class="col-md-6">
                  <p id="jenis_kelamin" class="form-control">{{ $data->jenis_kelamin }}</p>
                </div>
              </div>

              {{-- GOLONGAN DARAH --}}
              <div class="form-group row">
                <label for="gol_darah" class="col-md-4 col-form-label text-md-right">{{ __('Golongan Darah') }}</label>

                <div class="col-md-6">
                  <p id="gol_darah" class="form-control">{{ $data->gol_darah }}</p>
                </div>
              </div>

              {{-- KABUPATEN --}}
              <div class="form-group row">
                <label for="kabupaten" class="col-md-4 col-form-label text-md-right">{{ __('Kabupaten') }}</label>

                <div class="col-md-6">
                  <p id="kabupaten" class="form-control">{{ $data->kabupaten }}</p>
                </div>
              </div>

              {{-- KECAMATAN --}}
              <div class="form-group row">
                <label for="kecamatan" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                <div class="col-md-6">
                  <p id="kecamatan" class="form-control">{{ $data->kecamatan }}</p>
                </div>
              </div>

              {{-- DESA --}}
              <div class="form-group row">
                <label for="desa" class="col-md-4 col-form-label text-md-right">{{ __('Desa') }}</label>

                <div class="col-md-6">
                  <p id="desa" class="form-control">{{ $data->desa }}</p>
                </div>
              </div>

              {{-- ALAMAT --}}
              <div class="form-group row">
                <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                <div class="col-md-6">
                  <p id="alamat" class="form-control">{{ $data->alamat }}</p>
                </div>
              </div>

              {{-- AGAMA --}}
              <div class="form-group row">
                <label for="agama" class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>

                <div class="col-md-6">
                  <p id="agama" class="form-control">{{ $data->agama }}</p>
                </div>
              </div>

              {{-- STATUS PERKAWINAN --}}
              <div class="form-group row">
                <label for="status_perkawinan" class="col-md-4 col-form-label text-md-right">{{ __('Status Perkawinan') }}</label>

                <div class="col-md-6">
                  <p id="status_perkawinan" class="form-control">{{ $data->status_perkawinan }}</p>
                </div>
              </div>

              {{-- PEKERJAAN --}}
              <div class="form-group row">
                <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>

                <div class="col-md-6">
                  <p id="pekerjaan" class="form-control">{{ $data->pekerjaan }}</p>
                </div>
              </div>

              {{-- KEWARGANEGARAAN --}}
              <div class="form-group row">
                <label for="kewarganegaraan" class="col-md-4 col-form-label text-md-right">{{ __('Kewarganegaraan') }}</label>

                <div class="col-md-6">
                  <p id="kewarganegaraan" class="form-control">{{ $data->kewarganegaraan }}</p>
                </div>
              </div>

              {{-- Riwayat Tinggal --}}
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <a href="{{ route('riwayat.show_nik', ['nik' => $data->nik]) }}" class="btn btn-primaty">Riwayat Tinggal</a>
                </div>
            </div>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
