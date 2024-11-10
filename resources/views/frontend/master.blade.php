
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Fruitkha - Slider Version</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://themewagon.github.io/fruitkha/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://themewagon.github.io/fruitkha/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="https://themewagon.github.io/fruitkha/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="https://themewagon.github.io/fruitkha/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="https://themewagon.github.io/fruitkha/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="https://themewagon.github.io/fruitkha/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href=" {{asset('/asset/CSS/style.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('/asset/CSS/responsive.css')}}">

</head>
<body>
	
	<!-- PreLoader -->
    <!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
    <!--PreLoader Ends-->
	
	<!-- header -->
   @include('frontend.pages.header')

  @yield('content')
	<!-- footer -->
	@include('frontend.pages.footer')
	<!-- end footer -->
	
	<!-- copyright -->
	
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="https://themewagon.github.io/fruitkha/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="https://themewagon.github.io/fruitkha/assets/js/main.js"></script>

</body>
</html>