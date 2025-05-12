<link rel="stylesheet" href="../../public/styles/employees.css">
<div class="employees-container">
    <div class="employees-wrapper">
        <!-- Сотрудники -->
        <div class="section-card">
            <h2 class="section-title">Список сотрудников</h2>

            <ul class="user-list">
                <?php foreach ($employees as $employee): ?>
                    <li class="user-item">
                        <span><?= $employee->username ?></span>
                        <span style="color: #7f8c8d; font-size: 0.9em">Сотрудник</span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a href="<?= app()->route->getUrl('/employee/add') ?>" class="add-button">
                ➕ Добавить сотрудника
            </a>
        </div>

        <!-- Администраторы -->
        <div class="section-card">
            <h2 class="section-title">Список администраторов</h2>

            <ul class="user-list">
                <?php foreach ($admins as $admin): ?>
                    <li class="user-item">
                        <span><?= $admin->username ?></span>
                        <span style="color: #e74c3c; font-size: 0.9em">Администратор</span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>


