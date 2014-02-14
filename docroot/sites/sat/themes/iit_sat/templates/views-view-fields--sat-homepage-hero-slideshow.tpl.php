<div class="slideshow-item">
	<div class="slide-image">
		<a href="<?php print $fields['field_hero_link']->content; ?>">
			<?php print $fields['field_sat_hero_image']->content; ?>
		</a>
	</div>
	<div class="slide-caption <?php print $fields['field_caption_position']->content; ?>">
		<h2 class="slide-title"><?php print $fields['title']->content; ?></h2>
		<div class="slide-body"><?php print $fields['body']->content; ?></div>
		<a href="<?php print $fields['field_hero_link']->content; ?>" class="slide-show-more">Show Me More &raquo;</a>
	</div>
</div>