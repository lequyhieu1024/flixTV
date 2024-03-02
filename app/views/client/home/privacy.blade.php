@extends('client.layout.main')
@section('content')
    <section class="section section--head">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-6">
					<h1 class="section__title section__title--head">Chính sách Quyền riêng tư</h1>
				</div>

				<div class="col-12 col-xl-6">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="{{ BASE_URL }}">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Chính sách Quyền riêng tư</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- end head -->

	<section class="section section--pb0 section--gradient">
		<div class="container">
			<div class="row">
				<!-- section text -->
				<div class="col-12">
					<p class="section__text section__text--small">Chào mừng bạn đến với trang web xem phim của chúng tôi. Tại đây, chúng tôi cam kết bảo vệ quyền riêng tư của bạn. Vui lòng đọc kỹ chính sách quyền riêng tư dưới đây để hiểu rõ cách chúng tôi thu thập, sử dụng và bảo vệ thông tin của bạn</p>

					{{-- <p class="section__text section__text--small">Many desktop publishing packages and <a href="#">web page</a> editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

					<p class="section__text section__text--small">All the Lorem Ipsum generators on the <b>Internet</b> tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> --}}
				</div>
				<!-- end section text -->

				<!-- section list -->
				<div class="col-12">
					<div class="section__list">
						<ol>
							<li>
								<h4>Thông tin Thu thập</h4>
								<ol>
									{{-- <li>If you are going to use a passage of Lorem Ipsum:
										<ol>
											<li>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</li>
											<li>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</li>
										</ol>
									</li>
									<li>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</li> --}}
									<li>Chúng tôi có thể thu thập thông tin cá nhân từ bạn khi bạn đăng ký tài khoản, đăng nhập, thực hiện giao dịch hoặc sử dụng dịch vụ của chúng tôi. Thông tin này có thể bao gồm tên, địa chỉ email, địa chỉ, số điện thoại, thông tin thanh toán và các thông tin khác liên quan..</li>
								</ol>
							</li>

							<li>
								<h4>Sử dụng Thông tin</h4>
								<ol>
									<li>Chúng tôi sử dụng thông tin thu thập từ bạn để cung cấp dịch vụ, xử lý thanh toán, cung cấp hỗ trợ khách hàng, gửi thông tin cập nhật về dịch vụ và sản phẩm, và tùy chỉnh trải nghiệm của bạn trên trang web của chúng tôi.</li>
								</ol>
							</li>
							<li>
								<h4>Bảo mật Thông tin</h4>
								<ol>
									<li>Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn và áp dụng các biện pháp bảo mật hợp lý để bảo vệ nó khỏi mất mát, lạc hậu, truy cập trái phép, tiết lộ hoặc sử dụng không đúng cách.</li>
								</ol>
							</li>
							<li>
								<h4>Chia sẻ Thông tin</h4>
								<ol>
									<li>Chúng tôi không bán, trao đổi hoặc chia sẻ thông tin cá nhân của bạn với bên thứ ba trừ khi có sự đồng ý của bạn hoặc khi cần thiết để cung cấp dịch vụ của chúng tôi, tuân thủ các yêu cầu pháp lý hoặc bảo vệ quyền lợi, tài sản hoặc an toàn của chúng tôi và của người khác.</li>
								</ol>
							</li>
							<li>
								<h4>Quyền của bạn</h4>
								<ol>
									<li>Bạn có quyền truy cập, sửa đổi hoặc xóa thông tin cá nhân mà chúng tôi thu thập từ bạn. Bạn cũng có quyền từ chối sự sử dụng hoặc xử lý thông tin của bạn trong một số trường hợp. Vui lòng liên hệ với chúng tôi nếu bạn muốn thực hiện các quyền này.</li>
								</ol>
							</li>
							<li>
								<h4>Thay đổi Chính sách</h4>
								<ol>
									<li>Chúng tôi có thể cập nhật Chính sách Quyền riêng tư này vào lúc bất kỳ mà chúng tôi cho là cần thiết. Bằng cách tiếp tục sử dụng trang web của chúng tôi sau khi các thay đổi này được đăng, bạn đồng ý với các thay đổi này.</li>
								</ol>
							</li>
							<li>
								<h4>Liên hệ</h4>
								<ol>
									<li>Nếu bạn có bất kỳ câu hỏi hoặc quan ngại nào về Chính sách Quyền riêng tư của chúng tôi, vui lòng liên hệ với chúng tôi qua email hoặc địa chỉ được cung cấp trên trang web của chúng tôi.</li>
								</ol>
							</li>
						</ol>
					</div>
				</div>
				<!-- end section list -->

				<!-- section text -->
				{{-- <div class="col-12">
					<p class="section__text section__text--small">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
				</div> --}}
				<!-- end section text -->
			</div>
		</div>
	</section>

	<!-- partners -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="partners owl-carousel">
						<a href="#" class="partners__img">
							<img src="img/partners/3docean-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/activeden-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/audiojungle-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/codecanyon-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/photodune-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/themeforest-light-background.png" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection