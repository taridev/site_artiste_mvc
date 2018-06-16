<?php

use App\Auth;
use Core\Util;

$auth = new Auth();

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/<?= $this->template . '.css'; ?>">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>
        <?= \App\App::getInstance()->title; ?>
    </title>

</head>

<body>

    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=".">Site Artiste MVC</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    $nav = [
                        'oeuvre' =>
                            (!isset($_GET['page'])
                                or explode('.', $_GET['page'])[0] == 'oeuvre') ? ' class="active"' : '',
                        'exposition' =>
                            (isset($_GET['page'])
                                and explode('.', $_GET['page'])[0] == 'exposition') ? ' class="active"' : ''
                    ];
                    if ($auth->logged()) {
                        $nav['admin'] =
                            (isset($_GET['page'])
                                and explode('.', $_GET['page'])[0] == 'admin') ? ' class="active"' : '';
                    }
                    ?>
                    <?php foreach ($nav as $label => $class) :
                    ?>

                        <li<?= $class; ?>><a href="?page=<?= $label . '.index'; ?>"><?= ucfirst($label); ?></a></li>

                    <?php endforeach; ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php if (!$auth->logged()) :
                ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <b>Login</b> 
                            <span class="caret"></span>
                        </a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" method="post"
                                            action="?page=user.login" 
                                            accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label for="login">Login</label>
                                                <input type="text" class="form-control" id="login"
                                                    name="login" placeholder="admin" required="required" autofocus="autofocus">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="admin" required="required">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block btn-md">
                                                    Connexion
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php else :
                ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <b><span class="glyphicon glyphicon-user"></span>&nbsp;<?= $auth->username(); ?></b> 
                            <span class="caret"></span>
                        </a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <ul class="col-md-12 list-unstyled" style="margin-bottom: 10px;">
                                        <li>
                                            <a class="btn btn-danger btn-block btn-md" href="?page=user.logout">
                                                <span class="glyphicon glyphicon-off"></span>&nbsp;Déconnexion
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container">

        <div class="container" style="padding-top: 100px;">
            <?php echo $content; ?>

        </div>

    </main>

    <!-- /.container -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/<?= $this->template . '.js'; ?>"></script>
</body>

</html>