<?php
/**
 * Team
 *
 * Template part for displaying Team: Simple Top layout
 *
 * You can override this template-part by copying it to:
 *     theme-child/template-parts/team-simple-top.php
 *     theme/template-parts/team-simple-top.php
 *
 * @var array $args Arguments passed to template
 *
 * @author 8guild
 */

?>
<div <?php echo startapp_get_attr( $args['attr'] ); ?>>
	<?php

	// Thumbnail
	echo $args['thumb'];

	// Name
	echo startapp_get_text( $args['name'], '<h3 class="teammate-name">', '</h3>' );

	// Position
	echo startapp_get_text( $args['position'], '<span class="teammate-info">', '</span>' );

	// About
	echo startapp_get_text( $args['about'], '<span class="teammate-info">', '</span>' );

	// Socials
	echo $args['socials'];
	?>
</div>
