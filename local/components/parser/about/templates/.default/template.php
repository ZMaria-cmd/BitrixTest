<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<?php foreach ($arResult['ITEMS'] as $item): ?>
    <li>
        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?php echo htmlspecialchars($item["PREVIEW_PICTURE_SRC"]); ?>" alt="..." /></div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4><?= htmlspecialchars($item['PREVIEW_TEXT']) ?></h4>
                <h4 class="subheading"><?= htmlspecialchars($item['NAME']) ?></h4>
            </div>
            <div class="timeline-body"><p class="text-muted"><?= htmlspecialchars($item['DETAIL_TEXT']) ?></p></div>
        </div>
    </li>
<?php endforeach; ?>
