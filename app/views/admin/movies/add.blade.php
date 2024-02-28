@extends('admin.layout.main')
@section('content')
    <main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Thêm mới phim</h2>
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
										<div class="form__img">
											<label for="form__img-upload">Tải lên ảnh nền phim</label>
											<input id="form__img-upload" name="thumbnail_movie" type="file">
											<img id="form__img" src="#" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12">
										<div class="form__group">
											<input type="text" class="form__input" name="title" placeholder="Tiêu đề">
										</div>
									</div>

									<div class="col-12">
										<div class="form__group">
											<textarea id="text" name="description" class="form__textarea" placeholder="Mô tả"></textarea>
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input type="date" class="form__input" name="release_date" placeholder="Thời gian phát hành">
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input type="text" class="form__input" name="duration_minutes" placeholder="Thời lượng phim">
										</div>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input type="text" class="form__input" name="author" placeholder="Tác giả">
										</div>
									</div>
                                    
                                    <div class="col-12 col-sm-6 col-lg-3">
										<div class="form__group">
											<input type="text" class="form__input" name="rating" placeholder="Đánh giá">
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="form__group">
											<input type="text" class="form__input" name="nation" placeholder="Quốc gia">
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="form__group">
											<select class="js-example-basic-multiple" name="genre_id" id="genre" multiple="multiple">
												@foreach ($genres as $item)
													<option value="{{$item->id}}">{{$item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-12">
										<div class="form__gallery">
											<label id="gallery1" for="form__gallery-upload">Tải lên ảnh nền trailer phim</label>
											<input data-name="#gallery1" id="form__gallery-upload" name="thumbnail_trailer" class="form__gallery-upload" type="file">
										</div>
									</div>
								</div>
							</div>

							
							<div class="col-12">
								<div class="row">
									<div class="col-12 col-lg-6">
										<div class="form__group form__group--link">
											<input type="text" class="form__input" name="link_trailer" placeholder="link trailer phim">
										</div>
									</div>

									<div class="col-12 col-lg-6">
										<div class="form__group form__group--link">
											<input type="text" class="form__input" name="link_movie" placeholder="link phim">
										</div>
									</div>

									<div class="col-12">
										<button type="submit" class="form__btn">Xác nhận Thêm</button>
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