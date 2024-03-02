	@include('client.layout.style')
    <div class="sign section--full-bg" data-bg="{{IMG_URL}}/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form method="POST" class="sign__form">
							<a href="{{BASE_URL}}" class="sign__logo">
								<img src="{{IMG_URL}}/logo.svg" alt="">
							</a>
							@if (isset($_SESSION['success']) && isset($_GET['msg']))
								<span style="color:green">{{ $_SESSION['success'] }}</span>
							@endif
							<div class="sign__group">
								<input type="text" class="sign__input" name="email" placeholder="Email">
								@if (isset($_SESSION['errors']) && isset($_GET['msg']))
									<span style="color:red">{{ $_SESSION['errors']['email'] }}</span>
								@endif
							</div>
							
							{{-- <div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">I agree to the <a href="privacy.html">Privacy Policy</a></label>
							</div> --}}
							
							<button class="sign__btn" type="submit">Gửi email </button>

							<span class="sign__text">Sau khi gửi email thành công,hãy kiểm tra email của bạn</span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>
    @include('client.layout.script')
	