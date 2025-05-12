<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/styles/main.css">
    <title>Больница</title>
</head>
<body>
<header>
    <nav>
        <?php
        if (!app()->auth::check()):
            ?>
            <a class="nav-link" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
        <?php
        else:
            ?>
            <?php if (app()->auth->user()->role_id === 1): ?>
            <a class="nav-link" href="<?= app()->route->getUrl('/main') ?>">Список сотрудников</a>
        <?php endif; ?>
            <a class="nav-link" href="<?= app()->route->getUrl('/menu') ?>">Меню взаимодействий</a>
            <a class="nav-link" href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->username ?>)</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>