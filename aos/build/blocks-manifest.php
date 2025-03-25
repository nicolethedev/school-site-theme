<?php
// This file is generated. Do not modify it manually.
return array(
	'aos' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'fwd-blocks/aos',
		'version' => '0.1.0',
		'title' => 'Animate on Scroll',
		'category' => 'design',
		'icon' => 'smiley',
		'description' => 'Animate on scroll',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => true
		),
		'attributes' => array(
			'aosAnimation' => array(
				'type' => 'string',
				'default' => 'fade-up'
			)
		),
		'textdomain' => 'aos',
		'editorScript' => 'file:./index.js'
	)
);
