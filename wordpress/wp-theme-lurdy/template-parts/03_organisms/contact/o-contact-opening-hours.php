<?php $opening_hours = $args['opening_hours']; ?>

<section class="section__opening-hours">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php if ($opening_hours) : ?>
                    <div class="opening-hours__wrapper">
                        <h4><?= __('Nyitvatartás', 'lurdy'); ?></h4>

                        <div class="opening-hours__inner">
                            <?php
                            foreach ($opening_hours as $oh) :
                                $oh_title = $oh['title'];
                                $oh_timeintervals = $oh['timeintervals'];
                            ?>
                                <div class="opening-hours">
                                    <?php if ($oh_title) : ?>
                                        <h5><?= $oh_title; ?></h5>
                                    <?php endif; ?>

                                    <?php
                                    if ($oh_timeintervals) :
                                        foreach ($oh_timeintervals as $oht) :
                                            $oht_opening_time = $oht['opening_time'];
                                            if ($oht_opening_time) :
                                    ?>
                                                <p><?= $oht_opening_time; ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>