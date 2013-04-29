<?php /* Template Name: Instagram Page */ ?>

<?php get_header(); ?>
	
<div class="grid-100">
<h1 class="page-title"><span class="entypo-instagrem">Instagram #wcmelb</h1>
</div>

<?php
// instagram cpt query ordered by time as per post meta 
$args = array( 
	'post_type' => 'insta',
	'posts_per_page' => 9, 
	'paged' => $paged,
	'orderby' => 'meta_value_num',
	'meta_key' => 'ig_time',
	'order' => 'DESC'
);

// new query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();?>
 
<div class="grid-33 mobile-grid-100 insta-grid">
    <div class="insta-wrap">
             <img src="<?php the_field('ig_image'); ?>" class="insta-image" /> 
	   
            <div class="insta-copy">
              <!-- <img src="<?php the_field('ig_userphoto'); ?>" width="50" class="insta-profile" /> -->
               <a href="<?php the_field('ig_link'); ?>" class="insta-name">@<?php the_field('ig_username'); ?></a>
              <?php the_content(); ?>  
            </div>
      </div>
</div>
  
  
<?php  endwhile; ?> 


<div class="grid-100">
<?php wp_pagenavi( array( 'query' => $the_query ) );?>
</div>

<?php endif; ?>

<?php wp_reset_postdata();?>

<?php get_footer(); ?>