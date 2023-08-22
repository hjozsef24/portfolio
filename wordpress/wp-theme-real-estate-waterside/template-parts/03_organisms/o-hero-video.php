<?php $hero_video = get_sub_field('hero_video'); ?>
<?php $is_search_section_hidden = get_sub_field('is_search_section_hidden'); ?>

<section class="section__hero section__hero--video">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <video class="hero__video ofi-cover-center-center" autoplay muted loop src="<?php echo $hero_video['url']; ?>"></video>
            </div>
        </div>
    </div>
</section>

<?php if (!$is_search_section_hidden) : ?>
    <?php get_template_part('template-parts/03_organisms/o-pre-search'); ?>
<?php endif; ?>