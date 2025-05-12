<link rel="stylesheet" href="../../../public/styles/doctor-list.css">
<div class="doctors-container">
    <h2 class="section-title">Взаимодействие с врачами</h2>

    <?php if (count($doctors) != 0): ?>
        <a href="<?= app()->route->getUrl('/doctors/add') ?>" class="add-button">Добавить врача</a>
        <h3 class="section-title">Список врачей</h3>
        <div class="doctors-list">
            <?php foreach ($doctors as $doctor): ?>
                <div class="doctor-card">
                    <h4 class="doctor-header"><?= $doctor->surname ?> <?= $doctor->name ?> <?= $doctor->patronym ?></h4>

                    <div class="doctor-info">
                        <div class="info-group">
                            <span class="info-label">Дата рождения:</span>
                            <span class="info-value"><?= $doctor->birth_date ?></span>
                        </div>

                        <div class="info-group">
                            <span class="info-label">Специализация:</span>
                            <span class="info-value"><?php if($doctor->specialize): ?><?= $doctor->specialize ?><?php else: ?>Специализация отсутствует <?php endif; ?></span>
                        </div>

                        <div class="info-group">
                            <span class="info-label">Должности:</span>
                            <div class="positions-list">
                                <?php foreach ($doctor->positions as $position): ?>
                                    <span class="position-item"><?= $position->name ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <a class="add-button" href="<?= app()->route->getUrl('/doctors/'.$doctor->id.'/show/patients') ?>">Посмотреть пациентов врача</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif; ?>

</div>