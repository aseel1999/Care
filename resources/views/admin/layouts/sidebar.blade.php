<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{ url('/dashboard') }}">
                <div class="logo-img">

                </div>
                <span class="text">HealthCare</span>
            </a>

        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">

                    <div class="nav-item active">
                        <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>


                    <div class="nav-item has-sub">
                        <a href="{{route('appoinment.index')}}"><i class="ik ik-list"></i><span>Appointment Time</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="#" class="menu-item">Create</a>
                            <a href="# "class="menu-item">Check</a>

                        </div>
                    </div>



                    <div class="nav-item has-sub">
                        <a href="{{route('services.index')}}"><i class="ik ik-heart"></i><span>Services</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="#" class="menu-item">Create</a>
                            <a href="#" class="menu-item">View</a>
                                
                        </div>
                    </div>

                   
                        <div class="nav-item has-sub">
                            <a href="{{route('specialties.index')}}"><i class="ik ik-layers"></i><span>Specialty</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="#" class="menu-item">Create</a>
                                <a href="#" class="menu-item">View</a>

                            </div>
                        </div>

                        <div class="nav-item has-sub">
                            <a href="{{route('doctors.index')}}"><i class="ik ik-file-text"></i><span>Doctor</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('doctors.create')}}" class="menu-item">Create</a>
                                <a href="#" class="menu-item">View</a>

                            </div>
                        </div>




                        <div class="nav-item has-sub">
                            <a href="{{route('contact.index')}}"><i class="ik ik-monitor"></i><span>Contact</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="#" class="menu-item">Show</a>
                                
                            </div>
                        </div>
                        <div class="nav-item has-sub">
                            <a href="{{route('users.index')}}"><i class="ik ik-monitor"></i><span>Patient</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="#" class="menu-item">Show</a>
                                
                            </div>
                        </div>
                        

                    <div class="nav-item active">
                        <a onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                            href="#"><i
                                class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                        <form id="logout-form" action="#" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
