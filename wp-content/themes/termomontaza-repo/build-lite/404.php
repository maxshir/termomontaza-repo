<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Build Lite
 */

get_header(); ?>

<div class="container">
    <div class="page_content">
        <section class="site-main" id="sitemain">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_attr_e( '404 Not Found', 'build-lite' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p class="text-404"><?php esc_attr_e( 'Looks like you have taken a wrong turn.....Don\'t worry... it happens to the best of us.', 'build-lite' ); ?></p>
               
            </div><!-- .page-content -->
        </section>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>