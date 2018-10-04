<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Twitter -->
        <meta name="twitter:site" content="@themepixels">
        <meta name="twitter:creator" content="@themepixels">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Slim">
        <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="twitter:image" content="http://themepixels.me/slim/img/slim-social.png">
        <!-- Facebook -->
        <meta property="og:url" content="http://themepixels.me/slim">
        <meta property="og:title" content="Slim">
        <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta property="og:image" content="http://themepixels.me/slim/img/slim-social.png">
        <meta property="og:image:secure_url" content="http://themepixels.me/slim/img/slim-social.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">
        <!-- Meta -->
        <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="author" content="ThemePixels">
        <title>Admin Login</title>
        <!-- Vendor css -->
        <link href="{{ ('backend_lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ ('backend_lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/backend_css/slim.css') }}">
    </head>
    <body>
        <div class="signin-wrapper">
            <div class="signin-box">
                <h2 class="slim-logo"><a href="#">My Web Deal<span>.</span></a></h2>
                <h2 class="signin-title-primary">Welcome back!</h2>
                <h3 class="signin-title-secondary">Sign in to continue.</h3>
                @if(Session::has('flash_message_error'))
                <div class="alert alert-solid alert-danger divhide5">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif
                
                @if(Session::has('flash_message_success'))
                <div class="alert alert-solid alert-success divhide5">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif
                <form  method="post" action="{{url('admin')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Enter your email">
                        </div><!-- form-group -->
                        <div class="form-group mg-b-50">
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            </div><!-- form-group -->
                            <button class="btn btn-primary btn-block btn-signin">Sign In</button>
                            <p class="mg-b-0">Don't have an account? <a href="#">Sign Up</a></p>
                            </div><!-- signin-box -->
                        </form>
                        </div><!-- signin-wrapper -->
                        <script src="{{ asset('backend_lib/jquery/js/jquery.js') }}"></script>
                        <script src="{{ asset('backend_lib/popper.js/js/popper.js') }}"></script>
                        <script src="{{ asset('backend_lib/bootstrap/js/bootstrap.js') }}"></script>
                        <script src="{{ asset('js/backend_js/slim.js') }}"></script>
                        <script type="text/javascript">//div hide in 5 seconds
                        $(document).ready(function () {
                        setTimeout(function() {
                        $('.divhide5').slideUp("slow");
                        }, 3000);
                        });
                        </script>
                    </body>
                </html>