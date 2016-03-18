<?php
/*
 * Template Name: Team Page
 * Description: Will show team members and stuff.
 */
?>

<?php get_header(); ?>

    <main>

      <div class="container page-container">

        <div class="row">

          <div class="twelve columns">

          <?php the_post(); ?>

            <div class="content-area">
              <?php the_content(); ?>
            </div>

            <div class="row team-holder">

              <?php
                $args = array(
                  'post_type' => 'team_member',
                  'posts_per_page' => -1,
                  'meta_key'  => 'team_member_order',
                  'orderby' => 'ASC'
                );

                $teamQuery = new WP_Query( $args );

                while ( $teamQuery->have_posts() ) : $teamQuery->the_post();
                  $postID = $teamQuery->post->ID;
              ?>
                  <div class="four columns team-item">

                    <?php if(get_field('team_member_image', $postID)): ?>
                      <?php $imageField = get_field('team_member_image', $postID); ?>
                      <?php $imageURL = $imageField['sizes']['medium']; ?>
                      <div class="team-picture" style="background: url('<?php echo $imageURL; ?>'); background-size: cover; background-position: center;"></div>
                    <?php endif; ?>
                    <h2 class="team-name"><?php the_field('team_member_name', $postID); ?></h2>
                    <span class="team-title"><?php the_field('team_member_title', $postID); ?></span>
                    <hr class="team-divider">
                    <div class="team-about">
                      <?php echo get_field('team_member_about', $postID); ?>
                    </div>

                  </div>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>

            </div>
          </div>
        </div>

      </div><!-- end .container -->

    </main>

<?php get_footer() ?>
