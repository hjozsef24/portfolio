<section class="listing bg-black-grey pad-100-190"  data-aos="fade-down" data-aos-duration="1000" data-aos-once="true">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($lists_main_title) : ?>
                    <h3 class="text-center"><?php echo $lists_main_title; ?></h3>
                <?php endif; ?>
            </div>
        </div>

        <?php foreach ($lists as $list) : ?>
            <?php $title = $list['title']; ?>
            <?php $listItems = $list['items']; ?>

            <div class="row subtitle__wrapper">
                <div class="col-12">
                    <p class="subtitle" 
                        data-aos="fade-up"
                        data-aos-delay="100"
                        data-aos-duration="1000"
                        data-aos-once="true">
                        <?php echo $title; ?></p>
                </div>
            </div>

            <div class="row">
                <?php foreach ($listItems as $i => $listItem) : ?>
                    <?php $image = $listItem['image']; ?>
                    <?php $text  = $listItem['text']; ?>


                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 item__wrapper" 
                        data-aos="fade-up" 
                        data-aos-delay="500" 
                        data-aos-duration="1000"
                        data-aos-once="true">
                        <?php if ($image) : ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
                        <?php endif; ?>

                        <?php if ($text) : ?>
                            <p><?php echo $text; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>