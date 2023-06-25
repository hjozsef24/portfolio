<?php $image = get_sub_field('image'); ?>
<section class="image-block">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <img class="image-block__image" src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" srcset="">
            </div>
        </div>
    </div>
</section>