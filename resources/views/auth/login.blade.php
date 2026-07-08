<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pratama Florist Bengkalis</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #36220b, #c2a17c);
            min-height: 100vh;
        }

        .login-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .2);
        }

        .login-left {
            background: #36220b;
            color: white;
            padding: 50px;
        }

        .login-left h2 {
            font-weight: bold;
        }

        .login-right {
            padding: 50px;
            background: white;
        }

        .form-control {
            border-radius: 10px;
            height: 48px;
        }

        .btn-login {
            border-radius: 10px;
            height: 48px;
            font-weight: bold;
        }

        .logo {
            width: 150px;
        }

        @media(max-width:768px) {
            .login-left {
                display: none;
            }

            .login-right {
                padding: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card login-card col-lg-9">

            <div class="row g-0">

                <!-- Left -->
                <div class="col-md-5 login-left d-flex flex-column justify-content-center align-items-center">

                    <img src="{{ asset('assets/images/logo.png') }}" class="logo mb-4" alt="Logo">

                    <h2 class="text-center">Pratama Florist Bengkalis</h2>

                    <p class="text-center mt-3">
                        Selamat datang kembali.<br>
                        Silakan login untuk mengakses sistem.
                    </p>

                </div>

                <!-- Right -->
                <div class="col-md-7 login-right">

                    <h3 class="fw-bold mb-4 text-center">
                        Login
                    </h3>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>

                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukkan email" value="{{ old('email') }}" required autofocus
                                    autocomplete="email">

                            </div>

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input id="password" type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan password" required autocomplete="current-password">

                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">

                                    <i id="eyeIcon" class="bi bi-eye"></i>

                                </button>

                            </div>

                        </div>

                        {{-- <div class="d-flex justify-content-between mb-4">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>

                            </div>

                            <a href="#" class="text-decoration-none">
                                Lupa Password?
                            </a>

                        </div> --}}

                        <button class="btn btn-success w-100 btn-login">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>
        function togglePassword() {

            let password = document.getElementById('password');
            let icon = document.getElementById('eyeIcon');

            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            } else {
                password.type = "password";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }

        }
    </script>

</body>

</html>
