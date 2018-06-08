<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>

  <main id="content" role="main">
    <section>

      <?php
        if (is_page()) :
          get_template_part( 'contents/_loop-page' );

        elseif (is_single()) :
          get_template_part( 'contents/_loop-single' );

        elseif (is_404()) :
          get_template_part( 'contents/_loop-404' );

        else :
          get_template_part( 'contents/_loop-index' );

        endif;
      ?>

    </section>
  </main>

<?php
  get_footer();