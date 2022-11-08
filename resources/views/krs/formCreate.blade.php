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
                        <h3>Form KRS</h3>
                        <hr>
                        <form method="POST" action="{{route('krs.create')}}">
                        @csrf
                        <div class="form-group mb-2 col-md-2">
                            <label class="font-weight-bold">NIM</label>
                            <input type="text" readonly class="form-control" name="nim" value="{{ $mahasiswas->nim; }}">
                        </div>
                        <div class="form-group mb-2 col-md-4">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" readonly class="form-control" name="nama" value="{{ $mahasiswas->nama; }}">
                        </div>
                        <div class="form-group mb-2  col-md-5">
                            <label class="font-weight-bold">Mata Kuliah</label>
                            <select name="kd_matkul" class="form-select">
                              <option value="" selected>--- Pilih mata kuliah ---</option>
                              @forelse ($matkuls as $matkul)
                              <option value="{{$matkul->kd_matkul}}">{{$matkul->nama}}</option>
                              @empty
                              @endforelse
                            </select>
                        </div>
                        <button type="submit" class="btn btn-md btn-success mb-3">AMBIL</button>
                        </form>
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
                              @forelse ($krss as $krs)
                                <tr>
                                    <td>{{ $krs->kd_matkul }}</td>
                                    <td>{{ $krs->mata_kuliah->nama }}</td>
                                    <td>{{ $krs->mata_kuliah->sks }}</td>
                                    <td>
                                        <a href="{{route('krs.delete', $krs->id)}}"><button class="btn btn-sm btn-danger">HAPUS</button>
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