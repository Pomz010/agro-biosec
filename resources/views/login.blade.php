{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald|Noto+Sans">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Homepage</title>
</head>
<body> --}}
<x-layout>
    <main class="login-container">
        <div class="login-form__card-container">
            <header>
                <span>
                    <img class="login-form__logo" src="{{ asset('img/apc_logo2.png') }}" alt="APC Logo" width="100" height="120">
                </span>
                <h1 class="login-header">APC Biosec</h1>
            </header>

            <section>
                <form class="form-container" action="{{ route('login.authenticate') }}" method="POST">
                    @csrf
                    <div>
                        <input class="login-credentials" type="email" name="email" id="loginEmail" placeholder="Email address" autofocus>
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <input class="login-credentials" type="password" name="password" id="loginPassword" placeholder="Password">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <input class="login-submitBtn" type="submit" value="Login">
                </form>
                <a href="#">Forgot password?</a>
            </section>
        </div>
    </main>
</x-layout>
{{-- </body>
</html> --}}
