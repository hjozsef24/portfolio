<?php $is_quote = get_sub_field('is_quote'); ?>
<?php $is_full_width = get_sub_field('is_full_width'); ?>
<?php $text = get_sub_field('text_block'); ?>
<?php 
if($is_full_width) {
    $columns = "col-lg-8 col-12";
} elseif($is_quote) {
    $columns = "col-lg-6 col-12";
} else {
    $columns = "col-xl-4 col-lg-6 col-12";
}
?>
<section class="text-block-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <?php if ($is_quote) : ?>
                <img src="<?php echo ASSETS_URI_IMG; ?>/quote.png" alt="<?php echo get_image_alt($image); ?>" srcset="">
            <?php endif; ?>
            <div class="<?php echo $columns ?> text-block__wrapper ">
                <div class="<?php if ($is_quote) echo "quote_wrapper"; ?>">
                    <?php echo $text; ?>
                </div>
            </div>
        </div>
    </div>
</section>
