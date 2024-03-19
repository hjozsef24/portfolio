<section class="section__shops-grid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="shops-grid__wrapper js-shops-grid"></div>

                <button type="button" class="btn btn--secondary js-load-more-shops load-more-shops">
                    <?= __('További üzletek betöltése', 'lurdy') ?>
                </button>

                <img src="<?= asset('back-to-top.svg', '', 'images/icons'); ?>" alt="Back to top" class="js-shops-back-to-top shops-back-to-top">
            </div>
        </div>
    </div>
</section>
<?php addScript('window.loadShops();'); ?>