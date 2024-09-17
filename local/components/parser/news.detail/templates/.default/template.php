<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (empty($arResult["DETAIL_ITEM"])): ?>
    <div class="news-detail">
        <h1 class="news-detail-h1">Новость не найдена</h1>
        <p class="news-detail-text">Новость с таким кодом не найдена. Пожалуйста, проверьте правильность ссылки или вернитесь на главную страницу.</p>
        <a class="news-detail-a" href="/">Вернуться на главную</a>
    </div>
<?php else: ?>
    <div class="news-detail">
        <h1 class="news-detail-h1"><?php echo htmlspecialchars($arResult["DETAIL_ITEM"]["NAME"]); ?></h1>
        <img class="news-detail-img" src="<?php echo htmlspecialchars($arResult["DETAIL_ITEM"]["DETAIL_PICTURE_SRC"]); ?>" alt="<?php echo htmlspecialchars($arResult["DETAIL_ITEM"]["NAME"]); ?>">
        <div class="news-detail-text">
            <?php echo $arResult["DETAIL_ITEM"]["DETAIL_TEXT"]; ?>
        </div>
        <a class="news-detail-a" href="/">Вернуться на главную</a>
    </div>
<?php endif; ?>
