<?php

function get_cached_movie_results()
{
    $cacheFile = get_template_directory() . '/cache/movieapi.json';
    if (file_exists($cacheFile)) {
        $cache = json_decode(file_get_contents($cacheFile), true);
        if ($cache['timestamp'] > time() - 60 * 5) {
            return $cache['data'];
        }
    }

    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "https://lurdymozi.hu/api-playlist");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($c);
    $data = json_decode($data, true);

    file_put_contents($cacheFile, json_encode(array(
        'timestamp' => time(),
        'data' => $data
    )));
    return $data;
}

function format_cached_movie_results($lang)
{
    $movies = array();
    $cached_movie_results = get_cached_movie_results();

    $cached_playlist = $cached_movie_results['playlist'];

    foreach ($cached_movie_results['movies'] as $cmr) {

        $age_id = $cmr['age'];

        $age = match ($age_id) {
            '3' => '12',
            '4' => '16',
            '5' => '18',
            default => false
        };

        $one_movie = array(
            'id' => $cmr['id'],
            'title' => $lang === 'hu' ? $cmr['title_hun'] : $cmr['title'],
            'poster' => $cmr['poster'],
            'age' => $age,
            'premier' => str_replace('-', '.', $cmr['premiere']),
            'url' => $cmr['url']
        );

        $playlist = array();
        foreach ($cached_playlist as $p) {
            if ($p['movie'] !== $cmr['id']) {
                continue;
            }

            $playlist[] = array(
                'date' => $p['date'],
                'url' => $p['order_url']
            );
        }

        $one_movie['playlist'] = $playlist;
        $movies[] = $one_movie;
    }
    return $movies;
}

function filter_cached_movies_by_date($movies, $from, $to)
{
    $filtered = array();
    $form_unix = is_null($from) ? 0 : strtotime($from);
    $to_unix = is_null($to) ? PHP_INT_MAX : strtotime($to);

    foreach ($movies as $m) {
        $playlist = array();

        foreach ($m['playlist'] as $pl) {
            $p_unix = strtotime($pl['date']);

            if ($p_unix >= $form_unix && $p_unix <= $to_unix) {
                $playlist[] = $pl;
            }
        }

        usort($playlist, function ($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });

        if (count($playlist) > 0) {
            $m['playlist'] = $playlist;
            $filtered[] = $m;
        }
    }
    return $filtered;
}
