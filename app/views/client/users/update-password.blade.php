@include('client.layout.style')
<div class="container text-center mt-3">
    <div class="col-12 col-lg-6">
        <form method="POST" class="sign__form sign__form--profile">
            <div class="row">
                <div class="col-12">
                    <h4 class="sign__title">Đổi mật khẩu</h4>
                </div>

                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    @if (isset($_SESSION['success']) && isset($_GET['msg']))
                        <span style="color:green">Cập nhật mật khẩu thành công, mời <a href="{{route('sign-in')}}">Đăng nhập</a></span>
                    @endif
                    <div class="sign__group">
                        <label class="sign__label" for="newpass">Mật khẩu mới</label>
                        <input id="newpass" type="password" name="newpass" class="sign__input">
                        @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                            <span style="color:red">{{ $_SESSION['errors']['password'] }}</span>
                        @endif
                    </div>
                    
                </div>

                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="sign__group">
                        <label class="sign__label" for="confirmpass">Xác nhận mật khẩu</label>
                        <input id="confirmpass" type="password" name="confirmpass" class="sign__input">
                        @if (isset($_SESSION['errors']) && isset($_GET['msg']))
                            <span style="color:red">{{ $_SESSION['errors']['cfpass'] }}</span>
                        @endif
                    </div>
                    
                </div>

                <div class="col-12">
                    <button class="sign__btn" type="submit">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('client.layout.script')
<script>
		$newpass = document.querySelector('#newpass')
        $newpass.focus();
</script>