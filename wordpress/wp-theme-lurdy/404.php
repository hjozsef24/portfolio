<?php
get_header();
$page_not_found_content = get_field('page_not_found_content', 'options');
?>

<main class="page page--not-found">
    <section class="section__not-found">
        <img src="<?= asset('404.svg', '', 'images'); ?>" alt="Not found" class="not-found__image">

        <?php if ($page_not_found_content) : ?>
            <div class="not-found__content">
                <?= $page_not_found_content; ?>
            </div>
        <?php endif; ?>

        <a href="<?= HOME_URL; ?>" class="btn btn--primary not-found__button">
            <?= __('Tovább a főoldalra', 'lurdy') ?>
        </a>
    </section>

    <img src="<?= asset('circle-green.svg', '', 'images/decors'); ?>" alt="Decor" class="not-found__decor--first">
    <img src="<?= asset('circle-blue-whole.svg', '', 'images/decors'); ?>" alt="Decor" class="not-found__decor--second">
    <img src="<?= asset('circle-grey.svg', '', 'images/decors'); ?>" alt="Decor" class="not-found__decor--third">
</main>

<?php get_footer(); ?>