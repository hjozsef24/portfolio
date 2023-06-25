<?php $faq_categories = get_terms('faq-category', array('hide_empty' => true)); ?>
<?php $faq_cta = get_sub_field('faq_related_cta'); ?>

<?php if ($faq_categories) : ?>
    <section class="faq">
        <div class="container custom-container-spacing">
            <div class="row">
                <div class="col-12">
                    <?php foreach ($faq_categories as $c) : ?>
                        <?php $id = $c->term_id; ?>
                        <?php $title = $c->name; ?>
                        <?php $slug = $c->slug; ?>


                        <?php
                        $args = array(
                            'post_type' => 'faq-cpt',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'faq-category',
                                    'field' => 'slug',
                                    'terms' => array($slug),
                                    'operator' => 'IN',
                                ),
                            ),
                        );
                        $qry = new WP_Query($args);
                        ?>

                        <h2 class="js-faq-category faq__category"><?php echo $title; ?></h2>
                        <div class="js-questions faq__qna__wrapper">
                            <?php while ($qry->have_posts()) : $qry->the_post() ?>
                                <?php $question = get_the_title(); ?>
                                <?php $answer = get_the_content(); ?>
                                <div class="faq__qna js-faq-question">
                                    <div class="faq__question">
                                        <p>
                                            <?php echo $question; ?>
                                        </p>
                                        <div class="plus-minus-toggle collapsed"></div>
                                    </div>
                                    <div class="js-faq-answer faq__answer">
                                        <?php echo $answer; ?>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if ($faq_cta) : ?>
                <div class="row">
                    <div class="col-12">
                        <?php set_query_var('cta_post', $faq_cta); ?>
                        <?php get_template_part('template-parts/03_organisms/o-cta'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>


<?php wp_reset_query(); ?>