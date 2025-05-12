<link rel="stylesheet" href="../../public/styles/login.css">
<div class="auth-container">
    <h2 class="auth-title">Авторизация</h2>

    <?php if(isset($message)): ?>
        <div class="message <?= strpos($message, 'успешн') !== false ? 'success' : 'error' ?>">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <?php if(app()->auth::check()): ?>
        <div class="user-greeting">
            Добро пожаловать, <?= app()->auth->user()->name ?? ''; ?>
        </div>
    <?php else: ?>
        <form method="post" class="auth-form">
            <div class="form-group">
                <label>Логин</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Войти</button>
        </form>
    <?php endif; ?>
</div>