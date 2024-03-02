@extends('admin.layout.main')
@section('content')
    <main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Chi tiết phim</h2>
					</div>
				</div>
				<!-- end main title -->
				
				<!-- form -->
				<div class="col-12">
					@if (isset($_SESSION['errors']) && isset($_GET['msg']))
						@foreach ($_SESSION['errors'] as $item)
							<span style="color:red">{{$item}} ! </span> <br>
						@endforeach
					@endif
					@if (isset($_SESSION['success']) && isset($_GET['msg']))
						<span style="color:green">{{$_SESSION['success']}} </span> <br>
					@endif
					<form method="POST" class="form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-12">
										<label style="color:white" for="form__img-upload">ảnh nền phim</label>
										<div class="form__img">
											<input id="form__img-upload" name="thumbnail_movie" type="file">
											<img id="form__img" src="{{IMG_URL .'thumbnail/'. $movie->thumbnail_movie}}" alt=" ">
										</div>
										<label style="color:white" class="mt-4" for="form__img-upload">ảnh nền trailer</label>
										<div class="mb-2">
											<img style="width:270px;height:170px; border-radius:10px" src="{{IMG_URL .'thumbnail/'. $movie->thumbnail_trailer}}" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12">
										<div class="form__group">
											<input type="text" class="form__input" name="title" value="{{$movie->title}}">
										</div>
									</div>

									<div class="col-12">
										<div class="form__group">
											<textarea id="text" name="description" class="form__textarea" >{{$movie->description}}</textarea>
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input type="date" class="form__input" name="release_date" value="{{$movie->release_date}}">
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input type="text" class="form__input" name="duration_minutes" value="{{$movie->duration_minutes}}" placeholder="Thời lượng: phút">
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input type="text" class="form__input" name="author" value="{{$movie->author}}">
										</div>
									</div>
                                    
                                    <div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input type="number" class="form__input" name="rating" value="{{$movie->rating}}">
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="form__group">
											<input type="text" class="form__input" name="nation" value="{{$movie->nation}}" placeholder="Quốc gia">
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="form__group">
											<select class="js-example-basic-multiple" name="genre_id" id="genre">
												@foreach ($genres as $item)
													<option {{ $movie->genre_id == $item->id ? 'selected' : ""  }} value="{{$item->id}}">{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-12">
										<div class="form__gallery">
											<label id="gallery1" for="form__gallery-upload-movie">Tải ảnh nền phim mới</label>
											<input data-name="#gallery1" id="form__gallery-upload-movie" name="thumbnail_movie" class="form__gallery-upload" type="file">
										</div>
									</div>
									<div class="col-12">
										<div class="form__gallery">
											<label id="gallery2" for="form__gallery-upload-trailer">Tải lên ảnh nền trailer phim</label>
											<input data-name="#gallery2" id="form__gallery-upload-trailer" name="thumbnail_trailer" class="form__gallery-upload" type="file">
										</div>
									</div>

									<div class="col-12 col-lg-12">
										<p style="color:white">link trailer</p>
										<div class="form__group form__group--link">
											<input type="text" class="form__input" name="link_trailer" value="{{$movie->link_trailer}}">
										</div>
									</div>

									<div class="col-12 col-lg-12">
										<p style="color:white">link phim</p>

										<div class="form__group form__group--link">
											<input type="text" class="form__input" name="link_movie" value="{{$movie->link_movie}}">
										</div>
									</div>
								</div>
							</div>

							
							<div class="col-12">
								<div class="row">
									<div class="col-12">
										<button type="submit" class="form__btn">Cập nhật thông tin</button>
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