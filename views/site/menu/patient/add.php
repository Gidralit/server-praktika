<link rel="stylesheet" href="/public/styles/addPatient.css">
<div class="form-container">
    <h2 class="form-title">Добавить пациента</h2>

    <form method="post">
        <div class="form-group">
            <label>Фамилия</label>
            <input type="text" name="surname" class="form-input" required>
        </div>

        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" class="form-input" required>
        </div>

        <div class="form-group">
            <label>Отчество</label>
            <input type="text" name="patronym" class="form-input">
        </div>

        <div class="form-group">
            <label>Дата рождения</label>
            <input type="date" name="birth_date" class="form-input" required>
        </div>

        <button type="submit" class="submit-button">Добавить пациента</button>
    </form>
</div>