<link rel="stylesheet" href="/public/styles/addDoctor.css">
<div class="form-container">
    <h3 class="form-title">Добавление врача</h3>

    <form method="post" class="doctor-form">
        <div class="form-group">
            <label>Фамилия</label>
            <input type="text" name="surname" required>
        </div>

        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Отчество</label>
            <input type="text" name="patronym" required>
        </div>

        <div class="form-group">
            <label>Дата рождения</label>
            <input type="date" name="birth_date" required>
        </div>

        <div class="form-group">
            <label>Должность</label>
            <select name="position" required>
                <?php foreach ($positions as $position): ?>
                    <option value="<?= $position->id ?>"><?=$position->name?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Специализация</label>
            <select name="specialize" required>
                <?php foreach ($specializes as $specialize): ?>
                    <option value="<?= $specialize->id?>"><?= $specialize->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="button-group">
            <button type="submit" class="submit-button">Добавить врача</button>
            <a href="<?= app()->route->getUrl('/doctors') ?>" class="back-link">← Вернуться назад</a>
        </div>
    </form>
</div>