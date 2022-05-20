@extends('frontend.master')

@section('mainSection')

 <!--banner-->
 <div class="banner-top">
	<div class="container">
		<h3 >Register</h3>
		<h4><a href="index.html">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

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
<!--login-->

	<div class="login">

		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Register</h3>
					<form action="{{url('user-register')}}" method="post">
                        @csrf
                        <div class="key">
							<input type="text" name="name" placeholder="Enter your name">
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="email" placeholder="Enter your name">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="password" placeholder="Enter Password" >
							<div class="clearfix"></div>
						</div>
                        <div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="confirm-assword" placeholder="Confirm Password">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Registration">
					</form>
				</div>
				<div class="forg">
					<a href="#" class="forg-left">Forgot Password</a>
					<a href="{{url('user-login')}}" class="forg-right">Login</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>

@endsection
