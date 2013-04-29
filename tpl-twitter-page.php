<?php /* Template Name: Twitter Page */ ?>

<?php get_header(); ?>

<div class="grid-100">
<h1 class="page-title"><span class="entypo-twitter">Twitter #wcmelb</h1>
</div>


<?php
// twitter cpt query ordered by title as title is the id 
$args = array( 
	'post_type' => 'twit',
	'posts_per_page' => 25, 
	'paged' => $paged,
	'orderby' => 'title'
);

// new query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();?>
 
 
<div class="grid-100 mobile-grid-100 grid-parent">
   <div class="twit-wrap twitter-id-<?php the_field('twitter_id'); ?>">
          <a href="http://twitter.com/<?php the_field('twitter_user'); ?>">
          <img src="<?php the_field('twitter_profile_pic'); ?>" class="twitter-image" />
         </a>
              <span class="twitter-name"><?php the_field('twitter_name'); ?></span>
       <?php the_content(); ?> 
   </div>
</div>

 
<?php  endwhile; ?> 
<div class="grid-100">
<?php wp_pagenavi( array( 'query' => $the_query ) );?>
<div class="clear"></div>
<p>Please note these tweets will be moderated for spam, offensive language etc</p>
</div>
<?php endif; ?>

<?php wp_reset_postdata();?>


<?php get_footer(); ?>