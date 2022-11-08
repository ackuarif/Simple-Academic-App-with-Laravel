<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <title>Login</title>
    </head>

    <body>
        <div class="container">
        <form action="{{ route('doLogin') }}" method="post">
            @csrf
            <hr>
            <h4 class="text-center">Silahkan Login</h2>
            <hr>
            @if (session('error'))
                <div class="alert alert-danger">
                    <b>Opps!</b> {{ session('error') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <br/>
            <div class="alert alert-info">
                <b>Info Akses Admin</b> Silahkan untuk user admin menggunakan email <b>admin@gmail.com</b>, password : <b>admin</b>
            </div>
            <div class="alert alert-info">
                <b>Info Akses Mahasiswa</b> Password mahasiswa adalah NIM yang dipunya masing - masing.
            </div>
        </div>
    </body>
</html>