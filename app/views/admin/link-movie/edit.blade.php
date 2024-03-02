@extends('admin.layout.main')
@section('content')
    <main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Cập nhật tập phim</h2>
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

					<form method="POST" class="form" enctype="multipart/form-data">
						<div class="row">

							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12">
										<div class="form__group">
											<input type="text" class="form__input" value="{{$link->link}}" name="link" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="form__group">
											<input disabled type="number" class="form__input" value="{{$link->episode}}" name="episode">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="form__group">
											<select class="js-example-basic-multiple" name="movie_id" id="genre">
												@foreach ($movies as $item)
													<option {{$item->id == $link->movie_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->title}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="form__btn">Cập nhật</button>
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