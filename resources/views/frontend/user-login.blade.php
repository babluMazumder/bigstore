@extends('frontend.master')

@section('mainSection')

 <!--banner-->
 <div class="banner-top">
	<div class="container">
		<h3 >Login</h3>
		<h4><a href="index.html">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->
<div class="container text-left mt-5" style="margin-top: 40px">
    @if (\Session::has('success_message'))
        <div class="alert alert-success">
            {!! \Session::get('success_message') !!}

        </div>
    @endif
    @if (\Session::has('danger_message'))
        <div class="alert alert-success">
            {!! \Session::get('danger_message') !!}
        </div>
    @endif
</div>

	<div class="login">

		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
					<form action="{{url('user-login')}}" method="post">
                        @csrf
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Login">
					</form>
				</div>
				<div class="forg">
					<a href="#" class="forg-left">Forgot Password</a>
					<a href="{{url('user-register')}}" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>

@endsection
