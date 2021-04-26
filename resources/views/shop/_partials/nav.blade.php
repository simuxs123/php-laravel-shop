
    <nav class="navbar navbar-expand-md navbar-light bg-light border-bottom border-dark">
        <a class="navbar-brand" href="/">
            <img src="{{asset('img/logo.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-2">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Titulinis</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategorija
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <a class="dropdown-item" href="/kategorija/{{$category->name}}">{{$category->name}}</a>
                        @endforeach
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="/admin">Admin</a></li>
                @endauth
                @guest
                    <li class="nav-item mr-2">
                        <a class="nav-link btn btn-primary text-white" type="button" href="/login" >Prisijungti</a>
                    </li>
                @endguest

            </ul>
        </div>
    </nav>

