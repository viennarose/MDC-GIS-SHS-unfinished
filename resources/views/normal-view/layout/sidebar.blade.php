<div>
    <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img id="sidebar-img" src="{{ Auth::user()->profile_image === null ? url('images/profile.jpg') : Storage::url(Auth::user()->profile_image) }}" class="img-circle elevation-2" alt="User Image"
                            style="border-radius: 50%; width: 40px; height: 40px;">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Welcome, {{ auth()->user()->name }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview"
                        role="menu">
                        <li class="nav-item">
                            <a href="/"
                                class="nav-link {{ '/' == request()->path() ? 'active2' : '' }}">
                                <i class="nav-icon fa-solid fa-gauge-max"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="contact-us"
                                class="nav-link {{ '/contact-us' == request()->path() ? 'active2' : '' }}">
                                <i class="nav-icon fa-solid fa-bullhorn"></i>
                                <p>
                                    Give Feedback
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ '/dashboard' == request()->path() ? 'active2' : '' }}">
                                <i class="nav-icon fa-solid fa-inbox"></i>
                                <p>
                                    Messages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="set-appointment"
                                class="nav-link {{ 'set-appointment' == request()->path() ? 'active2' : '' }}">
                                <i class="nav-icon fa-solid fa-inbox"></i>
                                <p>
                                    Set Appointment
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ 'admin/chats' == request()->path() ? 'active2' : '' }}">
                                <i class="nav-icon fa-solid fa-inbox"></i>
                                <p>
                                    Chats
                                </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ 'admin/activities' == request()->path() ? 'active2' : '' }}">
                                <i class="nav-icon fa-solid fa-inbox"></i>
                                <p>
                                    Activities
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>
                                    Questionnaires
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="inventory" class="nav-link {{ 'inventory' == request()->path() ? 'active2' : '' }}">>
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>My Inventory</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">SETTING MANAGEMENT</li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-gear"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('profile') }}"
                                        class="nav-link {{ '/profile' == request()->path() ? 'active2' : '' }}">
                                        <i class="fa-solid fa-user nav-icon"></i>
                                        <p>My Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/chatify') }}"
                                        class="nav-link {{ '/chatify' == request()->path() ? 'active2' : '' }}">
                                        <i class="fa-solid fa-message nav-icon"></i>
                                        <p>Chats</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button style="margin-left: -62px;" type="submit" class="btn nav-link" data-toggle="modal"
                                            data-target="#logout">
                                            <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper px-4 py-2">
            <div class="content px-2">
                @yield('content')
            </div>
        </div>

    </div>
</div>


<style>
    .active2 {
        background-color: #597da0 !important;
        color: whitesmoke !important;
    }
</style>
