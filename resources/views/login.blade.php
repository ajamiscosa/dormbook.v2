@extends('app')
@section('content')
    <section class="clearfix loginSection">
        <div class="container">
            <div class="row">
                <div class="center-block col-md-5 col-sm-6 col-xs-12">
                    <div class="panel panel-default loginPanel">
                        <div class="panel-heading text-center">Administrator Login</div>
                        <div class="panel-body">
                            <form class="loginForm" method="post" action="/login">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="userName">Username</label>
                                    <input type="text" class="form-control" id="userName" name="Username">
                                </div>
                                <div class="form-group">
                                    <label for="userPassword">Password</label>
                                    <input type="password" class="form-control" id="userPassword" name="Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer text-center">
                            <p>Not a member yet? <a href="sign-up.html" class="link">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection