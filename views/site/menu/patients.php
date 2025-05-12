<link rel="stylesheet" href="/public/styles/patients.css">
<div class="patients-container">
    <h3 class="page-title">Взаимодействие с пациентами</h3>

    <?php if (!empty($message)): ?>
        <div class="message-box"><?= $message ?? '' ?></div>
    <?php endif; ?>

    <a href="<?= app()->route->getUrl('/patients/add') ?>" class="add-patient-link">Добавить пациента</a>

    <div class="patients-list">
        <h3>Пациенты:</h3>

        <?php foreach ($patients as $patient): ?>
            <div class="patient-card">
                <p><strong>Фамилия:</strong> <?= $patient->surname ?></p>
                <p><strong>Имя:</strong> <?= $patient->name ?></p>
                <p><strong>Отчество:</strong> <?= $patient->patronym ?></p>
                <p><strong>Дата рождения:</strong> <?= $patient->birth_date ?></p>

                <div class="patient-actions">
                    <a href="<?= app()->route->getUrl('/patients/'.$patient->id.'/search/appointments') ?>">Найти записи пациента</a>
                    <a href="<?= app()->route->getUrl('/patients/'.$patient->id.'/search/doctors') ?>">Найти врачей пациента</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>