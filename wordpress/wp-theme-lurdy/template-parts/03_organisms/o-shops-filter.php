<section class="section__shops-filter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-12">
                <h1><?= __('Üzletek', 'lurdy') ?></h1>
            </div>

            <div class="col-3 d-xl-block d-none">
                <div class="input-group input-group--search">
                    <img src="<?= asset('search.svg', '', 'images/icons'); ?>" alt="Search" class="search-icon">
                    <input type="text" placeholder="<?= __('Keresés üzletre', 'lurdy'); ?>" class="js-keyword-input">
                    <img src="<?= asset('x.svg', '', 'images/icons'); ?>" alt="Search" class="delete-keyword-icon js-delete-keyword">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?php get_template_part('template-parts/02_molecules/m-shops-filters'); ?>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.customDropdown();'); ?>