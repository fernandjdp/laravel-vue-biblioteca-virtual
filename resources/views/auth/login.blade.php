<!--

=========================================================
* Swipe - Mobile App One Page Bootstrap 5 Template
=========================================================

* Product Page: https://themesberg.com/product/bootstrap/swipe-free-mobile-app-one-page-bootstrap-5-template
* Copyright 2020 Themesberg (https://www.themesberg.com)

* Coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Contact us if you want to remove it.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>UDEFA - Biblioteca virtual</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="UDEFA - Biblioteca virtual">
<meta name="author" content="Fernand Diaz">
<meta name="description" content="Biblioteca virtual de trabajos de grado de la Universidad de Falcón">
<meta name="keywords" content="bootstrap, bootstrap 5, bootstrap 5 one page, bootstrap 5 mobile application, library, udefa, one page template bootstrap 5" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://demo.themesberg.com/swipe/">
<meta property="og:title" content="UDEFA - Biblioteca virtual">
<meta property="og:description" content="Free Mobile Application One Page Bootstrap 5 Template by Themesberg">
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/swipe/swipe-thumbnail.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://demo.themesberg.com/swipe/">
<meta property="twitter:title" content="UDEFA - Biblioteca virtual">
<meta property="twitter:description" content="Free Mobile Application One Page Bootstrap 5 Template by Themesberg">
<meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/swipe/swipe-thumbnail.jpg">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="/swipe/assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/swipe/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/swipe/assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="/swipe/assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="/swipe/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Fontawesome -->
<link type="text/css" href="/swipe/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

<!-- Swipe CSS -->
<link type="text/css" href="/swipe/css/swipe.css" rel="stylesheet">

<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>
    <main>
        <!-- Section -->
        <section class="min-vh-100 d-flex align-items-center bg-soft">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="signin-inner mt-3 mt-lg-0 bg-white shadow border rounded border-light w-100">
                            <div class="row gx-0 align-items-center justify-content-between">
                                <div class="col-12 col-lg-5 d-none d-lg-block rounded-left bg-secondary">
                                    <img src="/swipe/assets/img/illustrations/login.svg" alt="login image">
                                </div>
                                <div class="col-12 col-lg-7 px-3 py-5 px-sm-5 px-md-6">
                                    <div class="text-center text-md-center mb-4 mt-md-0">
                                        <h1 class="mb-0 h3">Inicia sesión en nuestra plataforma</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Form -->
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmailCard1">Correo Electrónico</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-envelope"></span></span>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>  
                                        </div>
                                        <!-- End of Form -->
                                        <div class="form-group">
                                            <!-- Form -->
                                            <div class="form-group mb-4">
                                                <label for="exampleInputPasswordCard1">Contraseña</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2"><span class="fas fa-unlock-alt"></span></span>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>  
                                            </div>
                                            <!-- End of Form -->
                                            <div class="d-block d-sm-flex justify-content-between align-items-center mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                      Recordarme
                                                    </label>
                                                </div>
                                                <div>
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('¿Olvidaste tu contraseña?') }}
                                                        </a>
                                                    @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">Iniciar sesión</button>
                                    </form>
                                    <div class="d-flex justify-content-center align-items-center mt-4">
                                        <span class="font-weight-normal">
                                            ¿No te has registrado?
                                            <a href="{{ route('register') }}" class="font-weight-bold">Registrarse</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core -->
<script src="/swipe/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/swipe/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/swipe/vendor/headroom.js/dist/headroom.min.js"></script>

<!-- Vendor JS -->
<script src="/swipe/vendor/onscreen/dist/on-screen.umd.min.js"></script>
<script src="/swipe/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Swipe JS -->
<script src="/swipe/assets/js/swipe.js"></script>

</body>

</html>