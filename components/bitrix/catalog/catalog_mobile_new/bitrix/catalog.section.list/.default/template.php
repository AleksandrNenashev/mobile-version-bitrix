<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

global $sect_id, $sidebar_menu;
$sect_id = $arResult['SECTION']['ID'];
$sidebar_menu['SELECTED']['TEXT'] = $arResult['SECTION']['NAME'];

if (!empty($arResult['SECTIONS'])) {
    global $titleText;
    $titleText = $arResult['SECTION']['DESCRIPTION'];

    function AfterTitleText() {
        global $titleText;
        return $titleText;
    }
}
?>

<?php if (!empty($arResult['SECTIONS'])): ?>
<div class="catalog m-section">
    <div class="container _type2">
        <div class="h2 text-center">
            Каталог белорусской мебели<br> с ценами
        </div>

        <?php foreach ($arResult['SECTIONS'] as $arSection): ?>
            <div class="catalog-group">
                <div class="line-title"><?= htmlspecialchars($arSection['NAME']) ?></div>
                <div class="sales-slider slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($arSection['ELEMENTS'] as $arItem): ?>
                                <div class="swiper-slide">
                                    <div class="product-card">
                                        <div class="product-card__badges">
                                            <?php if ($arItem['PROPERTIES']['NEWPRODUCT']['VALUE'] == 'Да'): ?>
                                                <div class="product-card__badge">
                                                    <img src="/upload/img/badge-new.png" alt="Новинка">
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($arItem['PRICES']['RUB']['DISCOUNT_DIFF_PERCENT'] > 0): ?>
                                                <div class="product-card__badge">
                                                    <img src="/upload/img/badge-discount.png" alt="Скидка">
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($arItem['PROPERTIES']['PR100']['VALUE'])): ?>
                                                <div class="product-card__badge">
                                                    <img src="/upload/img/badge-eco.png" alt="Эко">
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <a href="<?= htmlspecialchars($arItem['DETAIL_PAGE_URL']) ?>" class="product-card__img">
                                            <img src="<?= htmlspecialchars($arItem['PREVIEW_PICTURE_SRC']) ?>" alt="<?= htmlspecialchars($arItem['NAME']) ?>">
                                        </a>

                                        <div class="product-card__title">
                                            <a href="<?= htmlspecialchars($arItem['DETAIL_PAGE_URL']) ?>" class="text21 text14-mob">
                                                <?= htmlspecialchars($arItem['NAME']) ?>
                                            </a>
                                        </div>

                                        <div class="product-card__prices">
                                            <div class="product-card__price">
                                                <?= $arItem['PRICES']['RUB']['PRINT_DISCOUNT_VALUE'] ?>
                                            </div>
                                            <?php if ($arItem['PRICES']['RUB']['DISCOUNT_DIFF_PERCENT'] > 0): ?>
                                                <div class="product-card__price2">
                                                    <?= $arItem['PRICES']['RUB']['PRINT_VALUE_NOVAT'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>