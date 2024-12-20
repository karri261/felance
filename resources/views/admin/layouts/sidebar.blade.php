<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item" id="approve-nav-item">
            <a class="nav-link" href="{{ route('approve.job.post') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Approve job post</span>
                <div class="notification-bell">
                    <div class="circle-bell">
                        @if ($waitingJobsCount <= 5)
                            <span id="notification-count">{{ $waitingJobsCount }}</span>
                        @else
                            <span id="notification-count">5+</span>
                        @endif
                    </div>
                </div>
            </a>
        </li>
        <li class="nav-item" id="manage-ui-nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Manage UI</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank
                            Page </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html">
                            Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="manage-user-nav-item">
            <a class="nav-link" href="{{ route('manage-user') }}">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Manage Users</span>
            </a>
        </li>
        <li class="nav-item" id="manage-report">
            <a class="nav-link" href="{{ route('manage-report') }}">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Manage Reports</span>
            </a>
        </li>
    </ul>
</nav>
