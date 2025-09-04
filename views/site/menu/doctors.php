<link rel="stylesheet" href="../../../public/styles/doctor-list.css">
<div class="doctors-container">
    <h2 class="section-title">Взаимодействие с врачами</h2>

    <?php if (!empty($message)): ?>
        <div class="message-box"><?= $message ?? '' ?></div>
    <?php elseif(!empty($_SESSION['message'])): ?>
        <?php $message = $_SESSION['message'];
        unset($_SESSION['message']); ?>
        <div class="message-box"> <?= $message ?? '' ?> </div>
    <?php endif; ?>

    <a href="<?= app()->route->getUrl('/doctors/add') ?>" class="add-button">Добавить врача</a>
    <?php if (count($doctors) != 0): ?>
        <h3 class="section-title">Список врачей</h3>
        <div class="doctors-list">
            <?php foreach ($doctors as $doctor): ?>
                <div class="doctor-card">
                    <h4 class="doctor-header"><?= $doctor->surname ?> <?= $doctor->name ?> <?= $doctor->patronym ?></h4>

                    <div class="doctor-info">
                        <img src="<?= $doctor->photo_path ?: '/public/uploads/doctors/default-doctor.jpg' ?>"
                             alt="<?= $doctor->surname . ' ' . $doctor->name ?>"
                             width="100" height="100" style="object-fit: cover; border-radius: 5px;">

                        <div class="info-group">
                            <span class="info-label">Дата рождения:</span>
                            <span class="position-item"><?= $doctor->birth_date ?></span>
                        </div>

                        <div class="info-group">
                            <span class="info-label">Специализация:</span>
                            <span class="position-item"><?php if($doctor->specializes): ?><?= $doctor->specializes[0]->name ?><?php else: ?>Специализация отсутствует <?php endif; ?></span>
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
