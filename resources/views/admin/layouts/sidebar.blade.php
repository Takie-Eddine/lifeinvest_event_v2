<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">
            @can('participant')
                <li><a class="treeview-item" href="{{route('admin.participant.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Participants</a>

                </li>
            @endcan

            @can('investor')
                <li><a class="treeview-item" href="{{route('admin.investor.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Investors</a>

                </li>
            @endcan

            @can('winner')
                <li><a class="treeview-item" href="{{route('admin.leads.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Leads</a>

                </li>
            @endcan

            @can('leads')
                <li><a class="treeview-item" href="{{route('admin.winner.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Winners</a>

                </li>
            @endcan

            @can('dar-al-nashr')
                <li><a class="treeview-item" href="{{route('admin.dar-al-nashr.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Dour Al-Nashr</a>

                </li>
            @endcan

            @can('newlife')
                <li><a class="treeview-item" href="{{route('admin.newlife.index')}}"><i class="app-menu__icon fa fa-th-list"></i> New Life</a>

                </li>
            @endcan

            @can('users')
                <li><a class="treeview-item" href="{{route('admin.users.index')}}"><i class="app-menu__icon fa fa-th-list"></i> Users</a>

                </li>
            @endcan

            @can('permission')
                <li><a class="treeview-item" href="{{route('admin.permission.index')}}"><i class="app-menu__icon fa fa-th-list"></i>Permission</a>

                </li>
            @endcan
        </ul>
    </aside>
