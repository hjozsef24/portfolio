<?php $counter_title = get_sub_field('counter_title'); ?>
<?php $counter_text = get_sub_field('counter_text'); ?>
<?php $counter_items = get_sub_field('counter_items'); ?>
<?php $counter_last_item = array_key_last($counter_items); ?>

<section class="section__counter">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-12">
                <?php if ($counter_title) : ?>
                    <h4 class="counter__title"><?php echo $counter_title; ?></h4>
                <?php endif; ?>
            </div>

            <div class="col-xl-6 col-12">
                <?php if ($counter_text) : ?>
                    <p class="counter__text"><?php echo $counter_text; ?></p>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($counter_items) : ?>
            <?php $last_item = array_key_last($counter_items); ?>
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-12">
                    <div class="counter__wrapper">
                        <?php foreach ($counter_items as $i => $ci) : ?>
                            <?php $ci_image = $ci['icon']; ?>
                            <?php $ci_title = $ci['title']; ?>
                            <?php $ci_text = $ci['text']; ?>

                            <div class="counter-card">
                                <?php if ($ci_image) : ?>
                                    <img src="<?php echo $ci_image['url']; ?>" alt="<?php echo get_image_alt($ci_image); ?>" class="counter-card__icon ofi-contain-center-center">
                                <?php endif; ?>

                                <div>
                                    <?php if ($ci_title) : ?>
                                        <h4 class="counter-card__title"><?php echo $ci_title; ?></h4>
                                    <?php endif; ?>

                                    <?php if ($ci_text) : ?>
                                        <p class="counter-card__text"><?php echo $ci_text; ?></p>
                                    <?php endif; ?>
                                </div>

                                <?php if ((($i + 1) % 4) !== 0 && ($i !== $last_item)) : ?>
                                    <div class="counter-card__divider"></div>
                                <?php endif; ?>
                            </div>

                            <?php if($counter_last_item != $i && (($i+1) % 2 == 0)):?>
                                <div class="counter-card__divider__horizontal"></div>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>