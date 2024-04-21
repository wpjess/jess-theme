<?php get_header(); ?>
<div id="content">
<div class="page-copy wrapper clearfix page-copy-wider">
	
<?php include('provider-search-form.php'); ?>

<div class="provider-search-results clearfix">
<?php $count = 1; if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php 
	$name = get_post_meta($post->ID, 'name', true);  
	$degree = get_post_meta($post->ID, 'degree', true);  
	$address = get_post_meta($post->ID, 'address', true);  
	$city = get_post_meta($post->ID, 'city', true);  
	$zip = get_post_meta($post->ID, 'zip', true);  
	$phone = get_post_meta($post->ID, 'phone', true);  
	$fax = get_post_meta($post->ID, 'fax', true);  
	$pcp = get_post_meta($post->ID, 'pcp', true);  
	$notes = get_post_meta($post->ID, 'notes', true);  
	$credentialed = get_post_meta($post->ID, 'credentialing_date', true);  
	$locations = get_post_meta($post->ID, 'locations', true);  
	$map = get_post_meta($post->ID, 'map', true);  
	$website = get_post_meta($post->ID, 'website', true);  
	$clinic_terms = get_the_terms(get_the_ID(), 'provider-clinic');
	$specialty_terms = get_the_terms(get_the_ID(), 'provider-specialty');
?>	
	<div class="<?php if($count == 1) { ?>half<?php } else { ?>half last<?php } ?>">
	<div class="provider-result equal clearfix">
		<?php if($name == '') { } else { ?>
			<div class="provider-label">Name:</div>
			<div class="provider-detail"><?php echo $name; ?></div>
		<?php } ?>
		<?php if($degree == '') { } else { ?>
			<div class="provider-label">Degree:</div>
			<div class="provider-detail"><?php echo $degree; ?></div>
		<?php } ?>
		<?php if ($clinic_terms && !is_wp_error($clinic_terms)) { ?>
			<div class="provider-label">Clinic:</div>
			<div class="provider-detail"><?php foreach ($clinic_terms as $clinic) {
            echo '' . esc_html($clinic->name) . '';} ?></div>
		<?php } ?>
		<?php if($address == '') { } else { ?>
			<div class="provider-label">Address:</div>
			<div class="provider-detail"><?php echo $address; ?></div>
		<?php } ?>
		<?php if($city == '') { } else { ?>
			<div class="provider-label">City:</div>
			<div class="provider-detail"><?php echo $city; ?></div>
		<?php } ?>
		<?php if($zip == '') { } else { ?>
			<div class="provider-label">Zip:</div>
			<div class="provider-detail"><?php echo $zip; ?></div>
		<?php } ?>
		<?php if($phone == '') { } else { ?>
			<div class="provider-label">Fax:</div>
			<div class="provider-detail"><?php echo $phone; ?></div>
		<?php } ?>
		<?php if($pcp == '') { } else { ?>
			<div class="provider-label">PCP:</div>
			<div class="provider-detail"><?php echo $pcp; ?></div>
		<?php } ?>
		<?php if($locations == '') { } else { ?>
			<div class="provider-label">Locations:</div>
			<div class="provider-detail"><?php echo $locations; ?></div>
		<?php } ?>
		<?php if($notes == '') { } else { ?>
			<div class="provider-label">Notes:</div>
			<div class="provider-detail"><?php echo $notes; ?></div>
		<?php } ?>
		<?php if($credentialed == '') { } else { ?>
			<div class="provider-label">Credentialing Date:</div>
			<div class="provider-detail"><?php echo $credentialed; ?></div>
		<?php } ?>
		<?php if($website == '') { } else { ?>
			<div class="provider-label-full"><a href="<?php echo $website; ?>" target="_blank">Website</a></div>
		<?php } ?>
		<div class="provider-label-full"><a href="https://www.google.com/maps/place/<?php echo $address; ?>,+<?php echo $city; ?>,+OR+<?php echo $zip; ?>/" target="_blank">Google Map</a></div>
	</div>
	</div>
<?php if ($count === 2) { $count = 0; } $count++; endwhile; endif; ?>
</div>

</div></div>
<?php get_footer(); ?>

