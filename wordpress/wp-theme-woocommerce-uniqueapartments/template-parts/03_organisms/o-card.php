    <?php if ($permalink) : ?>
        <a href="<?php echo $permalink; ?>" class="js-main-card main-card">
        <?php else : ?>
            <div class="js-main-card main-card">
            <?php endif; ?>
            <?php if ($wishlist) : ?>
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-wishlist.svg" alt="" class="js-toggle-wishlist toggle-wishlist" data-id="<?php echo $id; ?>">
            <?php endif; ?>

            <?php if ($thumbnail) : ?>
                <img src="<?php echo $thumbnail['url']; ?>" alt="<?php echo get_image_alt($thumbnail); ?>" class="thumbnail">
            <?php endif; ?>

            <?php if ($gallery) : ?>
                <?php set_query_var('post_id', $id); ?>
                <?php set_query_var('slider', $gallery); ?>
                <?php get_template_part('template-parts/03_organisms/o-gallery-paginable'); ?>
            <?php endif; ?>

            <div class="main-card--text__wrapper js-match-height">
                <?php if ($collection_brand) : ?>
                    <p class="collection-brand"><?php echo $collection_brand; ?></p>
                <?php endif; ?>

                <h5><?php echo $title; ?></h5>

                <?php if ($dimensions) : ?>
                    <p class="dimensions"><?php echo  __('Size:') . ' ' . $dimensions; ?></p>
                <?php endif; ?>

                <?php if ($material) : ?>
                    <p class="material"><?php echo  __('Material:') . ' ' . $material; ?></p>
                <?php endif; ?>

                <?php if ($location) : ?>
                    <p class="location">
                        <?php echo $location['markers'][0]['label']; ?>
                    </p>
                <?php endif; ?>

                <?php if ($short_description) : ?>
                    <p class="short_description">
                        <?php echo $short_description; ?>
                    </p>
                <?php endif; ?>

                <?php if ($style) : ?>
                <?php endif; ?>

                <?php if ($project) : ?>
                    <p class="project">
                        <?php _e('Project') . ' '; ?>
                        <strong><?php echo $project; ?></strong>
                    </p>
                <?php endif; ?>

                <?php if ($bedrooms || $bathrooms) : ?>
                    <div class="icon-text__wrapper">
                        <?php if ($bedrooms) : ?>
                            <div class="icon-text">
                                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-bed.svg" alt="">
                                <p class="bedrooms"><?php echo $bedrooms; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if ($bathrooms) : ?>
                            <div class="icon-text">
                                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-shower.svg" alt="">
                                <p class="bathrooms"><?php echo $bathrooms; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($completion) : ?>
                    <p class="completion">
                        <?php _e('Year of completion') . ' '; ?>
                        <strong><?php echo $completion; ?></strong>
                    </p>
                <?php endif; ?>

                <?php if ($rooms) : ?>
                    <p class="rooms">
                        <?php _e('Number of rooms') . ' '; ?>
                        <strong><?php echo $rooms; ?></strong>
                    </p>
                <?php endif; ?>

                <?php if ($size) : ?>
                    <p class="size">
                        <?php _e('Size') . ' '; ?>
                        <strong><?php echo $size; ?>m<sup>2</sup></strong>
                    </p>
                <?php endif; ?>

                <?php if ($price) : ?>
                    <p class="price">
                        <?php echo $price; ?>
                    </p>
                <?php endif; ?>

                <?php if ($permalink) : ?>
                    <p class="details"><?php _e('SHOW DETAILS', 'ua'); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($permalink) : ?>
        </a>
    <?php else : ?>
        </div>
    <?php endif; ?>