@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Hasil Identifikasi</div>

            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Riwayat Tinggal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $index => $data)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $data->riwayat_tinggal }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
