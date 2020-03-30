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
                    <th scope="col">NIK Comparator</th>
                    <th scope="col">Kemiripan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $index => $data)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>
                        <a href="{{ route('pendatang.show_nik', ['nik' => $data->comparator_nik]) }}">
                          {{ $data->comparator_nik }}
                        </a>
                      </td>
                      <td>{{ $data->confidence }}</td>
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
