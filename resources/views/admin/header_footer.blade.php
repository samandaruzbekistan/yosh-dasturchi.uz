<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}"/>


    @stack('css')
    <title>Admin | Yosh dasturchi</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ route('admin.home') }}">
                <img src="{{ asset('img/logo_white_album.png') }}" alt="" class="img-fluid" >
            </a>

            <ul class="sidebar-nav">

                <li class="sidebar-item @yield('home')">
                    <a class="sidebar-link" href="{{ route('admin.home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid align-middle"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        <span class="align-middle">Bo'limlar</span>
                    </a>
                </li>

                <li class="sidebar-item @yield('students')">
                    <a class="sidebar-link" href="{{ route('admin.users') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle me-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span class="align-middle">Foydalanuvchilar</span>
                    </a>
                </li>


                <li class="sidebar-item @yield('profile')">
                    <a class="sidebar-link" href="{{ route('admin.profile') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-sliders align-middle">
                            <line x1="4" y1="21" x2="4" y2="14"></line>
                            <line x1="4" y1="10" x2="4" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="3"></line>
                            <line x1="20" y1="21" x2="20" y2="16"></line>
                            <line x1="20" y1="12" x2="20" y2="3"></line>
                            <line x1="1" y1="14" x2="7" y2="14"></line>
                            <line x1="9" y1="8" x2="15" y2="8"></line>
                            <line x1="17" y1="16" x2="23" y2="16"></line>
                        </svg>
                        <span class="align-middle">Profile</span>
                    </a>
                </li>





{{--                <li class="sidebar-item @yield('academic')">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.academic') }}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-award align-middle">--}}
{{--                            <circle cx="12" cy="8" r="7"></circle>--}}
{{--                            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>--}}
{{--                        </svg>--}}
{{--                        <span class="align-middle">Oliy talim darsliklar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item @yield('presentation')">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.presentation') }}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-play align-middle">--}}
{{--                            <polygon points="5 3 19 12 5 21 5 3"></polygon>--}}
{{--                        </svg>--}}
{{--                        <span class="align-middle">Taqdimotlar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item @yield('topic')">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.topic') }}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-message-square align-middl">--}}
{{--                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>--}}
{{--                        </svg>--}}
{{--                        <span class="align-middle">Maqolalar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item @yield('rebus')">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.rebus') }}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-codepen align-middle">--}}
{{--                            <polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"></polygon>--}}
{{--                            <line x1="12" y1="22" x2="12" y2="15.5"></line>--}}
{{--                            <polyline points="22 8.5 12 15.5 2 8.5"></polyline>--}}
{{--                            <polyline points="2 15.5 12 8.5 22 15.5"></polyline>--}}
{{--                            <line x1="12" y1="2" x2="12" y2="8.5"></line>--}}
{{--                        </svg>--}}
{{--                        <span class="align-middle">Rebuslar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item @yield('blocks')">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.block') }}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-file-text align-middle me-2">--}}
{{--                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>--}}
{{--                            <polyline points="14 2 14 8 20 8"></polyline>--}}
{{--                            <line x1="16" y1="13" x2="8" y2="13"></line>--}}
{{--                            <line x1="16" y1="17" x2="8" y2="17"></line>--}}
{{--                            <polyline points="10 9 9 9 8 9"></polyline>--}}
{{--                        </svg>--}}
{{--                        <span class="align-middle">Testlar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}


{{--                <li class="sidebar-item @yield('logic')">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.logic') }}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-command align-middle">--}}
{{--                            <path--}}
{{--                                d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>--}}
{{--                        </svg>--}}
{{--                        <span class="align-middle">Mantiqiy topshiriqlar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item @yield('creative')">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.creative') }}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-command align-middle">--}}
{{--                            <path--}}
{{--                                d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>--}}
{{--                        </svg>--}}
{{--                        <span class="align-middle">Kreativ topshiriqlar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}


{{--                <li class="sidebar-item @yield('interaktiv')">--}}
{{--                    <a class="sidebar-link" href="{{ route('admin.interaktiv') }}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-copy align-middle">--}}
{{--                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>--}}
{{--                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>--}}
{{--                        </svg>--}}
{{--                        <span class="align-middle">Interaktiv metodlar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}


            </ul>


        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                           <span class="text-dark">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="align-middle me-1" data-feather="user"></i>
                                Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">Chiqish</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('section')

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a class="text-muted" href="#" target="_blank"><strong>Gold Apps</strong></a> - <a
                                class="text-muted" href="#" target="_blank"><strong>IT company</strong></a> &copy;
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="https://t.me/Samandar_developer" target="_blank">Dasturchi:
                                    <span class="text-primary">Samandar Sariboyev</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('js')
<script>
    @if($errors->any())
        const notyf = new Notyf();

        @foreach ($errors->all() as $error)
            notyf.error({
                message: '{{ $error }}',
                duration: 5000,
                dismissible: true,
                position: {
                    x: 'right',
                    y: 'bottom'
                },
            });
        @endforeach
    @endif

    @if(session()->has('success'))
        const notyf = new Notyf();

        notyf.success({
            message: '{{ session('success') }}',
            duration: 10000,
            dismissible: true,
            position: {
                x: 'right',
                y: 'bottom'
            },
        });
    @endif

    @if(session()->has('error'))
    const notyf = new Notyf();

    notyf.error({
        message: '{{ session('error') }}',
        duration: 10000,
        dismissible: true,
        position: {
            x: 'right',
            y: 'bottom'
        },
    });
    @endif
</script>
<div class="notyf" style="justify-content: flex-start; align-items: center;"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite"
     style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;">
    Inconceivable!
</div>
</body>
</html>
