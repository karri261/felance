<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->routeIs('admin') ? 'active' : '' }}" id="manage-ui-nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="menu-icon mdi mdi-home"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
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
        <li class="nav-item {{ request()->routeIs('manage-UI') ? 'active' : '' }}" id="manage-ui-nav-item">
            <a class="nav-link" href="{{ route('manage-UI') }}">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Manage UI</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('manage-user') ? 'active' : '' }}" id="manage-user-nav-item">
            <a class="nav-link" href="{{ route('manage-user') }}">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Manage Users</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('manage-report') ? 'active' : '' }}" id="manage-report">
            <a class="nav-link" href="{{ route('manage-report') }}">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Manage Reports</span>
            </a>
        </li>
    </ul>
</nav>
