<header class="top-header">
    <nav class="gap-4 navbar navbar-expand align-items-center">
        <div class="btn-toggle">
            <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
        </div>
        <div class="search-bar flex-grow-1">

        </div>
        <ul class="gap-1 navbar-nav nav-right-links align-items-center">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
                    data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">notifications</i>
                    <span class="badge-notify">5</span>
                </a>
                <div class="shadow dropdown-menu dropdown-notify dropdown-menu-end">

                    <div class="notify-list">
                        <div>
                            <a class="py-2 dropdown-item border-bottom" href="javascript:;">
                                <div class="gap-3 d-flex align-items-center">
                                    <div class="">
                                        <img src="assets/images/avatars/01.png" class="rounded-circle" width="45"
                                            height="45" alt="">
                                    </div>
                                    <div class="">
                                        <h5 class="notify-title">Congratulations Jhon</h5>
                                        <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                                        <p class="mb-0 notify-time">Today</p>
                                    </div>
                                    <div class="notify-close position-absolute end-0 me-3">
                                        <i class="material-icons-outlined fs-6">close</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <img src="{{ asset('logo.png') }}" class="p-1 border rounded-circle" width="45" height="45"
                        alt="">
                </a>
                <div class="shadow dropdown-menu dropdown-user dropdown-menu-end">
                    <a class="gap-2 py-2 dropdown-item" href="javascript:;">
                        <div class="text-center">
                            <img src="{{ asset('logo.png') }}" class="p-1 mb-3 shadow rounded-circle" width="90"
                                height="90" alt="">
                            <h5 class="mb-0 user-name fw-bold">Hello, {{ Str::title(auth()->user()->name) }}</h5>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a class="gap-2 py-2 dropdown-item d-flex align-items-center"
                        href="{{ route('admin.blog.view') }}"><i
                            class="material-icons-outlined">person_outline</i>Profile</a>

                    <hr class="dropdown-divider">
                    <a class="gap-2 py-2 dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"><i
                            class="material-icons-outlined">power_settings_new</i>Logout</a>
                </div>
            </li>
        </ul>

    </nav>
</header>
