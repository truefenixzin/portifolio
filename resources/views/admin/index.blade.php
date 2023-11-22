<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/reset.css')) }}" />
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/boot.css')) }}" />
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/login.css')) }}" />
    <link rel="icon" href="{{ asset('site/img/pherfil_logo.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painel -Login</title>
</head>

<body>

    <div class="ajax_response"></div>
    <div class="dash_login">
        <div class="dash_login_left">
            <article class="dash_login_left_box">
                <header class="dash_login_box_headline">
                    <div class="dash_login_box_headline_logo  icon-notext icon-credit-card"></div>
                    <h1>Login</h1>
                </header>

                <form name="login" action="{{ route('admin.login.do') }}" method="post" autocomplete="off">

                    <label>
                        <span class="field icon-envelope">E-mail:</span>
                        <input type="email" name="email" placeholder="Informe seu e-mail"
                            value="{{ old('email') }}" autofocus />
                    </label>

                    <label>
                        <span class="field icon-unlock-alt">Senha:</span>
                        <input type="password" name="password_check" placeholder="Informe sua senha" />
                    </label>
                    <button class="gradient gradient-orange radius icon-sign-in">Entrar</button>
                </form>


                <footer>

                    <p>&copy; <?= date('Y') ?> - Todos os Direitos Reservados</p>
                    {{-- 
                    <p>
                        <a href="{{ route('front.home') }}">
                            <button type="button" class="btn btn-primary">Voltar</button>
                        </a>
                    </p> --}}
                </footer>
            </article>
        </div>

        <div class="dash_login_right"></div>

    </div>

    <script src="{{ url(mix('backend/assets/js/jquery.js')) }}"></script>
    <script src="{{ url(mix('backend/assets/js/login.js')) }}"></script>

</body>

</html>
