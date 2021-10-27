<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="Smarthr - Bootstrap Admin Template">
  <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
  <meta name="author" content="Dreamguys - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">
  <title>Login</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img/favicon.png') }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

</head>
<body class="account-page">
    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script>
    //validate form
    $(document).ready(function(){
        $('#user').change(function(){
            var username = $('#user').val();
            if(username == null || username ==''){
                $('#errUser').text('Username không được để trống').css('color','red');
            }
        });
        $('#pass').change(function(){
            var password = $('#pass').val();
            if(password == null || password ==''){
                $('#errPass').text('Password không được để trống').css('color','red');
            }else if(password.length < 6){
                $('#errPass').text('Password không được bé hơn 6 ký tự').css('color','red');
            }
        });
        
    })
</script>
</body>
</html>
