@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Data Diri Pendatang</div>

            <div class="card-body">
              <form action="{{ route('pendatang.store') }}" method="post" enctype="multipart/form-data">
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

                {{-- TEMPAT LAHIR --}}
                <div class="form-group row">
                  <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                  <div class="col-md-6">
                    <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir">
                  </div>
                </div>

                {{-- TANGGAL LAHIR --}}
                <div class="form-group row">
                  <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                  <div class="col-md-6">
                    <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir">
                  </div>
                </div>

                {{-- JENIS KELAMIN --}}
                <div class="form-group row">
                  <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                  <div class="col-md-6">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                      <option value="">Pilih salah satu</option>
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>

                {{-- GOLONGAN DARAH --}}
                <div class="form-group row">
                  <label for="gol_darah" class="col-md-4 col-form-label text-md-right">{{ __('Golongan Darah') }}</label>

                  <div class="col-md-6">
                    <select class="form-control" id="gol-darah" name="gol-darah">
                      <option value="">Pilih salah satu</option>
                      <option value="a">A</option>
                      <option value="b">B</option>
                      <option value="ab">AB</option>
                      <option value="o">O</option>
                    </select>
                  </div>
                </div>

                {{-- KABUPATEN --}}
                <div class="form-group row">
                  <label for="kabupaten" class="col-md-4 col-form-label text-md-right">{{ __('Kabupaten') }}</label>

                  <div class="col-md-6">
                    <input id="kabupaten" type="text" class="form-control" name="kabupaten">
                  </div>
                </div>

                {{-- KECAMATAN --}}
                <div class="form-group row">
                  <label for="kecamatan" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                  <div class="col-md-6">
                    <input id="kecamatan" type="text" class="form-control" name="kecamatan">
                  </div>
                </div>

                {{-- DESA --}}
                <div class="form-group row">
                  <label for="desa" class="col-md-4 col-form-label text-md-right">{{ __('Desa') }}</label>

                  <div class="col-md-6">
                    <input id="desa" type="text" class="form-control" name="desa">
                  </div>
                </div>

                {{-- ALAMAT --}}
                <div class="form-group row">
                  <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                  <div class="col-md-6">
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                  </div>
                </div>

                {{-- AGAMA --}}
                <div class="form-group row">
                  <label for="agama" class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>

                  <div class="col-md-6">
                    <input id="agama" type="text" class="form-control" name="agama">
                  </div>
                </div>

                {{-- STATUS PERKAWINAN --}}
                <div class="form-group row">
                  <label for="status_perkawinan" class="col-md-4 col-form-label text-md-right">{{ __('Status Perkawinan') }}</label>

                  <div class="col-md-6">
                    <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                      <option value="">Pilih salah satu</option>
                      <option value="kawin">Kawin</option>
                      <option value="belum_kawin">Belum Kawin</option>
                    </select>
                  </div>
                </div>

                {{-- PEKERJAAN --}}
                <div class="form-group row">
                  <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>

                  <div class="col-md-6">
                    <input id="pekerjaan" type="text" class="form-control" name="pekerjaan">
                  </div>
                </div>

                {{-- KEWARGANEGARAAN --}}
                <div class="form-group row">
                  <label for="kewarganegaraan" class="col-md-4 col-form-label text-md-right">{{ __('Kewarganegaraan') }}</label>

                  <div class="col-md-6">
                    <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan">
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
