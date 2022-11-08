<!doctype html>
<html lang="en">
  <head>
    @include('layout.dep')
    <title>Sistem Informasi Akademik</title>
  </head>
  <body>
    @include('layout.nav') 
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h3>Form Mata Kuliah</h3>
                        <hr>
                        <form method="POST" action="{{ route('mata_kuliah.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ request()->id }}">
                            <div class="form-group mb-2  col-md-2">
                                <label class="font-weight-bold">Kode MatKul</label>
                                <input type="text" class="form-control @error('kd_matkul') is-invalid @enderror" name="kd_matkul" value="{{ old('kd_matkul',$datas->kd_matkul) }}" placeholder="Masukkan kode mata kuliah">
                                @error('kd_matkul')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2 col-md-5">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama',$datas->nama) }}" placeholder="Masukkan nama">
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2 col-md-1">
                                <label class="font-weight-bold">SKS</label>
                                <input type="text" class="form-control @error('sks') is-invalid @enderror" name="sks" value="{{ old('sks',$datas->sks) }}" placeholder="Masukkan sks">
                                @error('sks')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
  </body>
</html>