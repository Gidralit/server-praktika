<link rel="stylesheet" href="../../public/styles/addEmployee.css">
<div class="form-container">
    <h2 class="form-title">Добавить сотрудника регистратуры</h2>

    <?php if(isset($message)): ?>
        <div class="message <?= strpos($message, 'успешн') !== false ? 'success' : 'error' ?>">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="post" class="employee-form">
        <div class="form-group">
            <label>Логин сотрудника</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Пароль сотрудника</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="form-button">Добавить сотрудника</button>
    </form>
</div>