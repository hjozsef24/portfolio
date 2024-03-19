<?php
$shop_categories = get_terms(['taxonomy' => 'shops-taxonomy', 'hide_empty' => true]);
$letters = range('A', 'Z');
$starting_letters = array();

$shops_query = new WP_Query(array(
    'post_type' => 'shops-cpt',
    'posts_per_page' => -1,
    'post_status'    => 'publish',

));

if ($shops_query->have_posts()) {
    while ($shops_query->have_posts()) {
        $shops_query->the_post();

        $title = get_the_title();

        $first_letter = strtoupper(mb_substr($title, 0, 1, 'UTF-8'));

        if (!in_array($first_letter, $starting_letters)) {
            $starting_letters[] = $first_letter;
        }
    }

    sort($starting_letters, SORT_LOCALE_STRING);
}

$custom_dropdown_args = [
    'placeholder' => __('Válassz kategóriát', 'lurdy'),
    'options' => $shop_categories
];
?>

<div class="shops-filters__wrapper">
    <div class="shops-filters__wrapper__responsive">
        <div class="input-group input-group--search d-xl-none d-flex">
            <img src="<?= asset('search.svg', '', 'images/icons'); ?>" alt="Search" class="search-icon">
            <input type="text" placeholder="<?= __('Keresés üzletre', 'lurdy'); ?>" class="js-keyword-input">
            <img src="<?= asset('x.svg', '', 'images/icons'); ?>" alt="Search" class="delete-keyword-icon js-delete-keyword">
        </div>

        <?php if ($shop_categories) : ?>
            <div class="shop-filter__inner d-xl-flex d-none">
                <p class="shop-filter__item js-shop-category selected" data-term_id="all"><?= __('Összes', 'lurdy'); ?></p>

                <?php foreach ($shop_categories as $sc) : ?>
                    <p class="shop-filter__item js-shop-category" data-term_id="<?= $sc->term_id; ?>"><?= $sc->name; ?></p>
                <?php endforeach; ?>
            </div>

            <div class="d-xl-none d-block w-100">
                <?php get_template_part('template-parts/01_atoms/a-custom-dropdown', '', $custom_dropdown_args); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($letters) : ?>
        <div class="shop-filter__inner">
            <?php
            foreach ($letters as $l) :
                $disabled = false;
                if (!in_array($l, $starting_letters)) :
                    $disabled = true;
                endif;
            ?>
                <p class="shop-filter__item--letter shop-filter__item js-shop-letter <?= $disabled ? 'disabled' : ''; ?>">
                    <?= $l; ?>
                </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>