<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simelajang - {{ $title }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/app/assets/images/logo/favicon3.png">

    <!-- page css -->
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css " rel="stylesheet">

    <!-- Core css -->
    <link href="/app/assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('/app/assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="/app/assets/images/logo/logo3.png">
                                        <h2 class="m-b-0">Login</h2>
                                    </div>
                                    <form method="POST" class="my-login-validation" action="/cek_login">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <a class="float-right font-size-13 text-muted" href="">Forget Password?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Klik Home untuk ke Halaman Depan  
                                                    <a href="/" class="small" href=""> Home</a>
                                                </span>
                                                <button class="btn btn-primary">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2019 ThemeNate</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="/app/assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Core JS -->
    <script src="/app/assets/js/app.min.js"></script>

    <script>
        @if (session('success'))
            Swal.fire({
              position: "top-center",
              text: "Success",
              icon: "success",
              title: "{{ Session::get('success') }}",
              showConfirmButton: false,
              timer: 3500
            });
        @endif
    </script>
    
    <script>
        @if (session('error'))
            Swal.fire({
              position: "top-center",
              text: "Upss Sorry !",
              icon: "error",
              title: "{{ Session::get('error') }}",
              showConfirmButton: false,
              timer: 5500
            });
        @endif
    </script>
    
    <script>
        @if (session('status'))
            Swal.fire({
              position: "top-center",
              text: "Success",
              icon: "success",
              title: "{{ Session::get('status') }}",
              showConfirmButton: false,
              timer: 3500
            });
        @endif
    </script>

</body>

</html>