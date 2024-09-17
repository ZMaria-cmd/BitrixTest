<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


    <?php foreach ($arResult["ITEMS"] as $item): ?>
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="news-item">
                <a class="news-link" href="<?php echo htmlspecialchars($item["DETAIL_PAGE_URL"]); ?>">
                    <div class="news-hover">
                        <div class="news-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img src="<?php echo htmlspecialchars($item["DETAIL_PICTURE_SRC"]); ?>" alt="<?php echo htmlspecialchars($item["NAME"]); ?>">
                </a>
                <div class="news-caption">
                    <h2 class="news-caption-heading"><?php echo htmlspecialchars($item["NAME"]); ?></h2>
                    <p class="news-caption-subheading text-muted"><?php echo $item["PREVIEW_TEXT"]; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


<style>
    .news-detail-text {
        margin-bottom: 10px;
    }
</style>
