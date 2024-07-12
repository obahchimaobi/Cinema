@if (!Request::is('register') && !Request::is('login') && !Request::is('404'))
    {{-- header begins here --}}
    <div class="container-fluid bg-body-tertiary p-0 d-xl-block d-lg-block d-md-none d-none">
        <nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary pt-2 pb-2"
            style="width: 100%; top: 0; z-index: 10; position: fixed;">
            <!-- box-shadow: 0px 0px 40px 0px rgba(0, 0, 0, 0.623); -->
            <div class="container-lg">
                <a class="navbar-brand text-reset" href="{{ url('/') }}" style="font-family: fantasy; font-weight: bold;"><img
                        src="{{ url('icons/video.png') }}" style="height: 35px; width: 30px" alt=""> BETA<span
                        class="text-info">MOVIES</span></a>

                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation" style="border-radius: 0px; font-size: 14px; box-shadow: none;">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0 m-auto">
                        <li class="nav-item">
                            <a class="nav-link text-reset" style="font-size: 13px; margin-right: 20px"
                                href="{{ url('/') }}" aria-current="page">Home
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link text-reset" href="{{ url('#') }}" id="dropdownId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="font-size: 13px; margin-right: 20px">Genres <i
                                    class="fa-sharp fa-solid fa-angle-down"></i></a>
                            <div class="dropdown-menu mt-0 mt-xl-3 m-lg-auto justify-content-center position-absolute text-left text-xl-left"
                                aria-labelledby="dropdownId"
                                style="border-radius: 0px; font-size: 13px; margin-top: 10px;">
                                <a class="dropdown-item text-reset" href="{{ url('action') }}"
                                    style="transition: 0.2s linear;">Action</a>
                                <a class="dropdown-item text-reset" href="{{ url('animation') }}"
                                    style="transition: 0.2s linear;">Animation & Anime</a>
                                <a class="dropdown-item text-reset" href="{{ url('comedy') }}"
                                    style="transition: 0.2s linear;">Comedy</a>
                                <a class="dropdown-item text-reset" href="{{ url('drama') }}"
                                    style="transition: 0.2s linear;">Drama</a>
                                <a class="dropdown-item text-reset" href="{{ url('fantasy') }}"
                                    style="transition: 0.2s linear;">Fantasy</a>
                                <a class="dropdown-item text-reset" href="{{ url('horror') }}"
                                    style="transition: 0.2s linear;">Horror</a>
                                <a class="dropdown-item text-reset" href="{{ url('mystery') }}"
                                    style="transition: 0.2s linear;">Mystery</a>
                                <a class="dropdown-item text-reset" href="{{ url('thriller') }}"
                                    style="transition: 0.2s linear;">Thriller</a>
                                <a class="dropdown-item text-reset" href="{{ url('scifi') }}"
                                    style="transition: 0.2s linear;">Sci-Fi</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('tv.shows') }}"
                                style="font-size: 13px; margin-right: 20px;">TV Shows</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('movies') }}"
                                style="font-size: 13px; margin-right: 20px;">Movies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('korean') }}"
                                style="font-size: 13px; margin-right: 20px;">Korean
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link text-reset" href="{{ url('#') }}" id="dropdownId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="font-size: 13px; margin-right: 20px">Theme <i
                                    class="fa-sharp fa-solid fa-angle-down"></i></a>
                            <ul class="dropdown-menu mt-0 mt-xl-3 m-lg-auto justify-content-center position-absolute text-left text-xl-left"
                                aria-labelledby="dropdownId"
                                style="border-radius: 0px; font-size: 13px; margin-top: 10px;">
                                <li>
                                    <button data-bs-theme-value="light" aria-pressed="false" class="btn border-0">
                                        <i class="fas fa-sun    "></i>
                                        Light

                                        <i class="fas fa-check check-icon"></i>
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-theme-value="dark" aria-pressed="false" class="btn border-0">
                                        <i class="fas fa-moon    "></i>
                                        Dark
                                        <i class="fas fa-check check-icon"></i>
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-theme-value="auto" aria-pressed="false" class="btn border-0">
                                        <i class="fa-solid fa-adjust"></i>
                                        Auto
                                        <i class="fas fa-check check-icon"></i>
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <button class="btn text-reset border-0" data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal" style="border-radius: 0px;"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>
    </div>


    {{-- Modal class is here --}}
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-md border-0">
            <div class="modal-content">
                {{-- <div class="modal-header">
                </div> --}}
                <div class="modal-body p-0">
                    <form class="d-flex" role="search" action="{{ route('movie.search') }}" method="get">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            name="search" required
                            style="box-shadow: none; font-family: 'Ubuntu sans', sans-serif; font-size: 15px; border-radius: 4px;">
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- header ends here --}}

    <nav class="navbar navbar-dark bg-body-tertiary fixed-top d-xl-none d-lg-none d-md-block d-block"
        style="padding-top: 10px; padding-bottom: -300px;">

        <div class="container">
            <button class="btn text-reset border-0" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i
                    class="fa fa-search" aria-hidden="true"></i></button>

            <a class="navbar-brand text-reset" href="{{ url('/') }}" style="font-family: fantasy; font-weight: bold;"><img src="{{ url('icons/video.png') }}" style="height: 35px; width: 30px" alt=""> BETA<span class="text-info">MOVIES</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                style="border-radius: 0px; font-size: 15px; box-shadow: none;">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="width: 65%;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <a class="navbar-brand text-reset" href="{{ url('/') }}"
                            style="font-family: fantasy; font-weight: bold;"><img src="{{ url('icons/video.png') }}"
                                style="height: 35px; width: 30px" alt=""> BETA<span
                                class="text-info">MOVIES</span></a>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active text-reset" style="font-size: 13px; margin-right: 20px"
                                href="{{ url('/') }}" aria-current="page">Home
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link text-reset" href="{{ url('#') }}" id="dropdownId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="font-size: 13px; margin-right: 20px">Genres <i
                                    class="fa-sharp fa-solid fa-angle-down"></i></a>
                            <div class="dropdown-menu mt-0 mt-xl-3 m-lg-auto justify-content-center position-absolute text-left text-xl-left"
                                aria-labelledby="dropdownId"
                                style="border-radius: 0px; font-size: 13px; margin-top: 10px;">
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('action') }}"
                                    style="transition: 0.2s linear;">Action</a>
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('animation') }}"
                                    style="transition: 0.2s linear;">Animation & Anime</a>
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('comedy') }}"
                                    style="transition: 0.2s linear;">Comedy</a>
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('drama') }}"
                                    style="transition: 0.2s linear;">Drama</a>
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('fantasy') }}"
                                    style="transition: 0.2s linear;">Fantasy</a>
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('horror') }}"
                                    style="transition: 0.2s linear;">Horror</a>
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('mystery') }}"
                                    style="transition: 0.2s linear;">Mystery</a>
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('thriller') }}"
                                    style="transition: 0.2s linear;">Thriller</a>
                                <a class="dropdown-item text-reset" id="hover" href="{{ url('scifi') }}"
                                    style="transition: 0.2s linear;">Sci-Fi</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('tv.shows') }}"
                                style="font-size: 13px; margin-right: 20px;">TV Shows</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('movies') }}"
                                style="font-size: 13px; margin-right: 20px;">Movies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" href="{{ route('korean') }}"
                                style="font-size: 13px; margin-right: 20px;">Korean
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link text-reset" href="{{ url('#') }}" id="dropdownId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="font-size: 13px; margin-right: 20px">Theme <i
                                    class="fa-sharp fa-solid fa-angle-down"></i></a>
                            <ul class="dropdown-menu mt-0 mt-xl-1 m-lg-auto justify-content-center position-absolute text-left text-xl-left"
                                aria-labelledby="dropdownId"
                                style="border-radius: 0px; font-size: 13px; margin-top: 10px;">
                                <li>
                                    <button data-bs-theme-value="light" aria-pressed="false" class="btn text-reset border-0">
                                        <i class="fas fa-sun    "></i>
                                        Light

                                        <i class="fas fa-check check-icon"></i>
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-theme-value="dark" aria-pressed="false" class="btn text-reset border-0">
                                        <i class="fas fa-moon    "></i>
                                        Dark
                                        <i class="fas fa-check check-icon"></i>
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-theme-value="auto" aria-pressed="false" class="btn text-reset border-0">
                                        <i class="fa-solid fa-adjust"></i>
                                        Auto
                                        <i class="fas fa-check check-icon"></i>
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
@endif
