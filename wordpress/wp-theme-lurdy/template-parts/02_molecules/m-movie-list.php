<?php $movie_list = $args['movie_list']; ?>

<div class="movie-list__wrapper">
    <div class="js-movie-slider-arrow-left movie-slider-arrow-left">
        <img src="<?= asset('arrow.svg', '', 'images/icons'); ?>" alt="" class="movie-list-slider__arrow--left">
    </div>

    <div class="js-movie-slider-arrow-right movie-slider-arrow-right">
        <img src="<?= asset('arrow.svg', '', 'images/icons'); ?>" alt="" class="movie-list-slider__arrow--right">
    </div>

    <div class="js-movie-list-slider movie-list-slider">
        <?php
        foreach ($movie_list as $ml) {
            $poster = $ml['poster'];
            $title = $ml['title'];
            $playlist = $ml['playlist'];
            $age = $ml['age'];
            $url = $ml['url'];
            $premier = ($ml['premier'] == date('Y.m.d')) ? $ml['premier'] : false;

            $times = [];
            foreach ($playlist as $p) {

                $date = new DateTime($p['date']);
                $hour = $date->format('H');
                $minute = $date->format('i');
                $times[] = [
                    'time' => $hour . ':' . $minute,
                    'url' => $p['url']
                ];
            }

            $movie_card_args = compact('poster', 'title', 'url', 'times', 'age', 'premier');
            get_template_part('template-parts/02_molecules/cards/m-card-movie', '', $movie_card_args);
        }
        ?>
    </div>
</div>