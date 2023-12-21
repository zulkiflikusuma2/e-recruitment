<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                {{-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-pill badge-danger">3</span>
                    </a>
                    <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span class="">2 New Notifications</span>  
                            <a href="javascript:void()" class="d-inline-block">
                                <span class="badge badge-pill gradient-2">5</span>
                            </a>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Events near you</h6>
                                            <span class="notification-text">Within next 5 days</span> 
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Event Started</h6>
                                            <span class="notification-text">One hour ago</span> 
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Event Ended Successfully</h6>
                                            <span class="notification-text">One hour ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Events to Join</h6>
                                            <span class="notification-text">After two days</span> 
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </li> --}}
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        {{ auth()->user()->username }}
                        {{ auth()->user()->photo }}
                        <i class="fas fa-caret-down blackiconcolor"></i>
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                @can('superadmin')
                                    <li>
                                        <a href="/users"><i class="fa fa-users"></i><span>Kelola User</span></a>
                                    </li>
                                @endcan
                                @can('applicant')
                                    <li>
                                        <a href="{{ route('profile.edit') }}"><i class="fa fa-user"></i><span>
                                                Profil</span></a>
                                    </li>
                                @endcan
                                <li>
                                    <a href="{{ route('password.edit') }}"><i class="fa fa-gear"></i><span> Ubah
                                            Password</span></a>
                                </li>
                                <hr class="my-2">
                                {{-- <li> --}}
                                {{-- <a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li> --}}
                                <li>
                                    <a href="/logout"
                                        onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                        <i class="fa fa-arrow-right"></i><span> Keluar</span></a>
                                    <form action="/logout" method="post" id="logout" style="display: none;">
                                        @csrf
                                        @method('post')
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
