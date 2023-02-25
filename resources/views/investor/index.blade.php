


<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta Tag -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Investor</title>

<meta name="description" content="Coming Soon Landing Page"/>
<meta name="keywords" content="Counter, html theme, Coming Soon Landing Page, Coming Soon Landing Page template, html landing page, one page, responsive landing page"/>
<meta name="author" content="kri8thm">

<!-- Favicon -->


<!-- css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

<script src="https://kit.fontawesome.com/5cd97d9bd2.js" crossorigin="anonymous"></script>

<!-- Google Font -->
{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- Start wrapper -->
<div class="wrapper theme-light">
    <!-- Start preloader -->
    <div id="loader">
        <div class="dis-table">
            <div class="dis-table-cell">
                <div class="loading"></div>
            </div>
        </div>
    </div>
    <!-- End preloader -->

    <!-- Start left side -->
    <div class="left-side col-lg-7 col-md-6 nopadding">
        <!-- Zoomin image -->
        <div class="zoomin-image cover-block"></div>

        <!-- Start left side content -->
        <div class="dis-table">
            <div class="dis-table-cell">
                <div id="logo"><img src="{{asset('assets/img/logo.png')}}" alt="One Counter"></div>
                <span class="heading">{{__('investor.investor-counter')}}</span>

                <!-- Countdown -->
                <div class="page-countdown">
                    <ul id="counter" class="countdown clearfix">
                        <li><span class="days">{{$counter_doshtu}}/{{$options->doshtu_max}}</span><i class="days_ref">{{__('investor.Investors-Number-doshtu')}}</i></li>
                        {{-- <li><span class="days">{{$counter_rekmaz}}/{{$options->rekmaz_max}}</span><i class="days_ref">{{__('investor.Investors-Number-rekmaz')}}</i></li> --}}

                    </ul>
                </div>

                <!-- Footer -->
                <footer>
                    <ul class="social clearfix">
                        <li><a href="https://www.facebook.com/lifenvst"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="https://wa.me/00905448688866?text=Investments"><i class="fa-brands fa-whatsapp"></i></i></a></li>
                        <li><a href="https://lifenvst.com/"><i class="fa-solid fa-earth-africa"></i></a></li>
                        <li><a href="https://www.instagram.com/lifenvst/"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </footer>
            </div>
        </div>
        <!-- End left side content -->
    </div>
    <!-- End left side -->

    <!-- Start right side -->
    <div class="right-side col-lg-5 col-md-6 nopadding">
       <!-- Grid -->
        {{-- <div id="grid">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div> --}}

        <!-- Menu -->
        {{-- <div id="menu" class="clearfix">
           <div class="hamburger clearfix"><a href="javascript:void(0)"><span></span></a></div>
            <nav>
                <ul class="navigation clearfix">


                </ul>
            </nav>
        </div> --}}

        <!-- Start right side content -->

        <ul id="content">
            <li class="open-tab">
                <!-- Start scroll bar -->
                <div class="scroll-bar scroll-bar-black">
                    <div class="dis-table">
                        <div class="dis-table-cell">
                            <!-- Content -->
                            <div class="table-content contact">
                                <h4>
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"  data-language="{{ $localeCode }}">
                                            @if ( $properties['native'] == 'العربية' && LaravelLocalization::getCurrentLocale() !=='ar')
                                                {{$properties['native']}}
                                            @endif
                                            @if ($properties['native'] == 'English' && LaravelLocalization::getCurrentLocale() !=='en')
                                                {{$properties['native']}}
                                            @endif
                                            </a>

                                    @endforeach
                                </h4>
                                <div class="head animatt-fast">

                                    <h1 class="main-title">{{__('investor.text1')}}</h1>
                                </div>
                                <p class="animatt-middium">{{__('investor.text2')}}</p>

                                <form  action="{{route('investor.create')}}" method="post"  class="form clearfix animatt-middium">
                                    @csrf
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="first_name" id="name" type="text" placeholder="{{__('investor.first name')}}" class="form-control" value="{{old('first_name')}}" >
                                        @error('first_name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="last_name" id="name" type="text" placeholder="{{__('investor.last name')}}" class="form-control" value="{{old('last_name')}}" >
                                        @error('last_name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="phone" id="phone" type="text" placeholder="05385014651" class="form-control"  value="{{old('phone')}}" >
                                        @error('phone')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="email" id="phone" type="text" placeholder="email@email.com" class="form-control"  value="{{old('email')}}" >
                                        @error('email')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                        <select name="country" class="form-control" id="country-dropdown">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="">{{__('investor.choose project')}} </label>
                                        <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                            <div class="form-check">
                                                <input class="form-check-input" id="online" type="radio" value="doshtu" name="project"   {{ old('project') == 'doshtu' ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="register-privacy-policy">Doshtu</label>
                                                @error("project")
                                                <span class="text-danger">{{$message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                            <div class="form-check">
                                                <input class="form-check-input" id="presence" type="radio" value="rekmaz" name="project"  {{ old('project') == 'rekmaz' ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="register-privacy-policy">Rekmaz</label>
                                                @error("project")
                                                <span class="text-danger">{{$message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <input name="city" id="name" type="text" placeholder="{{__('investor.city')}}" class="form-control" value="{{old('city')}}" >
                                        @error('city')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div> --}}

                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-0">

                                        <label for="">{{__('investor.share value')}}</label>
                                        <input name="share_value" id="share_value" type="number" placeholder="{{__('investor.share value')}}" class="form-control"  value="{{$options->share_value}}" readonly>
                                        @error('share_value')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-0">
                                        <label for="">{{__('investor.share number')}}</label>
                                        <input name="share_number" id="share_number" type="number" placeholder="{{__('investor.min')}} {{$options->min_inv}}" class="form-control"   step="{{$options->step}}" min="{{$options->min_inv}}" required>
                                        @error('share_number')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                        <input name="investment_value" id="total_1" type="number" placeholder="{{__('investor.invesment value')}}" class="form-control" readonly >
                                        @error('investment_value')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 pl-1">
                                        <div class="form-check">
                                            {{-- <input class="form-check-input" id="agree" type="checkbox" name="policies" tabindex="4" />
                                            <label class="form-check-label" for="register-privacy-policy">I agree to<a href="{{route('investor.policies')}}">&nbsp;privacy policy & terms</a></label>
                                            @error("policies")
                                            <span class="text-danger">{{$message }}</span>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                                        <input type="submit" value="{{__('investor.send')}}" class="send-btn">
                                    </div>

                                    <div class="clearfix"></div>
                                    <div id="success"></div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End scroll bar -->
            </li>
            <li>
                <!-- Start scroll bar -->

                <!-- End scroll bar -->
            </li>
            <li>
                <!-- Start scroll bar -->

                <!-- End scroll bar -->
            </li>
            <li>
                <!-- Start scroll bar -->

                <!-- End scroll bar -->
            </li>
        </ul>
        <!-- End right side content -->
    </div>
    <!-- End right side -->
</div>
<!-- End wrapper -->
	@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<!-- Scripts -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.downCount.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<script>
    // $(document).ready(function() {

    //     $('#country-dropdown').on('change', function() {
    //         var country_id = this.value;
    //         $("#city-dropdown").html('');
    //         $.ajax({
    //             url:"{{url('get-cities-by-country')}}",
    //             type: "POST",
    //             data: {
    //             country_id: country_id,
    //             _token: '{{csrf_token()}}'
    //             },
    //             dataType : 'json',
    //             success: function(result){
    //                 $('#city-dropdown').html('<option value="">Select City</option>');
    //                 $.each(result.cities,function(key,value){
    //                 $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    //                 });
    //             }
    //         });
    //     });
    // });
</script>
<script>
    $('#share_value, #share_number').click(function(){
        var value = parseFloat($('#share_value').val());
        var number = parseFloat($('#share_number').val());

        $('#total_1').val(value * number );
    });
</script>
@include('sweetalert::alert')

</body>
</html>


