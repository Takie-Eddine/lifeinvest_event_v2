<!doctype html>
<html lang="en">
  <head>
  	<title>Contact Form 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('assets/persone/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				{{-- <div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Registration Form </h2>
				</div> --}}
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
								    <img   width="200px" src="{{asset('assets/Image/logo-03.png')}}" >
									<!--<h3 class="mb-4">Get in touch</h3>-->
									<br>
										<br>
									<div id="form-message-warning" class="mb-4"></div>
									<form action="{{route('lead.create')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">First Name*</label>
													<input type="text" class="form-control" name="first_name" id="name" placeholder="First Name" value ="{{old('first_name')}}">
												</div>
                                                @error("first_name")
                                                    <span class="text-danger">{{$message }}</span>
                                                @enderror
											</div>
                                            <div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Last Name*</label>
													<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"value ="{{old('last_name')}}">
												</div>
                                                @error("last_name")
                                                    <span class="text-danger">{{$message }}</span>
                                                @enderror
											</div>
                                            <div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Phone Number* </label>
													<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value ="{{old('phone')}}">
												</div>
                                                @error("phone")
                                                    <span class="text-danger">{{$message }}</span>
                                                @enderror
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Email* </label>
													<input type="email" class="form-control" name="email" id="email" placeholder="email@email" value = "{{old('email')}}">
												</div>
                                                @error("email")
                                                    <span class="text-danger">{{$message }}</span>
                                                @enderror
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Message</label>
													<textarea name="note" class="form-control" id="message" cols="30" rows="4" placeholder="Message">{{old('note')}}</textarea>
												</div>
                                                @error("note")
                                                    <span class="text-danger">{{$message }}</span>
                                                @enderror
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Submit" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<!--<img src="{{asset('assets/Image/logo.png')}}" >Let's get in touch</img>-->
									<!--<p class="mb-4">We're open for any suggestion or just to have a chat</p>-->
				     <!--   	<div class="dbox w-100 d-flex align-items-start">-->
				     <!--   		<div class="icon d-flex align-items-center justify-content-center">-->
				     <!--   			<span class="fa fa-map-marker"></span>-->
				     <!--   		</div>-->
				     <!--   		<div class="text pl-3">-->
					    <!--        <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>-->
					    <!--      </div>-->
				     <!--     </div>-->
				     <!--   	<div class="dbox w-100 d-flex align-items-center">-->
				     <!--   		<div class="icon d-flex align-items-center justify-content-center">-->
				     <!--   			<span class="fa fa-phone"></span>-->
				     <!--   		</div>-->
				     <!--   		<div class="text pl-3">-->
					    <!--        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>-->
					    <!--      </div>-->
				     <!--     </div>-->
				     <!--   	<div class="dbox w-100 d-flex align-items-center">-->
				     <!--   		<div class="icon d-flex align-items-center justify-content-center">-->
				     <!--   			<span class="fa fa-paper-plane"></span>-->
				     <!--   		</div>-->
				     <!--   		<div class="text pl-3">-->
					    <!--        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>-->
					    <!--      </div>-->
				     <!--     </div>-->
				     <!--   	<div class="dbox w-100 d-flex align-items-center">-->
				     <!--   		<div class="icon d-flex align-items-center justify-content-center">-->
				     <!--   			<span class="fa fa-globe"></span>-->
				     <!--   		</div>-->
				     <!--   		<div class="text pl-3">-->
					    <!--        <p><span>Website</span> <a href="#">yoursite.com</a></p>-->
					    <!--      </div>-->
				     <!--     </div>-->
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="{{asset('assets/persone/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/persone/js/popper.js')}}"></script>
  <script src="{{asset('assets/persone/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/persone/js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('assets/persone/js/main.js')}}"></script>

	</body>
</html>
