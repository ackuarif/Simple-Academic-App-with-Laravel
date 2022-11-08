<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
    <a class="navbar-brand" href="#">MySIAKAD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
        </li>
        @if(auth()->user()->type == 'admin')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Master
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item"  href="{{ route('mahasiswa.list') }}">Mahasiswa</a></li>
                <li><a class="dropdown-item" href="{{ route('mata_kuliah.list') }}">Mata Kuliah</a></li>
            </ul>
        </li>
        @endif
        @if(auth()->user()->type == 'mahasiswa')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Akademik
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('krs.formCreate') }}">Form KRS</a></li>
            </ul>
        </li>
        @endif
    </ul>
    <ul class="navbar-nav">
    <li class="nav-item nav-link">( {{ auth()->user()->name }} )</li>
    <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
    </ul>
    </div>
</div>
</nav>