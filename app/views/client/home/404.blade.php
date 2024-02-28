	@include('client.layout.style')
    <div class="page-404 section--full-bg" data-bg="{{IMG_URL}}/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-404__wrap">
						<div class="page-404__content">
							<h1 class="page-404__title">404</h1>
							<p class="page-404__text">The page you are looking for not available!</p>
							<a href="{{BASE_URL}}" class="page-404__btn">go back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @include('client.layout.script')