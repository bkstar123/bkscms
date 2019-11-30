<nav class="main-header navbar navbar-expand navbar-dark navbar-olive">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" 
                data-widget="pushmenu" 
                href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" 
                class="nav-link">Dashboard
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="{{ route('admins.logout') }}" 
                class="nav-link"
                onclick="event.preventDefault(); $('#logout-form').submit();">
                Sign Out
            </a>
            <form id="logout-form" 
                   action="{{ route('admins.logout') }}" 
                   method="POST" 
                   style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</nav><!-- /.navbar -->