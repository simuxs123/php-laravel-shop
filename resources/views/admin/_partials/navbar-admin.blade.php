<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
    <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
    </form>
    <ul class="navbar-nav border-left flex-row ">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle mr-2" src="{{asset('img/avatars/0.png')}}" alt="User Avatar">
                <span class="d-none d-md-inline-block">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item" href="/admin">
                    <i class="material-icons">vertical_split</i> Produktai</a>
                <a class="dropdown-item" href="/admin-add">
                    <i class="material-icons">note_add</i> Pridėti produktą</a>
                <a class="dropdown-item" href="/admin-add">
                    <i class="material-icons">table_chart</i> Užsakymai</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="/logout">
                    <i class="material-icons text-danger">&#xE879;</i> Logout </a>
            </div>
        </li>
    </ul>
    <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
            <i class="material-icons">&#xE5D2;</i>
        </a>
    </nav>
</nav>
