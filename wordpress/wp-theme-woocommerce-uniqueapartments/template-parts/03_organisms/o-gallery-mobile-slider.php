<section class="gallery-mobil-slider px-0">
    <div class="container-fluid px-0">
        <div class="row justify-content-center px-0">
            <div class="col-12 px-0">
                <div class="row js-gallery-mobil-slider gallery-mobil-slider">
                    <?php foreach ($images as $image) : ?>
                        <div class="col-12">
                            <img src="<?php echo $image; ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>