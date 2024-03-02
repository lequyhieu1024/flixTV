@extends('admin.layout.main')
@section('content')
<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Comments</h2>

						<span class="main__title-stat">21 356 total</span>

						<div class="main__title-wrap">
							<!-- filter sort -->
							<div class="filter" id="filter__sort">
								<span class="filter__item-label">Sort by:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Date created">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
									<li>Date created</li>
									<li>Rating</li>
								</ul>
							</div>
							<!-- end filter sort -->
							
							<!-- search -->
							<form action="#" class="main__title-form">
								<input type="text" placeholder="Key word..">
								<button type="button">
									<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="8.25998" cy="8.25995" r="7.48191" stroke="#2F80ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle><path d="M13.4637 13.8523L16.3971 16.778" stroke="#2F80ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
								</button>
							</form>
							<!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->
			
				<!-- comments -->
				<div class="col-12">
				@if(isset($_SESSION['success']) && isset($_GET['msg']))
					<span style="color:green">{{ $_SESSION['success'] }}</span>
				@endif
					<div class="main__table-wrap">
						<table class="main__table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nội dung</th>
									<th>Tác giả</th>
									<th>Phim</th>
									<th>LIKE / DISLIKE</th>
									<th>Ngày bình luận</th>
									<th>ACTIONS</th>
								</tr>
							</thead>

							<tbody>
								@foreach ($comments as $item)
									<tr>
										<td>
											<div class="main__table-text">{{ $item->comment_id }}</div>
										</td>
										<td>
											<div class="main__table-text">
												<a href="#">
													 @php
														$words = explode(' ', $item->comment); // Phân tách chuỗi thành từng từ
														if (count($words) > 4) {
															$shortened = implode(' ', array_slice($words, 0, 4)); // Lấy 5 đến 6 từ đầu tiên và nối lại
															echo mb_substr($shortened. ' ...', 0, 255, 'UTF-8'); // Giới hạn chuỗi thành 255 ký tự
														} else {
															echo $item->comment; // Không phân tách nếu chuỗi ít hơn 6 từ
														}
													@endphp
												</a>
											</td>
										<td>
											<div class="main__table-text">{{ $item->username }} </div>
										</td>
										<td>
											<div class="main__table-text">
												 @php
													$words = explode(' ', $item->title); // Phân tách chuỗi thành từng từ
													if (count($words) > 5) {
														$shortened = implode(' ', array_slice($words, 0, 5)); // Lấy 5 đến 6 từ đầu tiên và nối lại
														echo mb_substr($shortened. ' ...', 0, 255, 'UTF-8'); // Giới hạn chuỗi thành 255 ký tự
													} else {
														echo $item->title; // Không phân tách nếu chuỗi ít hơn 6 từ
													}
												@endphp
											</div>
										</td>
										<td>
											<div class="main__table-text">{{$item->like}} / {{ $item->dislike}}</div>
										</td>
										<td>
											<div class="main__table-text">{{ $item->create_at }}</div>
										</td>
										<td>
											<div class="main__table-btns">
												{{-- <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
												</a> --}}
												<a href="{{routeAdmin('comments/delete/'.$item->comment_id)}}" onclick="return confirm('Bạn có muốn xóa bình luận này không ?')" class="main__table-btn main__table-btn--delete">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg>
												</a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- end comments -->

				<!-- paginator -->
				<div class="col-12">
					<div class="paginator">
						<span class="paginator__pages">10 from 21 356</span>

						<ul class="paginator__paginator">
							<li>
								<a href="#">
									<svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.75 5.36475L13.1992 5.36475" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M5.771 10.1271L0.749878 5.36496L5.771 0.602051" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
								</a>
							</li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li>
								<a href="#">
									<svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1992 5.3645L0.75 5.3645" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.17822 0.602051L13.1993 5.36417L8.17822 10.1271" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</main>
	<!-- end main content -->

	<!-- modal view -->
	{{-- <div id="modal-view" class="zoom-anim-dialog mfp-hide modal modal--view">
		<div class="comments__autor">
			<img class="comments__avatar" src="img/user.svg" alt="">
			<span class="comments__name"></span>
			<span class="comments__time">30.08.2018, 17:53</span>
		</div>
		<p class="comments__text">{{ $item->comment }}</p>
		<div class="comments__actions">
			<div class="comments__rate">
				<span><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 7.3273V14.6537" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg> 12</span>

				<span>7<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
			</div>
		</div>
	</div> --}}
	<!-- end modal view -->

	<!-- modal delete -->
	{{-- <div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Comment delete</h6>

		<p class="modal__text">Are you sure to permanently delete this comment?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Delete</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div> --}}
@endsection
<script>

</script>