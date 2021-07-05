@section('admin_navbar')
    <div>
        <ul class="navbar-nav my-navbar-nav">
            <li><a href="#" class="{{ Request::is('admin') ? 'active' : '' }}">Dashboard</a></li>
            <li class="{{ Request::is('admin/posts*') ? 'active' : '' }}"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
            <li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a href="#">Users</a></li>
            <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
            <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}"><a href="{{ route('admin.tags.index') }}">Tags</a></li>
        </ul>
    </div>
@endsection