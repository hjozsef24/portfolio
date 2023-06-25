<section class="text">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-8 col-12">
                <div class="text__wrapper">
                    <?php if ($title) : ?>
                        <h2 class="text-center responsive-32"><?php echo $title; ?></h2>
                    <?php endif; ?>

                    <?php if ($text) : ?>
                        <?php echo $text; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>