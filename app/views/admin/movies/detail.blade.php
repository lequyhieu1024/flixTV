@extends('admin.layout.main')
@section('content')
    <main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2 class="col-6 col-md-6 col-lg6">Chi tiết phim</h2>
						<h2 class="col-6 col-md-6 col-lg6"><a href="{{routeAdmin('links/add')}}" class="main__title-link">+ tập phim mới</a></h2>
					</div>
				</div>
				<!-- end main title -->
				
				<!-- form -->
				<div class="col-12">
					{{-- @if (isset($_SESSION['errors']) && isset($_GET['msg']))
						@foreach ($_SESSION['errors'] as $item)
							<span style="color:red">{{$item}} ! </span> <br>
						@endforeach
					@endif
					@if (isset($_SESSION['success']) && isset($_GET['msg']))
						<span style="color:green">{{$_SESSION['success']}} </span> <br>
					@endif --}}
					<form method="POST" class="form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-md-6 col-md-12">
										{{-- <label style="color:white" for="form__img-upload">ảnh nền phim</label> --}}
										<div class="form__img">
											<input id="form__img-upload" name="thumbnail_movie" type="file">
											<img id="form__img" src="{{IMG_URL .'thumbnail/'. $movie->thumbnail_movie}}" alt=" ">
										</div>
									</div>
									<div class="col-12 col-md-6 form__cover mb-2">
											{{-- <label id="gallery1" for="form__gallery-upload">Không thể cập nhật hình nền trailler</label> --}}
											<img style="border-radius: 20px;width:270px;height:190px" class="img-fluid" src="{{IMG_URL .'thumbnail/'. $movie->thumbnail_trailer}}" alt="">
									</div>
								</div>
							</div>
							
							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12">
										<div class="form__group">
											<input disabled type="text" class="form__input" name="title" value="{{$movie->title}}">
										</div>
									</div>

									<div class="col-12">
										<div class="form__group">
											<textarea disabled id="text" name="description" class="form__textarea" >{{$movie->description}}</textarea>
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input disabled type="date" class="form__input" name="release_date" value="{{$movie->release_date}}">
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input disabled type="text" class="form__input" name="duration_minutes" value="{{$movie->duration_minutes}}" placeholder="Thời lượng: phút">
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input disabled type="text" class="form__input" name="author" value="{{$movie->author}}">
										</div>
									</div>
                                    
                                    <div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input disabled type="number" class="form__input" name="rating" value="{{$movie->rating}}">
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="form__group">
											<input disabled type="text" class="form__input" name="nation" value="{{$movie->nation}}">
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="form__group">
											<input disabled type="text" class="form__input" name="name" value="{{$movie->name}}">
										</div>
									</div>
									<div class="col-12 mt-5">
										<div class="row">
											<div class="col-12 col-lg-12">
												<p style="color:white">link trailer</p>
												<div class="form__group form__group--link">
													<input disabled type="text" class="form__input" name="link_trailer" value="{{$movie->link_trailer}}">
												</div>
											</div>

											<div class="col-12 col-lg-12">
												@if (empty($links) )
													<p style="color:white">link phim</p>
													
												@else
													<p style="color:white">link phim tập 1</p>
												@endif

												<div class="form__group form__group--link">
													<input disabled type="text" class="form__input" name="link_movie" value="{{$movie->link_movie}}">
												</div>
											</div>
											@foreach ($links as $item)
												<div class="col-12 col-lg-12">
													<p style="color:white; display: flex; align-items: center;">
														link phim tập {{ $item->episode }} 
														<a href="{{routeAdmin('links/edit/'.$item->link_id)}}" class="main__table-btn main__table-btn--edit mx-1 ">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"/></svg>
														</a>
													</p>

													
													<div class="form__group form__group--link">
														<input disabled type="text" class="form__input" name="link_movie" value="{{$item->link}}">
												</div>
											</div>
											@endforeach

											{{-- <div class="col-12">
												<button type="submit" class="form__btn">Cập nhật thông tin</button>
											</div> --}}
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
	</main>
@endsection