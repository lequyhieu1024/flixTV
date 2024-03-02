	@include('client.layout.style')
    <div class="sign section--full-bg" data-bg="{{IMG_URL}}/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form method="POST" class="sign__form">
							<a href="{{BASE_URL}}" class="sign__logo">
								<img src="{{IMG_URL}}/logo.svg" alt="">
							</a>
						{{--  --}}
							@if (isset($_SESSION['success']) && isset($_GET['msg']))
								<span style="color:green">{{ $_SESSION['success'] }}</span>
							@endif
							<div class="sign__group">
								<input type="text" class="sign__input input_username" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>" placeholder="Họ và tên">
							<span style="color:red" class='username'></span>
							@if (isset($_SESSION['errors']) && isset($_GET['msg']))
								<span style="color:red">{{$_SESSION['errors']['username']}}</span>
							@endif
							</div>
							
						{{--  --}}
							<div class="sign__group">
								<input type="text" class="sign__input input_email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>" placeholder="Email">
								<span style="color:red" class='email'></span>
								@if (isset($_SESSION['errors']) && isset($_GET['msg']))
								<span style="color:red" class="email">{{$_SESSION['errors']['email']}}</span>
								@endif
							</div>
							
						{{--  --}}
							<div class="sign__group">
								<input type="password" class="sign__input input_password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>" placeholder="Mật khẩu">
								<span style="color:red" class='password'></span>
								@if (isset($_SESSION['errors']) && isset($_GET['msg']))
								<span style="color:red" class="password">{{$_SESSION['errors']['password']}}</span>
								@endif
							</div>
							
						{{--  --}}
							<div class="sign__group">
								<input type="password" class="sign__input input_cfpassword" name="cfpassword" value="<?php echo htmlspecialchars($_POST['cfpassword'] ?? '', ENT_QUOTES); ?>" placeholder="Xác nhận mật khẩu">
								<span style="color:red" class='cfpassword'></span>
								@if (isset($_SESSION['errors']) && isset($_GET['msg']))
								<span style="color:red" class="cfpassword">{{$_SESSION['errors']['cfpassword']}}</span>
								@endif
							</div>
							
							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Tôi đồng ý với <a href="#">Chính sách & Điều khoản</a></label>
							</div>
							
							<button class="sign__btn" type="submit">Đăng ký</button>

						<span class="sign__delimiter">hoặc</span>

							<div class="sign__social">
								<a class="fb" href="#"><svg viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.56341 16.8197V8.65888H7.81615L8.11468 5.84663H5.56341L5.56724 4.43907C5.56724 3.70559 5.63693 3.31257 6.69042 3.31257H8.09873V0.5H5.84568C3.1394 0.5 2.18686 1.86425 2.18686 4.15848V5.84695H0.499939V8.6592H2.18686V16.8197H5.56341Z"/></svg></a>
								<a class="tw" href="#"><svg viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.55075 3.19219L7.58223 3.71122L7.05762 3.64767C5.14804 3.40404 3.47978 2.57782 2.06334 1.1902L1.37085 0.501686L1.19248 1.01013C0.814766 2.14353 1.05609 3.34048 1.843 4.14552C2.26269 4.5904 2.16826 4.65396 1.4443 4.38914C1.19248 4.3044 0.972149 4.24085 0.951164 4.27263C0.877719 4.34677 1.12953 5.31069 1.32888 5.69202C1.60168 6.22165 2.15777 6.74068 2.76631 7.04787L3.28043 7.2915L2.67188 7.30209C2.08432 7.30209 2.06334 7.31268 2.12629 7.53512C2.33613 8.22364 3.16502 8.95452 4.08833 9.2723L4.73884 9.49474L4.17227 9.8337C3.33289 10.321 2.34663 10.5964 1.36036 10.6175C0.888211 10.6281 0.5 10.6705 0.5 10.7023C0.5 10.8082 1.78005 11.4014 2.52499 11.6344C4.75983 12.3229 7.41435 12.0264 9.40787 10.8506C10.8243 10.0138 12.2408 8.35075 12.9018 6.74068C13.2585 5.88269 13.6152 4.315 13.6152 3.56293C13.6152 3.07567 13.6467 3.01212 14.2343 2.42953C14.5805 2.09056 14.9058 1.71983 14.9687 1.6139C15.0737 1.41264 15.0632 1.41264 14.5281 1.59272C13.6362 1.91049 13.5103 1.86812 13.951 1.39146C14.2762 1.0525 14.6645 0.438131 14.6645 0.258058C14.6645 0.22628 14.5071 0.279243 14.3287 0.374576C14.1398 0.480501 13.7202 0.639389 13.4054 0.734722L12.8388 0.914795L12.3247 0.565241C12.0414 0.374576 11.6427 0.162725 11.4329 0.0991699C10.8978 -0.0491255 10.0794 -0.0279404 9.59673 0.14154C8.2852 0.618204 7.45632 1.84694 7.55075 3.19219Z"/></svg></a>
								<a class="gl" href="#"><svg xmlns='http://www.w3.org/2000/svg' class='ionicon' viewBox='0 0 512 512'><path d='M473.16 221.48l-2.26-9.59H262.46v88.22H387c-12.93 61.4-72.93 93.72-121.94 93.72-35.66 0-73.25-15-98.13-39.11a140.08 140.08 0 01-41.8-98.88c0-37.16 16.7-74.33 41-98.78s61-38.13 97.49-38.13c41.79 0 71.74 22.19 82.94 32.31l62.69-62.36C390.86 72.72 340.34 32 261.6 32c-60.75 0-119 23.27-161.58 65.71C58 139.5 36.25 199.93 36.25 256s20.58 113.48 61.3 155.6c43.51 44.92 105.13 68.4 168.58 68.4 57.73 0 112.45-22.62 151.45-63.66 38.34-40.4 58.17-96.3 58.17-154.9 0-24.67-2.48-39.32-2.59-39.96z'/></svg></a>
							</div>

							<span class="sign__text">Bạn đã có tài khoản? <a href="{{route('sign-in')}}">Đăng nhập!</a></span>
						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>
    @include('client.layout.script')
	<script>
		const btnSubmit = document.querySelector('.sign__btn')
		btnSubmit.addEventListener('click', (e) => {
			e.preventDefault();
			const username = document.querySelector('.input_username');
			const password = document.querySelector('.input_password');
			const email = document.querySelector('.input_email');
			const cfpassword = document.querySelector('.input_cfpassword');
			if(username.value.trim() === ""){
				document.querySelector('.username').innerHTML = "Chưa nhập tên đăng nhập"
				username.focus();
				return false;
			}else {
				document.querySelector('.username').innerHTML = "";
			}
			if(email.value.trim() === ""){
				document.querySelector('.email').innerHTML = "Chưa nhập email"
				email.focus();
				return false;
			}else {
				document.querySelector('.email').innerHTML = "";
			}
			if(password.value.trim() === ""){
				document.querySelector('.password').innerHTML = "Chưa nhập email mật khẩu"
				password.focus();
				return false;
			}else {
				document.querySelector('.password').innerHTML = "";
			}
			if(cfpassword.value.trim() === ""){
				document.querySelector('.cfpassword').innerHTML = "Chưa nhập email xác nhận mật khẩu"
				cfpassword.focus();
				return false;
			}else {
				document.querySelector('.cfpassword').innerHTML = "";
			}
			document.querySelector('.sign__form').submit();
		})
	</script>