<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/logo1.png') }}" type="image/x-icon">
    <title>DAYARAM CHARITABLE FOUNDATION - Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            animation: fadeInUp 1s ease;
            background: linear-gradient(135deg, #1187cb, #89b1f7);
        }

        .login-card h4 {
            font-weight: 600;
            color: #fff;
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.5);
        }

        .btn-custom {
            border-radius: 12px;
            padding: 10px;
            font-weight: 600;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        .btn-custom:hover {
            transform: scale(1.05);
            background: #2575fc;
            color: #fff;
        }

        .eye-icon {
            width: 24px;
            height: 24px;
            transition: all 0.3s ease;
        }

        .eye-icon path#eyeClosed {
            opacity: 0;
        }

        .eye-icon.closed path#eyeOpen {
            opacity: 0;
        }

        .eye-icon.closed path#eyeClosed {
            opacity: 1;
        }

        .text-light a {
            color: #ffcc70;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .text-light a:hover {
            color: #fff;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="login-card animate__animated animate__fadeInUp">
        @if (session('success'))
            <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h4 class="text-center">Sign In</h4>
        <form method="POST" action="{{route('login')}}">
            @csrf
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label text-light">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email">
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label text-light">Password</label>
                <div class="input-group">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password">
                    <button type="button" class="btn btn-outline-light" onclick="togglePasswordVisibility()">
                        <svg id="eyeIcon" class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"
                            fill="currentColor">
                            <path id="eyeOpen"
                                d="M32 16C18 16 6 32 6 32s12 16 26 16 26-16 26-16S46 16 32 16zm0 26a10 10 0 1 1 0-20 10 10 0 0 1 0 20z" />
                            <path id="eyeClosed"
                                d="M4 4l56 56M32 16c-9 0-17.4 6-24 16 2.4 3.6 5.1 6.8 8.2 9.4M60 32s-12-16-28-16a25.6 25.6 0 0 0-6.8.9M12 12l40 40"
                                stroke="currentColor" stroke-width="4" fill="none" opacity="0" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="form-check mb-3 text-light">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>

            <!-- Login -->
            <button type="submit" class="btn btn-primary w-100 btn-custom">Log In</button>

            <!-- Forgot Password -->
            <div class="text-center mt-3 text-light">
                <a href="#">Forgot your password?</a>
            </div>

            <!-- Signup -->
            <div class="text-center mt-2 text-light">
                <p>Don't have an account? <a href="#">Sign Up</a></p>
            </div>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const isPasswordVisible = passwordInput.type === 'text';
            passwordInput.type = isPasswordVisible ? 'password' : 'text';
            eyeIcon.classList.toggle('closed', !isPasswordVisible);
        }
    </script>
</body>

</html>
