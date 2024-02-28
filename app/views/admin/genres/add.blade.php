@extends('admin.layout.main')
@section('content')
    <main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Thêm mới thể loại</h2>
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
										<div class="form__img" style="height:200px">
											<label for="form__img-upload">Tải lên ảnh nền thể loại</label>
											<input id="form__img-upload" name="thumbnail" type="file">
											<img id="form__img" src="#" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12">
										<div class="form__group">
											<input type="text" class="form__input" name="name" placeholder="Thể loại">
										</div>
									</div>
								</div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="form__btn">Xác nhận Thêm</button>
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