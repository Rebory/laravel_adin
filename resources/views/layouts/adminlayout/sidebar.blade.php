<div class="slim-body">
    <div class="slim-sidebar">
        <label class="sidebar-label">Navigation</label>
        <ul class="nav nav-sidebar">
            <li class="sidebar-nav-item">
                <a href="{{ url('/admin/dashboard') }}" class="sidebar-nav-link"><i class="fa fa-home"></i> Dashboard</a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ url('/admin/posts/create') }}" class="sidebar-nav-link"><i class="fa fa-pencil-square"></i> New Post</a>
            </li>

            <li class="sidebar-nav-item">
                <a href="{{ url('/admin/posts') }}" class="sidebar-nav-link"><i class="fa fa-reorder"></i>  All Post</a>
            </li>
            
            <li class="sidebar-nav-item with-sub">
                <a href="" class="sidebar-nav-link"><i class="fa fa-plus-square"></i>Frontend UI</a>
                <ul class="nav sidebar-nav-sub">
                    <li class="nav-sub-item"><a href="{{ url('/admin/logo') }}" class="nav-sub-link">Update logo</a></li>
                    <li class="nav-sub-item"><a href="{{ url('/admin/categories') }}" class="nav-sub-link">Add Post Category</a></li>
                    <li class="nav-sub-item"><a href="{{ url('/admin/sliders') }}" class="nav-sub-link">Update Slider</a></li>
                    <li class="nav-sub-item"><a href="{{ url('/admin/dashboard') }}" class="nav-sub-link">Header/footer</a></li>
                </ul>
            </li>
            
            <li class="sidebar-nav-item">
                <a href="{{ url('/admin/settings') }}" class="sidebar-nav-link"><i class="fa fa-gear"></i> Settings</a>
            </li>
            
            <li class="sidebar-nav-item">
                <a href="{{url('/logout')}}" class="sidebar-nav-link"><i class="fa fa-power-off"></i> LogOut</a>
            </li>
        </ul>
    </div>
    <!-- slim-sidebar -->