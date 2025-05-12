<link rel="stylesheet" href="/public/styles/searchDoctors.css">
<div class="search-container">
    <h2 class="search-title">Поиск врачей пациента</h2>

    <form method="GET" class="search-form">
        <input
                type="text"
                name="FIO"
                class="search-input"
                placeholder="Данные врача (ФИО)"
        >
        <button type="submit" class="search-button">Найти</button>
    </form>

    <div class="results-container">
        <?php if (count($doctors) > 0): ?>
            <?php foreach ($doctors as $doctor): ?>
                <div class="doctor-card">
                    <div class="doctor-info">
                        <p><strong>Фамилия:</strong> <?= $doctor[0]->surname ?></p>
                        <p><strong>Имя:</strong> <?= $doctor[0]->name ?></p>
                        <p><strong>Отчество:</strong> <?= $doctor[0]->patronym ?></p>
                    </div>

                    <h4 class="section-title">Должности:</h4>
                    <ul class="details-list">
                        <?php foreach ($doctor[0]->positions as $position): ?>
                            <li><?= $position->name ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <h4 class="section-title">Специализации:</h4>
                    <ul class="details-list">
                        <?php foreach ($doctor[0]->specializes as $specialize): ?>
                            <li><?= $specialize->name ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-results">Врачи не найдены</div>
        <?php endif; ?>
    </div>
</div>