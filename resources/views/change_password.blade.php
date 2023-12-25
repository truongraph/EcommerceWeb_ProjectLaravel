@extends('layouts.app')

@section('content')
    <!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb lagin-and-register-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-12 m-auto">
				<div class="login-register-wrapper">
					<!-- login-register-tab-list start -->
					<!-- login-register-tab-list end -->
					<div class="tab-content">
						<div id="lg1" class="tab-pane active">
							<div class="login-form-container">
                                @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
								<h4> Đổi mật khẩu </h4>
								<p class="secon-title-login">Nhập thông tin mật khẩu để thay đổi</p>
								<div class="login-register-form">

									<form method="post" action="{{ route('change.password') }}">
                                        @csrf
										<div class="login-input-box">
											<div class="col_full">
												<label for="current_password">Mật khẩu hiện tại: <span class="require_symbol">* </span></label>
												<input type="password" name="current_password" class="form-control">

											</div>
											<div class="col_full">
												<label for="new_password">Mật khẩu mới: <span class="require_symbol">* </span></label>
												<input type="password" name="new_password" class="form-control">

											</div>
											<div class="col_full">
												<label for="confirm_password">Nhập lại mật khẩu mới: <span class="require_symbol">* </span></label>
												<input type="password" name="confirm_password"  class="form-control">

											</div>
										</div>
										<div class="button-box">
											<div class="button-box">
												<button class="button login-btn" type="submit" value="login"><span>Cập nhật mật khẩu</span></button>
												<ul style="margin-top: 20px;">
													<li class="right" style="font-size: 13px;padding-left:3px">Trở về trang thông tin tài khoản?. <a href="javascript:history.go(-1);" style="font-size: 13px; color: red;font-weight:600">Nhấn vào đây</a></li>
												</ul>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- main-content-wrap end -->
@endsection
