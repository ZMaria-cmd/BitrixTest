<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<?php foreach ($arResult['ITEMS'] as $item): ?>
    <div class="col-md-4">
        <div class="service-item">
            <h4 class="my-3"><?= htmlspecialchars($item['NAME']) ?></h4>
            <p class="text-muted"><?= htmlspecialchars($item['PREVIEW_TEXT']) ?></p>
        </div>
    </div>
<?php endforeach; ?>
