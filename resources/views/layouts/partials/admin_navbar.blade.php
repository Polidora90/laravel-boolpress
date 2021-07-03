@section('admin_navbar')
    <div>
        <ul class="navbar-nav my-navbar-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Tags</a></li>
        </ul>
    </div>
@endsection