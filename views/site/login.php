<link rel="stylesheet" href="../../public/styles/login.css">
<div class="auth-container">
    <h2 class="auth-title">Авторизация</h2>

    <?php if(isset($message)): ?>
        <div class="message error">
            <?php if(is_array($message)):?>
                <ul>
                <?php foreach($message as $field => $fieldErrors): ?>
                    <?php foreach($fieldErrors as $error): ?>
                            <li><?= $error ?></li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </div>
    <?php endif; ?>
    <?php if (isset($wrong)): ?>
        <p class="message error"><?= $wrong ?></p>
    <?php endif; ?>

    <?php if(app()->auth::check()): ?>
        <div class="user-greeting">
            Добро пожаловать, <?= app()->auth->user()->name ?? ''; ?>
        </div>
    <?php else: ?>
        <form method="post" class="auth-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <div class="form-group">
                <label>Логин</label>
                <input type="text" name="username">
            </div>

            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password">
            </div>

            <button type="submit">Войти</button>
        </form>
    <?php endif; ?>
</div>