<?php
$post_type = $args['post_type'];
$dates = $places = $websites = $opening_times = $phone_numbers = $email_addresses = $accepted_coupons = $payment_methods = false;


if ($post_type == "events-cpt") {
    $dates = $args['dates'];
    $places = $args['places'];
    $websites = $args['websites'];
    $websites_label = ($websites && count($websites) > 1) ?  __('Esemény weboldalak', 'lurdy') : __('Esemény weboldal', 'lurdy');
}

if ($post_type == "shops-cpt") {
    $websites = $args['websites'];
    $websites_label = ($websites && count($websites) > 1) ?  __('Weboldalak', 'lurdy') : __('Weboldal', 'lurdy');
    $opening_times = $args['opening_times'];
    $phone_numbers = $args['phone_numbers'];
    $email_addresses = $args['email_addresses'];
    $accepted_coupons = $args['accepted_coupons'];
    $payment_methods = $args['payment_methods'];
}
?>

<div class="information-table">
    <?php if ($opening_times) : ?>
        <?php
        foreach ($opening_times as $ot) :
            $days = $ot['days'];
            $hours = $ot['hours'];
        ?>
            <div class="information-table__inner information-table__inner--opening-hours">
                <?php if ($days) : ?>
                    <div class="information-table__label">
                        <p><?= $days; ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($hours) : ?>
                    <div class="information-table__value">
                        <p><?= $hours; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($phone_numbers) : ?>
        <div class="information-table__inner information-table__inner--multiple">
            <div class="information-table__label">
                <img src="<?= asset('phone.svg', '', 'images/icons'); ?>" alt="">
                <p><?= (count($phone_numbers) > 1) ?  __('Telefonszámok', 'lurdy') : __('Telefonszám', 'lurdy'); ?></p>
            </div>

            <div class="information-table__value">
                <?php
                foreach ($phone_numbers as $pn) :
                    $phone_number = $pn['phone_number'];
                ?>
                    <a href="tel:<?= $phone_number; ?>"><?= $phone_number; ?></a>
                <?php endforeach; ?>
            </div>

        </div>
    <?php endif; ?>


    <?php if ($websites) : ?>
        <div class="information-table__inner information-table__inner--multiple">
            <div class="information-table__label">
                <img src="<?= asset('website.svg', '', 'images/icons'); ?>" alt="">
                <p><?= $websites_label; ?></p>
            </div>

            <div class="information-table__value information-table__value--websites">
                <?php
                foreach ($websites as $w) :
                    $website = $w['website'];
                ?>
                    <a href="<?= $website; ?>"><?= $website; ?></a>
                <?php endforeach; ?>
            </div>

        </div>
    <?php endif; ?>

    <?php if ($email_addresses) : ?>
        <div class="information-table__inner information-table__inner--multiple">
            <div class="information-table__label">
                <img src="<?= asset('mail.svg', '', 'images/icons'); ?>" alt="">
                <p><?= (count($email_addresses) > 1) ?  __('E-mail címek', 'lurdy') : __('E-mail cím', 'lurdy'); ?></p>
            </div>

            <div class="information-table__value">
                <?php
                foreach ($email_addresses as $ea) :
                    $email = $ea['email'];
                ?>
                    <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
                <?php endforeach; ?>
            </div>

        </div>
    <?php endif; ?>

    <?php if ($dates) : ?>
        <div class="information-table__inner">
            <div class="information-table__label">
                <img src="<?= asset('clock-dark.svg', '', 'images/icons'); ?>" alt="">
                <p><?= (count($dates) > 1) ?  __('Időpontok', 'lurdy') : __('Időpont', 'lurdy'); ?></p>
            </div>

            <div class="information-table__value">
                <?php
                foreach ($dates as $d) :
                    $date = $d['date'] ?? '';
                    $starts_at = $d['starts_at'] ?? '';
                    $ends_at = $d['ends_at'] ?? '';
                    $formatted_date = ($date ? $date . ' ' : '') . ($starts_at ? $starts_at . ' ' : '') . ($ends_at ? '- ' . $ends_at : '');
                ?>
                    <p><?= $formatted_date; ?></p>
                <?php endforeach; ?>
            </div>

        </div>
    <?php endif; ?>

    <?php 
    if ($accepted_coupons) : 
        $formatted_coupons = '';

        foreach ($accepted_coupons as $i => $ac) {
            $coupon = $ac->name;
            $formatted_coupons .= ($i != array_key_last($accepted_coupons)) ? $coupon . ', ' : $coupon;
        }
    ?>
        <div class="information-table__inner">
            <div class="information-table__label">
                <img src="<?= asset('coupon.svg', '', 'images/icons'); ?>" alt="">
                <p><?= (count($accepted_coupons) > 1) ?  __('Elfogadott utalványok', 'lurdy') : __('Elfogadott utalvány', 'lurdy'); ?></p>
            </div>

            <div class="information-table__value">
                    <p><?= $formatted_coupons; ?></p>
            </div>

        </div>
    <?php endif; ?>

    <?php
    if ($payment_methods) :
        $formatted_payment_methods = '';

        foreach ($payment_methods as $i => $pm) {
            $payment_method = $pm->name;
            $formatted_payment_methods .= ($i != array_key_last($payment_methods)) ? $payment_method . ', ' : $payment_method;
        }
    ?>
        <div class="information-table__inner">
            <div class="information-table__label">
                <img src="<?= asset('payment.svg', '', 'images/icons'); ?>" alt="">
                <p><?= (count($payment_methods) > 1) ?  __('Fizetési módok', 'lurdy') : __('Fizetési módok', 'lurdy'); ?></p>
            </div>

            <div class="information-table__value">
                <p><?= $formatted_payment_methods; ?></p>
            </div>

        </div>
    <?php endif; ?>

    <?php if ($places) : ?>
        <div class="information-table__inner">
            <div class="information-table__label">
                <img src="<?= asset('map.svg', '', 'images/icons'); ?>" alt="">
                <p><?= (count($places) > 1) ?  __('Helyszínek', 'lurdy') : __('Helyszín', 'lurdy'); ?></p>
            </div>

            <div class="information-table__value">
                <?php
                foreach ($places as $p) :
                    $place = $p['place'];
                ?>
                    <p><?= $place; ?></p>
                <?php endforeach; ?>
            </div>

        </div>
    <?php endif; ?>
</div>