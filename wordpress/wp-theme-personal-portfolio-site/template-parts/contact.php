<section class="contact bg-black-grey pad-100-190">
    <div class="container">
        <?php if ($contact_text) : ?>
            <div class="row contact--text-row">
                <div class="col-12">
                    <?php echo $contact_text; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-6 col-12">
                <?php get_template_part('template-parts/blocks/block-contact-form'); ?>
            </div>

            <div class="card-contact__wrapper col-lg-6 col-12">
                <?php if ($footer_contacts) : ?>
                    <?php foreach ($footer_contacts as $contact) : ?>
                        <?php $icon        = $contact['icon']; ?>
                        <?php $title       = $contact['title']; ?>
                        <?php $description = $contact['description']; ?>
                        <?php $type        = $contact['type']; ?>

                        <?php set_query_var('icon', $icon); ?>
                        <?php set_query_var('title', $title); ?>
                        <?php set_query_var('description', $description); ?>
                        <?php set_query_var('type', $type); ?>

                        <?php get_template_part('template-parts/cards/card-contact'); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>