<script src="{{ BASE_URL.'public/client/'}}js/jquery-3.5.1.min.js"></script>
<script src="{{ BASE_URL.'public/client/'}}js/bootstrap.bundle.min.js"></script>
<script src="{{ BASE_URL.'public/client/'}}js/owl.carousel.min.js"></script>
<script src="{{ BASE_URL.'public/client/'}}js/slider-radio.js"></script>
<script src="{{ BASE_URL.'public/client/'}}js/select2.min.js"></script>
<script src="{{ BASE_URL.'public/client/'}}js/smooth-scrollbar.js"></script>
<script src="{{ BASE_URL.'public/client/'}}js/jquery.magnific-popup.min.js"></script>
<script src="{{ BASE_URL.'public/client/'}}js/plyr.min.js"></script>
<script src="{{ BASE_URL.'public/client/'}}js/main.js"></script>
<script>
	const apply = document.querySelector('.btn-apply');
	apply.addEventListener('click',() => {
		window.location.href = "{{route('sign-out')}}"
	})
	// console.log(apply)
	$('.modal__btn--dismiss').on('click', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});
</script>
{{-- <script>
	window.addEventListener('unload', function() {
		alert('jis')
	});
</script> --}}