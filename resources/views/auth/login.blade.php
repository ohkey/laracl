<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
 
        <!-- CSS And JavaScript -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel='stylesheet' href='css/jquery-ui.css'>
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-login.min.css">
		<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
		<script src="js/modernizr.js"></script>
		
		<script src="bootstrap/dist/js/jquery.min.js"></script>
		<script src="bootstrap/dist/js/bootstrap.min.js"></script>
    </head>
    <body class="login-page">
    <div class="login-form">
		<div class="login-content">
			<div class="form-login-error">
				<h3>登录失败</h3>
				@if ($errors->has('email'))
				<p>{{$errors->first("email")}}</p>
				@endif
				@if ($errors->has('password'))
				<p>{{$errors->first("password")}}</p>
				@endif
			</div>
		    @if ($errors->has('email'))
		    <script>$(".form-login-error").show();</script>
		    @endif
			<form method="post" role="form" method="POST" action="{{ url('/login') }}">
			{{ csrf_field() }}
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="用户名" autofocus>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-key"></i>
						</div>
						<input id="password" type="password" class="form-control" name="password" placeholder="密码">
					</div>
				</div>
				<div class="form-group">
				    <button type="submit" class="btn btn-primary btn-block btn-login">
				    <i class="fa fa-sign-in"></i>
                        登录
                    </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                        忘记密码?
                    </a>
				</div>			
			</form>
			<div style="text-align:center;clear:both;"></div>
		</div>
	</div>    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="widget widget-default">
                        <div class="widget-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">邮箱</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
        
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">密码</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">
        
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> 记住密码
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            登录
                                        </button>
        
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            忘记密码?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>