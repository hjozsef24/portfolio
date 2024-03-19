<?php
$section_title = get_sub_field('section_title');
$button = get_sub_field('button');
$header_args = compact('section_title', 'button');

$start_date = date('Y-m-d') . '00:00:00';
$end_date = date('Y-m-d') . '23:59:59';

$current_day_only = get_sub_field('current_day_only');
if (!$current_day_only) {
    $start_date = get_sub_field('start_date') . '00:00:00';
    $end_date = get_sub_field('end_date') . '23:59:59';
}

$current_language = apply_filters('wpml_current_language', NULL);
$formatted_cached_movie_list = format_cached_movie_results($current_language);
$movie_list = filter_cached_movies_by_date($formatted_cached_movie_list, $start_date, $end_date);

if (!empty($movie_list)) :
?>
    <section class="section__movie-playlist">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php get_template_part('template-parts/02_molecules/m-section-header', '', $header_args); ?>
                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/02_molecules/m-movie-list', '', compact('movie_list')); ?>


        <?php if ($button) : ?>
            <a href="<?= $button['url']; ?>" class="btn btn--secondary btn--responsive d-md-none d-flex">
                <?= $button['title']; ?>
            </a>
        <?php endif; ?>
    </section>
<?php endif; ?>

<?php addScript('window.movieSlider();'); ?>