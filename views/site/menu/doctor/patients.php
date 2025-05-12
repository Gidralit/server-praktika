<link rel="stylesheet" href="/public/styles/showPatients.css">
<div class="patients-container">
    <h2 class="section-title">Список пациентов врача</h2>

    <?php if (count($patients) != 0): ?>
        <div class="patients-list">
            <?php foreach ($patients as $patient): ?>
                <div class="patient-card">
                    <div class="patient-info">
                        <div class="info-item">
                            <span class="info-label">Фамилия:</span>
                            <span class="info-value"><?= $patient->surname ?></span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Имя:</span>
                            <span class="info-value"><?= $patient->name ?></span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Отчество:</span>
                            <span class="info-value"><?= $patient->patronym ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty-message">
            Нет пациентов для отображения
        </div>
    <?php endif; ?>
</div>
