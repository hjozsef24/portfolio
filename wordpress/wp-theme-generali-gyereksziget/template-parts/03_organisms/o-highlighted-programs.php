<?php $highlighted_programs_text = get_sub_field('highlighted_programs_text'); ?>
<?php $highlighted_programs = get_sub_field('highlighted_programs'); ?>
<?php $highlighted_programs_button = get_sub_field('highlighted_programs_button'); ?>

<section class="highlighted-programs">
    <div class="container-fluid">
        <?php if ($highlighted_programs_text) : ?>
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-12">
                    <div class="highlighted-programs--text__wrapper">
                        <?php echo $highlighted_programs_text; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($highlighted_programs) : ?>
            <div class="row justify-content-center">
                <?php foreach ($highlighted_programs as $id) : ?>
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                        <?php get_program_card($id); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($highlighted_programs_button) : ?>
            <div class="row">
                <div class="col-12">
                    <a href="<?php echo $highlighted_programs_button['url']; ?>" class="btn btn--centered"><?php echo $highlighted_programs_button['title']; ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>