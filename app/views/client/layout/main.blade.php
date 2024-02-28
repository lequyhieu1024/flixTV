<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flixtv.volkovdesign.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 08:34:46 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	@include('client.layout.style')

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{ IMG_URL }}/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ IMG_URL }}/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>{{$tittle}}</title>

</head>

<body>
	<!-- header (relative style) -->
	@include('client.layout.header')
	<!-- end header -->

	<!-- home -->
    @yield('content')
	<!-- end home -->
	
	<!-- footer -->
	@include('client.layout.footer')
	
	<!-- end footer -->

	<!-- JS -->
	@include('client.layout.script')
</body>

<!-- Mirrored from flixtv.volkovdesign.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 08:35:08 GMT -->
</html>