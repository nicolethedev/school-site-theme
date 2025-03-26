<?php
					/**
					* Registers the custom fields for some blocks.
					*
					* @see https://developer.wordpress.org/reference/functions/register_post_meta/
					*/
					function school_site_register_custom_fields() {
						register_post_meta(
							'page',
							'school_email',
							array(
								'type'         => 'string',
								'show_in_rest' => true,
								'single'       => true
							)
						);
						register_post_meta(
							'page',
							'school_address',
							array(
								'type'         => 'string',
								'show_in_rest' => true,
								'single'       => true
							)
						);
					}
					add_action( 'init', 'school_site_register_custom_fields' );
					?>