<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Connexion</title>
    <link rel="icon" type="image/png" href="index/images/fadLogo3.png">
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index/css/boots41.min.css">
    <script src="index/js/jquery.min.js"></script>
    <link rel="stylesheet" href="index/css/all.css">
    <link rel="stylesheet" href="index/css/style2.css">


</head>

<body>
    <div>
        <h1 style="color: white;">Système de Gestion des Ressources Humaines </h1>
    </div>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="index/images/fadLogo3.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-at fa-inverse"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control input_user" value=""
                                placeholder="Nom d'utilisateur" required="true">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i toggle="#password-field"
                                        class="fas  fa-eye  toggle-password"></i></span>
                            </div>
                            <input type="password" name="password" id="password-field" class="form-control input_pass"
                                value="" placeholder="Mot de passe" required="true">
                        </div>
                        <div class="clearfix"></div>
                        <h4 style="color: #F1C40F;">
                            <?php echo $result; ?>
                        </h4>
                        <div class="clearfix"></div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="submit" class="btn login_btn">Se Connecter</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>

    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    <script type="text/javascript">
    </script>
</body>

</html>