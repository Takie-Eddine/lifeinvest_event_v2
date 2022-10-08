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
    @include('admin.layouts.navbar')
    <!-- Sidebar menu-->
    @include('admin.layouts.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Dashboard </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Dour Al-Nashr</li>
                <li class="breadcrumb-item"><a href="#">Index</a></li>
            </ul>
        </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="tile">
                        <h3 class="tile-title">Add Pblishing House</h3>
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
                                <form action="{{route('admin.dar-al-nashr.store')}}" method="POST" enctype="multipart/form-data">
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
                        <a class="btn btn-primary" href="{{route('admin.dar-al-nashr.exportods')}}">Export(.ods)</a>
                        <a class="btn btn-primary" href="{{route('admin.dar-al-nashr.exportcls')}}">Export(.csv)</a>
                        <a class="btn btn-primary" href="{{route('admin.dar-al-nashr.exportxls')}}">Export(.xls)</a>
                        <br>
                        <br>
                        <table class="table table-hover table-bordered" id="sampleTable4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <th>Wing</th>
                                    <th>First Hour</th>
                                    <th>Last Hour</th>
                                    <th>First Periode</th>
                                    <th>Last Periode</th>
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
                                        <td>{{$house->first_periode}}</td>
                                        <td>{{$house->last_periode}}</td>
                                        <td><a href="{{route('admin.dar-al-nashr.delete',$house->id)}}" class="btn btn-danger">Delete</a></td>
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

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @include('sweetalert::alert')
</body>
</html>
