@section('admin_navbar')
    <div>
        <ul class="navbar-nav my-navbar-nav">
            <li><a href="{{ route('admin.index') }}" class="{{ Request::is('admin') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('admin.posts.index') }}" class="{{ Request::is('admin/posts*') ? 'active' : '' }}">Posts</a></li>
            <li><a href="#" class="{{ Request::is('admin/users*') ? 'active' : '' }}">Users</a></li>
            <li><a href="{{ route('admin.categories.index') }}" class="{{ Request::is('admin/categories*') ? 'active' : '' }}">Categories</a></li>
            <li><a href="{{ route('admin.tags.index') }}" class="{{ Request::is('admin/tags*') ? 'active' : '' }}">Tags</a></li>
        </ul>
    </div>
@endsection