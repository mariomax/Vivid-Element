<!-- 
From:
	https://github.com/elementor/elementor/issues/3642
By user:
	bvbmedia
E Pro file:
	wp-content/plugins/elementor/includes/widgets/button.php
	...roughly line 445

Change this: -->

<?php
	if ( $settings['link']['is_external'] ) {
		$this->add_render_attribute( 'button', 'target', '_blank' );
	}
	if ( $settings['link']['nofollow'] ) {
		$this->add_render_attribute( 'button', 'rel', 'nofollow' );
	}
?>

<!-- To this: -->

<?php
	if ( $settings['link']['is_external'] && $settings['link']['nofollow'] ) {
		$this->add_render_attribute( 'button', 'target', '_blank' );
		$this->add_render_attribute( 'button', 'rel', 'noopener' );
	} else {
		if ( $settings['link']['is_external'] ) {
			$this->add_render_attribute( 'button', 'target', '_blank' );
		}
		if ( $settings['link']['nofollow'] ) {
			$this->add_render_attribute( 'button', 'rel', 'nofollow' );
		}
	}
?>

<!-- 
Other files: icons-list.php and social-icons.php have similar accessibility fixes. 
	This content adds "noreferrer" to outbound links. 
-->