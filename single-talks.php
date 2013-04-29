<?php get_header(); ?>
	
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>	
<div class="grid-100">



<div class="grid-80 prefix-10 suffix-10 mobile-grid-100">
<h1><?php the_title(); ?> </h1>
<h2 class="talk-speaker-name">- <?php the_field('speaker_name'); ?> </h2>


</div>
<div class="grid-80 prefix-10 suffix-10 mobile-grid-100 grid-parent">
   
   
   <div class="speaker-buttons">
   
<?php if (get_field('speaker_twitter') != '') { ?>
   <div class="grid-33 mobile-grid-100">
      <a href="http://twitter.com/<?php the_field('speaker_twitter'); ?>"><span class="entypo-twitter"></span> @<?php the_field('speaker_twitter'); ?></a>
   </div>
<?php } ?>


<?php if (get_field('speaker_url') != '') { ?>
   <div class="grid-33 mobile-grid-100">
      <a href="<?php the_field('speaker_url'); ?>"><?php the_field('speaker_url'); ?><span class="entypo-link"></span> </a>
   </div>
<?php } ?>



<?php if (get_field('speaker_slides') != '') { ?>
   <div class="grid-33 mobile-grid-100">
         <a href="<?php the_field('speaker_slides'); ?>"> <span class="entypo-docs"></span> View the slides on Slideshare</a>
   </div>
<?php } ?>

   </div><!-- speaker buttons -->


</div>



<div class="grid-80 prefix-10 suffix-10 mobile-grid-100">
<p></p>
<h5>Talk overview </h5>
<img src="<?php the_field('speaker_photo'); ?>" width="100" height="100" class="speaker-photo" />

   <?php the_content(); ?> 
   



</div>

<div class="grid-80 prefix-10 suffix-10 mobile-grid-100">

<h5>Comments and Questions: </h5>
<p>Let the speaker them know what you liked about their talk or ask them a question! </p>	  
 <?php comments_template(); ?>
</div>




</div>


<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>

	
<?php get_footer(); ?>