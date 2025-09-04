<link rel="stylesheet" href="../../../../public/styles/addAppointment.css">
<div class="form-container">
    <h2 class="form-title">Создать запись</h2>

    <form method="post" class="appointment-form">
        <div class="form-group">
            <label>Врач:</label>
            <select name="doctor_id" required>
                <?php foreach ($doctors as $doctor): ?>
                    <option value="<?= $doctor->id ?>">
                        <?= $doctor->surname . ' ' . $doctor->name . ' ' . $doctor->patronym ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Пациент:</label>
            <select name="patient_id" required>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?= $patient->id ?>">
                        <?= $patient->surname . ' ' . $patient->name . ' ' . $patient->patronym ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Время записи:</label>
            <input type="datetime-local" name="date_time" required>
        </div>
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <button type="submit" class="form-button">Создать запись</button>
    </form>
</div>