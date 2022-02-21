@extends("master")
@section("content")
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
	                <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-6">
                            @if (session('msg'))
                            <p class="text-danger">{{ session('msg') }}</p>
                            @endif
                            <form action="{{ url('update_account/'.$user->id) }}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="name">Username *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-email">Email address *</label>
                                    <input type="email" class="form-control" id="register-email" name="email" value="{{ $user->email }}" required>
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password">New Password</label>
                                    <input type="password" class="form-control" id="register-password" name="password">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Save</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>
                            </div>
                            </div>
                        </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

<div class="thankyou" style="display:none;">
<h1 class="text-center">Thank You for Shopping!</h1>
</div>
@endsection