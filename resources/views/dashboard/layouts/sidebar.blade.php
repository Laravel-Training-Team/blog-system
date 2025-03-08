
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a
                    href="index.html"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a>
            </div>
            <ul>
                <li class="label">Main</li>
                <li class="active"><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard 
                            {{-- <span class="badge badge-primary">2</span>  --}}
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('index') }}">Dashboard </a></li>
                    </ul>
                </li>

   
                <li> <a  class="sidebar-sub-toggle">  <i class="ti-target"></i> Roles <span
                    class="sidebar-collapse-icon ti-angle-down"></span> </a>
            <ul>
                <li><a href="{{ route('roles.index') }}" >  Roles </a></li>
                <li><a href="{{ route('roles.create') }}" > Create Role </a></li>
            
            </ul>
        </li>

                <li class="label">Apps</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-reset-password.html">Forgot password</a></li>
                    </ul>
                </li>
                <li><a><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
