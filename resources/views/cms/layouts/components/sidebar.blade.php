<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" 
        class="brand-link navbar-olive">
        <img src="/cms-assets/img/siteLogo.png" 
              alt="Site Logo" 
              class="brand-image img-circle elevation-3"
              style="opacity: .8">
        <span class="brand-text font-weight-light">
            {{ config('app.name') }}
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $authAdmin->getAvatar()['avatar_url'] }}" 
                      id="sidebar-user-image"
                      class="img-circle elevation-2" 
                      alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admins.show', [
                        'admin' => $authAdmin->{$authAdmin->getRouteKeyName()}
                    ]) }}" 
                    class="d-block">
                    {{ $authAdmin->name }}
                </a>
            </div>
        </div>
        <!--Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" 
                data-widget="treeview" 
                role="menu" 
                data-accordion="false">
                {{ Menu::renderMenu() }}
            </ul>
        </nav>    
    </div>
</aside>