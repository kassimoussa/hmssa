<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>Connexion | SGH</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        html,
        body {
            height: 100%;
            background-image: url('/images/bg_ssa.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <div class="container  mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-6 col-lg-4">
                <div class="card " >

                    @if ($message = Session::get('fail'))
                    <div class="alert alert-danger text-center">
                        {{ $message }}
                    </div>
                    @endif

                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/fadLogo3.png') }}" alt="Logo" height="150">
                        </div>
                        <form action="{{ url('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-user "></i>
                                    </span>
                                    <input type="text" class="form-control" name="email"
                                        placeholder="Tapez votre email ou nom d'utilisateur " required>
                                </div>
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold bg-primary  text-white">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Tapez votre mot de passe" required>
                                </div>
                                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary fw-bold ">SE CONNECTER </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>