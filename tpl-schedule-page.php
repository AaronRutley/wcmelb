<?php /* Template Name: Schedule Page */ ?>

<?php get_header(); ?>

<div class="grid-100">
<h1 class="page-title"><span class="entypo-calendar"></span><?php the_title(); ?></h1>
</div>

<table class="schedule">
<thead>
   <tr>
   <th class="time">Time</th>
   <th class="user-col">User Stream <span>Storey Hall</span></th>
   <th class="dev-col">Dev Stream <span>Basement</span></th>
   </tr>
</thead>
    <tbody>
<?php while(the_flexible_field("schedule")): ?>
	<?php if(get_row_layout() == "break"): // layout: File ?>
	<tr>
		<td class="time break"><?php the_sub_field("start_time"); ?>
		<span class="end-time"><?php the_sub_field("end_time"); ?></span></td>
		<td class="break" colspan="2"><?php the_sub_field("break_type"); ?>
		<span><?php the_sub_field('break_location'); ?></span></td>
	</tr>
	
		<?php elseif(get_row_layout() == "group"): // layout: File ?>
	<tr>
		<td class="time"><?php the_sub_field("start_time"); ?>
		<span class="end-time"><?php the_sub_field("end_time"); ?></span></td>
		<td class="group" colspan="2"><?php the_sub_field("activity"); ?><span><?php the_sub_field('activity_location'); ?></span></td>
	</tr>
	
	
		<?php elseif(get_row_layout() == "cpt_session"): // layout: File ?>
<tr>
	 	<td class="time"><?php the_sub_field("start_time"); ?>
	 	<span class="end-time"><?php the_sub_field("end_time"); ?></span> </td>
		<td class="user-col">
            <?php
            $post_objects = get_sub_field('user');
            if( $post_objects ): ?>
            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
               <a onclick="parent.location='<?php the_permalink(); ?>'"><?php the_title(); ?></a>
            <span><?php the_field('speaker_name'); ?></span>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
		</td>
		<td class="dev-col">  
              <?php
            $post_objects = get_sub_field('dev');
            if( $post_objects ): ?>
            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
               <a onclick="parent.location='<?php the_permalink(); ?>'"><?php the_title(); ?></a>
            <span><?php the_field('speaker_name'); ?></span>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
            

 </td>
	</tr>
	 
	<?php endif; ?>
<?php endwhile; ?>
 </tbody>
</table>					
	
</div>
	
<?php get_footer(); ?>