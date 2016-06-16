<?php
/*
 * Template Name: Standard Page
 * Description: Will be used for contact page, about page, and any other static page. 
 */
?>

<?php get_header(); ?>

    <main>

      <div class="container page-container">

        <div class="row">

          <div class="twelve columns">

          <?php the_post(); ?>

            <div class="content-area user-managed-content">
              <?php the_content(); ?>
            </div>

          </div>
        </div>

      </div><!-- end .container -->

    </main>

<?php get_footer() ?>
