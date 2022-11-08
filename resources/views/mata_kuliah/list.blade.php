<!doctype html>
<html lang="en">
  <head>
    @include('layout.dep')
    <title>Sistem Informasi Akademik</title>
  </head>
  <body>
    @include('layout.nav') 
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h3>Data Mata Kuliah</h3>
                        <hr>
                        <a href="{{ route('mata_kuliah.formCreate') }}" class="btn btn-md btn-success mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Kode MatKul</th>
                                <th scope="col">Nama</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($datas as $data)
                                <tr>
                                    <td>{{ $data->kd_matkul }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->sks }}</td>
                                    <td>
                                        <a href="{{route('mata_kuliah.formUpdate', $data->id)}}"><button class="btn btn-sm btn-warning">EDIT</button></a>
                                        <a href="{{route('mata_kuliah.delete', $data->id)}}"><button class="btn btn-sm btn-danger">HAPUS</button></a>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data belum tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
  @include('layout.footer')
</html>