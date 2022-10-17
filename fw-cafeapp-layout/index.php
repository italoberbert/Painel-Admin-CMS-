<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
        <meta name="mit" content="2022-10-17T19:10:33-03:00+174180">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>CaféApp - Vamos Controlar?</title>

    <link rel="stylesheet" href="assets/css/boot.css"/>
    <link rel="stylesheet" href="assets/css/styles.css"/>
    <link rel="stylesheet" href="assets/css/message.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="icon" type="image/png" href="assets/images/favicon.png"/>
</head>
<body>

<div class="app">
    <header class="app_header">
        <h1><a class="icon-coffee transition" href="index.php" title="CaféApp">CaféApp</a></h1>
        <ul class="app_header_widget">
            <li data-modalopen=".app_modal_contact" class="radius transition icon-life-ring">Precisa de ajuda?</li>
            <li data-mobilemenu="open" class="app_header_widget_mobile radius transition icon-menu icon-notext"></li>
        </ul>
    </header>

    <div class="app_box">
        <nav class="app_sidebar radius box-shadow">
            <div data-mobilemenu="close"
                 class="app_sidebar_widget_mobile radius transition icon-error icon-notext"></div>

            <div class="app_sidebar_user app_widget_title">
                <span class="user">
                    <img class="rounded" alt="" title="" src="assets/images/avatar.jpg"/>
                    <span>Robson</span>
                </span>
                <span class="plan radius">Free</span>
            </div>
            <div class="app_sidebar_nav">
                <?php $v = filter_input(INPUT_GET, "v"); ?>
                <a class="icon-home radius transition <?= ($v != 'home' ?: 'active'); ?>" title="Dashboard"
                   href="index.php?v=home">Controle</a>
                <a class="icon-calendar-check-o radius transition <?= ($v != 'income' ?: 'active'); ?>" title="Receber"
                   href="index.php?v=income">Receber</a>
                <a class="icon-calendar-minus-o radius transition <?= ($v != 'expense' ?: 'active'); ?>" title="Pagar"
                   href="index.php?v=expense">Pagar</a>
                <a class="icon-user radius transition <?= ($v != 'profile' ?: 'active'); ?>" title="Meu Perfil"
                   href="index.php?v=profile">Meu Perfil</a>
                <a class="icon-sign-out radius transition" title="Sair" href="index.php?v=logoff">Sair</a>
            </div>
        </nav>

        <main class="app_main">
            <?php
            $view = $v;
            if (!$view || !file_exists(__DIR__ . "/views/{$view}.php")) {
                if ($view) {
                    echo "<div class='message error icon-error'>Oooops, página não existe!</div>";
                }
                require __DIR__ . "/views/home.php";
            } else {
                require __DIR__ . "/views/{$view}.php";
            }
            ?>
        </main>
    </div>

    <footer class="app_footer">
        <span class="icon-coffee">
            CaféApp - Desenvolvido na formação FSPHP<br>
            &copy; UpInside - Todos os direitos reservados
        </span>
    </footer>

    <?php require __DIR__ . "/views/modals.php"; ?>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.mask.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>