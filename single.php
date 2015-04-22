<?php
/*
 * Template Name: Single Post Page
 * Description: Displays single blog post.  
 */
?>

<!-- single.php -->

<?php get_header()?>

    <div class="container full-post-container">

        <div class="col-md-12 main-content">

			<?php the_post(); ?>

			<h1 class="post-title-full"><?php the_title(); ?></h1>
			
			<div class="post-date-container">
				 Published on <?php the_time( get_option( 'date_format' ) ); ?>
			</div>
				
				<div class="page-content">
					<?php the_content(); ?>
				</div><!-- .entry-utility -->
		
				<?php /* comments_template('', true); */ ?><!-- temporarily commented out -->

        </div><!-- #content -->

    </div><!-- #container -->

</div> <!-- wrapper -->

<?php get_footer()?>
