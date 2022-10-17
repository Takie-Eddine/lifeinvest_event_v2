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
                <li class="breadcrumb-item">Leads</li>
                <li class="breadcrumb-item"><a href="#">Archive</a></li>
            </ul>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Archive</h3>
                        <a href="{{route('admin.leads.index')}}" class="btn btn btn-info btn-rounded btn-fw">Back</a>
                        <br>
                        <br>
                        <form action="{{route('admin.leads.exportods')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">From</label>
                                <input type="date" class="form-control inpust-sm" name="started">
                            </div>
                            <div class="form-group">
                                <label class="control-label">To</label>
                                <input type="date" class="form-control inpust-sm" name="endded">
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Export(.ods)</button>&nbsp;&nbsp;&nbsp;
                            </div>
                        </form>
                        <form action="" method="POST">
                            @csrf
                        </form>
                        <form action="" method="POST">
                            @csrf
                        </form>
                        {{-- <a class="btn btn-primary" href="{{route('admin.leads.exportods')}}">Export(.ods)</a>
                        <a class="btn btn-primary" href="{{route('admin.leads.exportcls')}}">Export(.csv)</a>
                        <a class="btn btn-primary" href="{{route('admin.leads.exportxls')}}">Export(.xls)</a> --}}
                        <br>
                        <br>
                        <table class="table table-hover table-bordered" id="sampleTable2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Office Phone </th>
                                    <th>Email</th>
                                    <th>Bussines Card</th>
                                    <th>Added By</th>
                                    <th>Doshtu</th>
                                    <th>RekMaz</th>
                                    <th>Undefined</th>
                                    <th>Note</th>
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
                                        <td>{{$persone->ofice_phone}}</td>
                                        <td>{{$persone->email}}</td>
                                        <td><img src="{{asset('assets/Image/'.$persone->photo) }}"style="height: 100px; width: 150px;"></td>
                                        <td>{{$persone->employe}}</td>
                                        <td>{{$persone->getDoshtu()}}</td>
                                        <td>{{$persone->getRekmaz()}}</td>
                                        <td>{{$persone->getundefined()}}</td>
                                        <td>{{$persone->note}}</td>
                                        <td><a href="{{route('admin.leads.force-delete',$persone->id)}}" class="btn btn-danger">Delete</a></td>
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
