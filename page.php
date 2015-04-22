<?php
/*
 * Template Name: Standard Page
 * Description: Will be used for contact page, about page, and any other static page. 
 */
?>

<?php get_header(); ?>

    <main>
 
		<?php the_post(); ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php the_content(); ?>

    </main>

<?php get_footer() ?>
