<?php get_header(); ?>
<main class="not-found">
    <div class="not-found__content">
        <p class="not-found__title">404</p>
        <a class="btn btn--primary btn--lighter-blue d-block mx-auto w-fit-content" href="<?php echo home_url(); ?>"><?php _e('Go home', 'waterside')?></a>
    </div>
</main>
<?php get_footer(); ?>