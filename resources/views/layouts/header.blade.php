<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ url('/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ url('/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ url('/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ url('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        @auth
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    @if (Auth::user()->role === 1)
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Users
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admins.index') }}"
                                        class="nav-link {{ Route::is('admins.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Admins
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teachers.index') }}"
                                        class="nav-link {{ Route::is('teachers.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Teachers
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('students.index') }}"
                                        class="nav-link {{ Route::is('students.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Students
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('parents.index') }}"
                                        class="nav-link {{ Route::is('parents.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Parents
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Academics
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('classes.index') }}"
                                        class="nav-link {{ Route::is('classes.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Classes
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subjects.index') }}"
                                        class="nav-link {{ Route::is('subjects.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Subjects
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('assign_subject.index') }}"
                                        class="nav-link {{ Route::is('assign_subject.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Assign subject
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            examination
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('exams.index') }}"
                                                class="nav-link {{ Route::is('exams.index') ? 'active' : '' }}">
                                                <i class="far fa-circle nav-icon"></i>

                                                <p>
                                                    Exams
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('exams.create') }}"
                                                class="nav-link {{ Route::is('exams.create') ? 'active' : '' }}">
                                                <i class="far fa-circle nav-icon"></i>

                                                <p>
                                                    Add Exam
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href={{ route('admins.show', Auth::user()->id) }}
                                class="nav-link {{ Route::is('admins.show', Auth::user()->id) ? 'active' : '' }}">
                                @if (Auth::user()->image != null)
                                    <img src="{{ Auth::user()->get_imageUrl() }}">
                                @else
                                    <i class="nav-icon far fa-user">
                                    </i>
                                @endif

                                <p>
                                    My profile
                                </p>
                            </a>

                        </li>
                    @elseif (Auth::user()->role === 2)
                        <li class="nav-item">
                            <a href={{ route('teachers.show', Auth::user()->id) }}
                                class="nav-link {{ Route::is('teachers.show', Auth::user()->id) ? 'active' : '' }}">
                                @if (Auth::user()->image != null)
                                    <i class="nav-icon">
                                        <img class="img-fluid img-circle" style="width: 23px;"
                                            src="{{ Auth::user()->get_imageUrl() }}">

                                    </i>
                                @else
                                    <i class="nav-icon far fa-user">
                                    </i>
                                @endif
                                <p>
                                    My profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('teachers.subjects.list', Auth::user()->id) }}
                                class="nav-link {{ Route::is('teachers.subjects.list', Auth::user()->id) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    My subjects
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('teachers.timetable.list', Auth::user()->id) }}
                                class="nav-link {{ Route::is('teachers.timetable.list', Auth::user()->id) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    My Timetable
                                </p>
                            </a>
                        </li>
                    @elseif (Auth::user()->role === 4)
                        <li class="nav-item">
                            <a href={{ route('parents.show', Auth::user()->id) }}
                                class="nav-link {{ Route::is('parents.show', Auth::user()->id) ? 'active' : '' }}">
                                @if (Auth::user()->image != null)
                                    <i class="nav-icon">
                                        <img class="img-fluid img-circle" style="width: 23px;"
                                            src="{{ Auth::user()->get_imageUrl() }}">

                                    </i>
                                @else
                                    <i class="nav-icon far fa-user">
                                    </i>
                                @endif
                                <p>
                                    My profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('parents.mystudents', Auth::user()->id) }}
                                class="nav-link {{ Route::is('parents.mystudents', Auth::user()->id) ? 'active' : '' }}">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    My students
                                </p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href={{ route('timetables.show', Auth::user()->class_id) }}
                                class="nav-link {{ Route::is('timetables.show', Auth::user()->id) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    My Timetable
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ route('students.show', Auth::user()->id) }}
                                class="nav-link {{ Route::is('students.show', Auth::user()->id) ? 'active' : '' }}">
                                @if (Auth::user()->image != null)
                                    <i class="nav-icon">
                                        <img class="img-fluid img-circle" style="width: 23px;"
                                            src="{{ Auth::user()->get_imageUrl() }}">

                                    </i>
                                @else
                                    @if (Auth::user()->image != null)
                                        <i class="nav-icon">
                                            <img class="img-fluid img-circle" style="width: 23px;"
                                                src="{{ Auth::user()->get_imageUrl() }}">

                                        </i>
                                    @else
                                        <i class="nav-icon far fa-user">
                                        </i>
                                    @endif
                                @endif
                                <p>
                                    My profile
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href={{ route('students.subjects', Auth::user()->id) }}
                                class="nav-link {{ Route::is('students.subjects', Auth::user()->id) ? 'active' : '' }}">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    My subjects
                                </p>
                            </a>

                        </li>
                    @endif

                    <li class="nav-item">
                        <a href={{ route('user.edit_password', Auth::user()->id) }}
                            class="nav-link {{ Route::is('user.edit_password', Auth::user()->id) ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Change password
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link {{ Route::is('logout') ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        @endauth
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
