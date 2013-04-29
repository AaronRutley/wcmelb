<?php /* Template Name: Home Page */ ?>

<?php get_header(); ?>

<div class="grid-100">
	<h1>WordCamp Melbourne!</h1>
 </div>

<?php if(get_field('alerts_')): ?>
	
		<div class="grid-100">
 		<h6>Important messages from WCMelb HQ:</h6>
		</div>

<?php while(the_repeater_field('alerts_')): ?>
<div class="alert-wrap">
	<p><?php the_sub_field('alert'); ?></p>
</div>
<?php endwhile; ?>

<?php endif; ?>

	
<div class="grid-100 grid-parent">
<div class="grid-100">
<h6>Latest #wcmelb from Instagram:</h6>
</div>
	
<?php
// instagram cpt query ordered by time as per post meta 
$args = array( 
	'post_type' => 'insta',
	'posts_per_page' => 3, 
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
<?php endwhile; ?> 
<?php endif; ?>
<?php wp_reset_postdata();?>
</div>

<div class="clear"></div>

	<div class="grid-100">
	<h6>Latest #wcmelb Tweets:</h6>
	</div>
	
<?php
// twitter cpt query ordered by title as title is the id 
$args = array( 
	'post_type' => 'twit',
	'posts_per_page' => 5, 
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
<?php endif; ?>

<?php wp_reset_postdata();?>






<div class="grid-100">
   <h6>Our Awesome Sponsors</h6>
</div>
<div class="sponsor-mask">			
   <div class="sponsor-slider" >			
      <div class="cycle-slideshow" data-cycle-fx=carousel data-cycle-timeout=2000      data-allow-wrap=false  > 
         <?php if(get_field('sponsor_slider')): ?>
      	  <?php while(the_repeater_field('sponsor_slider')): ?>
      		 <img src="<?php the_sub_field('image'); ?>" width="90" class="sponsor-logo" />
      		<?php endwhile; ?>
      	<?php endif; ?>
         <?php if(get_field('sponsor_slider')): ?>
      	  <?php while(the_repeater_field('sponsor_slider')): ?>
      	     <img src="<?php the_sub_field('image'); ?>" width="90" class="sponsor-logo" />
      	  <?php endwhile; ?>
      <?php endif; ?>
      </div>
   </div>
</div>





    
<?php get_footer(); ?>

