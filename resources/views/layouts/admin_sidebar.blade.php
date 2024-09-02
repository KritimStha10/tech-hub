<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-speedometer"></i>
                <span class="menu-title">Dashboard</span>
            </div>
        </a>
    </li>


        <li class="nav-item @if(Request::segment(1) == 'posts') active @endif">
            <a class="nav-link" href="{{ url('admin/posts') }}">
                <div class="sidebar-icon w-100">
                    <i class="bi bi-plus-circle"></i>
                    <span class="menu-title w-100">Add Post</span>
                </div>
            </a>
        </li>

</ul>


