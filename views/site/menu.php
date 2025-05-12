<link rel="stylesheet" href="../../public/styles/menu.css">
<div class="menu-container">
    <?php if(isset($message)): ?>
        <p class="message <?= strpos($message, 'успешн') !== false ? 'success' : 'error' ?>">
            <?= $message ?>
        </p>
    <?php endif; ?>

    <h3 class="menu-title">Меню взаимодействий</h3>

    <div class="menu-links">
        <a class="menu-link" href="<?= app()->route->getUrl('/doctors') ?>">
            Взаимодействие с врачами
        </a>
        <a class="menu-link" href="<?= app()->route->getUrl('/appointments') ?>">
            Взаимодействие с записями
        </a>
        <a class="menu-link" href="<?= app()->route->getUrl('/patients') ?>">
            Взаимодействие с пациентами
        </a>
    </div>
</div>

