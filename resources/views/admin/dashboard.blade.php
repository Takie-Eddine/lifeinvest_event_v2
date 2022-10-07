<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">
            <li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Setting</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{route('admin.index')}}"><i class="icon fa fa-circle-o"></i>Index</a></li>
                    {{-- <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i>Edit</a></li> --}}

                </ul>
            </li>
        </ul>
    </aside>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Options </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Options</li>
                <li class="breadcrumb-item"><a href="#">Edit</a></li>
            </ul>
        </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="tile">
                        <h3 class="tile-title">Edit Options</h3>
                        <div class="tile-body">
                            @include('admin.alerts.errors')
                            @include('admin.alerts.success')
                                <form action="{{route('admin.edit',$options->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$options->id}}">
                                <div class="form-group">
                                    <label class="control-label">Min Inv</label>
                                    <input class="form-control" type="number" placeholder="Enter min inv" name="min_inv" value="{{$options->min_inv}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Step</label>
                                    <input class="form-control" type="number" placeholder="Enter step" name="step" value="{{$options->step}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Share Value</label>
                                    <input class="form-control" type="number" placeholder="Enter share value" name="share_value" value="{{$options->share_value}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Max Value</label>
                                    <input class="form-control" type="number" placeholder="Enter max value" name="max_value" value="{{$options->max_value}}">
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;
                                    {{-- <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tile">
                        <h3 class="tile-title">Participants</h3>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>participation</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $participant)
                                    <tr>
                                        <td>{{$participant->id}}</td>
                                        <td>{{$participant->first_name}}</td>
                                        <td>{{$participant->last_name}}</td>
                                        <td>{{$participant->phone}}</td>
                                        <td>{{$participant->email }}</td>
                                        <td>{{$participant->participation }}</td>
                                        <td>{{$participant->country->name}}</td>

                                        <td><a href="{{route('admin.delete.participant',$participant->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tile">
                        <h3 class="tile-title">Investors</h3>
                        <table class="table table-hover table-bordered" id="sampleTable1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Share Number</th>
                                    <th>Investment Value</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investors as $investor)
                                    <tr>
                                        <td>{{$investor->id}}</td>
                                        <td>{{$investor->first_name}}</td>
                                        <td>{{$investor->last_name}}</td>
                                        <td>{{$investor->phone}}</td>
                                        <td>{{$investor->email}}</td>
                                        <td>{{$investor->country->name}}</td>
                                        <td>
                                            @foreach ($investor->shares as $item)
                                                <span class="fw-bold">{{$item->share_number}} ,</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($investor->shares as $item)
                                                <span class="fw-bold">{{$item->investment_value}} ,</span>
                                            @endforeach
                                        </td>
                                        <td><a href="{{route('admin.delete.investor',$investor->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">Number Of Participants</h3>

                        </div>
                        <div class="tile-body">
                            <h2>{{$participants->count()}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">Number of Investors</h3>
                        </div>
                        <div class="tile-body">
                            <div>
                                <span><h6>Real Number Of Investors:</h6></span>
                                <h2>{{$investors->count()}}</h2>
                            </div>
                            <div>
                                <span><h6>Number Of Investors:</h6></span>
                                <h2>{{$counter}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Persones</h3>
                        <table class="table table-hover table-bordered" id="sampleTable2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Bussines Card</th>
                                    <th>Doshtu</th>
                                    <th>RekMaz</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persones as $persone)
                                    <tr>
                                        <td>{{$persone->id}}</td>
                                        <td>{{$persone->first_name}}</td>
                                        <td>{{$persone->last_name}}</td>
                                        <td>{{$persone->phone}}</td>
                                        <td>{{$persone->email}}</td>
                                        <td><img src="{{asset('assets/Image/'.$persone->photo) }}"style="height: 100px; width: 150px;"></td>
                                        <td>{{$persone->getActive()}}</td>
                                        <td>{{$persone->getActive1()}}</td>
                                        <td><a href="{{route('admin.delete.persone',$persone->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">New Winner</h3>
                        <table class="table table-hover table-bordered" id="sampleTable3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!--<th>Number</th>-->
                                    <th>Full Name</th>
                                    <th>Phone Number</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partics as $partic)
                                    <tr>
                                        <td>{{$partic->id}}</td>
                                        <!--<td>{{$partic->number}}</td>-->
                                        <td>{{$partic->full_name}}</td>
                                        <td>{{$partic->phone_number}}</td>
                                        <td><a href="{{route('admin.delete.partics',$partic->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="tile">
                        <h3 class="tile-title">Add Pblishing Huse</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h3>Error Occured!</h3>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="tile-body">
                            @include('admin.alerts.errors')
                            @include('admin.alerts.success')
                                <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input class="form-control" type="text" placeholder="Enter Name" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Logo</label>
                                    <input class="form-control" type="file" name="logo">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Wing</label>
                                    <input class="form-control" type="text" placeholder="Enter Wing" name="wing" value="{{old('wing')}}">
                                </div>
                              <div class="form-group">
                                    <label class="control-label">First Hour</label>
                                    <input class="form-control" type="text" placeholder="Enter First Hour" name="first_hour" value="{{old('first_hour')}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Last Hour</label>
                                    <input class="form-control" type="text" placeholder="Enter Last Hour" name="last_hour" value="{{old('last_hour')}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">First Periode</label>
                                    <input class="form-control" type="number" placeholder="Enter First Periode" name="first_periode" value="{{old('first_periode')}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Last Periode</label>
                                    <input class="form-control" type="number" placeholder="Enter Last Periode" name="last_periode" value="{{old('last_periode')}}">
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;
                                    {{-- <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tile">
                        <h3 class="tile-title">Dour Al-Nashr</h3>
                        <table class="table table-hover table-bordered" id="sampleTable4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <th>Wing</th>
                                    <th>First Hour</th>
                                    <th>Last Hour</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($houses as $house)
                                    <tr>
                                        <td>{{$house->id}}</td>
                                        <td>{{$house->name}}</td>
                                        <td><img src="{{asset('assets/Image/'.$house->logo) }}"style="height: 100px; width: 150px;"></td>
                                        <td>{{$house->wing}}</td>
                                        <td>{{$house->first_hour}}</td>
                                        <td>{{$house->last_hour}}</td>
                                        <td><a href="{{route('admin.delete.dar',$house->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="{{asset('assets/admin/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('assets/admin/js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript">$('#sampleTable1').DataTable();</script>
    <script type="text/javascript">$('#sampleTable2').DataTable();</script>
    <script type="text/javascript">$('#sampleTable3').DataTable();</script>
    <script type="text/javascript">$('#sampleTable4').DataTable();</script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
        if(document.location.hostname == 'pratikborsadiya.in') {
        	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        	    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	    ga('create', 'UA-72504830-1', 'auto');
      	    ga('send', 'pageview');
        }
    </script>
</body>
</html>
