<header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->

    <ul class="app-nav">
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
                <i class="fa fa-bell-o fa-lg">
                    @if (auth()->user()->unreadNotifications->count() > 0)
                        <span class="badge badge badge-danger badge-pill float-right mr-2">{{auth()->user()->unreadNotifications->count()}}</span>
                    @endif
                </i>
            </a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <div  class="app-notification__title" id="notification_counter">You have {{auth()->user()->unreadNotifications->count()}} new notifications.</div>
                    <div class="app-notification__content">

                        <div class="app-notification__content" >
                            <div id="notification_body">
                                @foreach (auth()->user()->unreadNotifications as $notification)

                                <li>
                                    <a class="app-notification__item" href="{{route('admin.notification.read')}}"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                        <div>
                                            <p class="app-notification__message">{{$notification->data['title']}}</p>
                                            <p class="app-notification__meta">{{$notification->data['first_name']}} {{$notification->data['last_name']}}</p>
                                            <p class="app-notification__meta">{{$notification->created_at}}</p>
                                        </div>
                                    </a>
                                </li>

                            @endforeach
                            </div>
                        </div>
                    </div>
                    <li class="app-notification__footer"><a href="{{route('admin.notification')}}">See all notifications.</a></li>
                    @if (auth()->user()->unreadNotifications->count() > 0)
                        <li class="app-notification__footer"><a class="btn btn-dark" href="{{route('admin.notification.read')}}"><i class="fa fa-envelope-open-o"></i>Mark as read</a></li>
                    @endif

            </ul>
        </li>
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>



