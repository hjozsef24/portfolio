<?php 
if(get_sub_field('cta')){
    $cta_post = get_sub_field('cta');
}
?>
<?php $cta_id = $cta_post[0]; ?>
<?php $cta_content = get_post_field('post_content', $cta_id); ?>
<?php $is_full_width = get_sub_field("is_full_width") ? get_sub_field("is_full_width") : false; ?>

<section class="cta">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="<?php echo $is_full_width ? 'col-12 extra-decor' : 'col-lg-8 col-12'; ?>">
                <div class="cta__wrapper justify-content-center">
                    <?php echo $cta_content; ?>
                </div>
            </div>
        </div>
    </div>
</section>