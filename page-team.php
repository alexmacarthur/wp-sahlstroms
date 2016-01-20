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

            <ul class="team-list">

        <?php
          $args = array(
            'post_type' => 'team_member',
            'posts_per_page' => -1,
            'meta_key'  => 'team_member_last_name',
            'orderby' => 'ASC'
          );

          $teamQuery = new WP_Query( $args );

          while ( $teamQuery->have_posts() ) : $teamQuery->the_post();
            $postID = $teamQuery->post->ID;
        ?>
            <li class="team-item">

              <?php if(get_field('team_member_image', $postID)): ?>
                <?php $imageField = get_field('team_member_image', $postID); ?>
                <?php $imageURL = $imageField['sizes']['medium']; ?>
                <div class="team-picture" style="background: url('<?php echo $imageURL; ?>'); background-size: cover; background-position: center;"></div>
              <?php endif; ?>
              <h2 class="team-name"><?php the_field('team_member_first_name', $postID); ?> <?php the_field('team_member_last_name', $postID); ?></h2>
              <p class="team-about"><?php the_field('team_member_about', $postID); ?></p>

            </li>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
            </ul>
          </div>
        </div>

      </div><!-- end .container -->

    </main>

<?php get_footer() ?>
