<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flixtv.volkovdesign.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 08:36:59 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	@include('admin.layout.style')

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{IMG_URL}}icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="{{IMG_URL}}icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixTV – Movies & TV Shows, Online cinema HTML Template</title>

</head>
<body>
	<!-- header -->
	@include('admin.layout.header')
	<!-- end header -->

	<!-- sidebar -->
	@include('admin.layout.sidebar')
	<!-- end sidebar -->

	<!-- main content -->
	@yield('content')
	<!-- end main content -->

	<!-- JS -->
	@include('admin.layout.script')
	@yield('script')
</body>

<!-- Mirrored from flixtv.volkovdesign.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 08:37:06 GMT -->
</html>