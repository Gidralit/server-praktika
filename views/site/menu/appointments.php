<link rel="stylesheet" href="/public/styles/appointments.css">
<div class="appointments-section">
    <h3>Взаимодействие с записями</h3>

    <?php if (!empty($message)): ?>
        <div class="message <?= $messageType ?? 'success' ?>">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <div class="header-row">
        <a href="<?= app()->route->getUrl('/appointments/add') ?>" class="create-link">
            + Создать запись
        </a>

    </div>

    <div class="appointments-list">
        <h2>Все записи к врачам:</h2>

        <?php if (count($appointments) > 0): ?>

        <?php foreach ($appointments as $appointment): ?>
            <div class="appointment-card">
                <div class="appointment-info">
                    <p class="doctor-info">
                        Врач: <?= "{$appointment->doctor->surname} {$appointment->doctor->name} {$appointment->doctor->patronym}" ?>
                    </p>
                    <p class="patient-info">
                        Пациент: <?= "{$appointment->patient->surname} {$appointment->patient->name} {$appointment->patient->patronym}" ?>
                    </p>
                    <p class="appointment-date">
                        Дата: <?= $appointment->date_time ?>
                    </p>
                </div>

                <form class="cancel-form"
                      action="<?= app()->route->getUrl('/appointments/'.$appointment->id.'/delete') ?>">
                    <button type="submit" class="cancel-button">
                        Отменить запись
                    </button>
                </form>
            </div>
        <?php endforeach; ?>

        <?php else: ?>

            <h3>Записи к врачам отсутствуют</h3>

        <?php endif; ?>
    </div>
</div>