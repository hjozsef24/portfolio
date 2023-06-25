<footer>
    <img src="<?php echo ASSETS_URI_IMG; ?>/decor/footer--mobile-decor.png" class="footer--mobile-decor">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-md-10 col-12">
                <?php get_template_part('template-parts/02_molecules/m-footer-newsletter') ?>
            </div>

            <div class="offset-xl-1 col-xxl-3 col-xl-4 d-xl-block d-none">
                <div class="footer--navigation__wrapper">
                    <?php get_template_part('template-parts/02_molecules/m-footer-menu') ?>
                    <?php get_template_part('template-parts/02_molecules/m-footer-socials') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer--navigation__wrapper d-xl-none d-flex">
        <?php get_template_part('template-parts/02_molecules/m-footer-menu') ?>
        <?php get_template_part('template-parts/02_molecules/m-footer-socials') ?>
    </div>
</footer>