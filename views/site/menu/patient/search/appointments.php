<link rel="stylesheet" href="/public/styles/searchAppointments.css">
<div class="search-container">
    <h2 class="search-title">Поиск записи</h2>

    <form method="GET" class="search-form">
        <input
                type="datetime-local"
                name="date"
                class="date-input"
                placeholder="Дата записи"
        >
        <button type="submit" class="search-button">Найти</button>
    </form>

    <div class="results-container">
        <?php if(count($appointments) > 0): ?>
            <?php foreach ($appointments as $appointment): ?>
                <div class="appointment-card">
                    <p><?= $appointment ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-results">Записей не найдено</div>
        <?php endif; ?>
    </div>
</div>