<?php
/* @var $content string */

use models\db\Users;
use vendor\components\Helper;?>
<html lang="Ru-ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/layout/css/admin.css">
    <link rel="stylesheet" href="/assets/layout/css/admin_new.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--    <link rel="stylesheet" href="/assets/css/bootstrap.css">-->
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/layout/js/admin.js"></script>
    <script src="/assets/layout/js/admin_new.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>BeeJee Test Project</title>
</head>

<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header">
    <a class="app-header__logo" href="#">BeeJee Test</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <?php if (Users::isAdmin()): ?>
                <a href="<?= Helper::createUrl('/logout')?>" class="btn btn-secondary btn-lg">
                    Logout
                </a>
                <span class="badge badge-primary"><h3>Admin</h3></span>
            <?php else: ?>
                <a href="<?= Helper::createUrl('/login')?>" class="btn btn-secondary btn-lg">
                    Login
                </a>
            <?php endif; ?>

    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar">

</div>
<?php require_once '_menu.php' ?>
<main class="app-content">
    <div class="container-fluid">
        <!-- Breadcrumbs -->
        <?php include_once $content ?>
    </div>
</main>

<div class="modal fade" id="popup" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header alert" role="alert">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p class="modal-text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= 'Close' ?></button>
            </div>
        </div>

    </div>
</div>

</body>
</html>