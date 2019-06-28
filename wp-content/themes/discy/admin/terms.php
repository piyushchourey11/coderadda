<?php /* Term options */
function discy_admin_terms($tax = "") {
	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
	
	// Pull all the sidebars into an array
	$sidebars = get_option('sidebars');
	$new_sidebars = array('default'=> 'Default');
	foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
		$new_sidebars[$sidebar['id']] = $sidebar['name'];
	}
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/admin/images/';
	$imagepath_theme =  get_template_directory_uri(). '/images/';
	
	$options = array();
	$prefix = discy_terms."_";
	
	if (isset($tax) && $tax == "question-category") {
		$options[] = array(
			'name' => esc_html__("Question Category Setting",'discy'),
			'type' => 'heading-2'
		);
		
		/*
		$options[] = array(
			'name' => esc_html__('Category image?','discy'),
			'desc' => esc_html__('Note: It work only at forum.','discy'),
			'id'   => $prefix.'category_img',
			'type' => 'upload'
		);
		*/
		
		$options[] = array(
			'name' => esc_html__('Private category?','discy'),
			'desc' => esc_html__("Select 'On' to enable private category. (In private categories questions can only be seen by the author of the question and the admin).",'discy'),
			'id'   => $prefix.'private',
			'type' => 'checkbox'
		);
		
		$options[] = array(
			'name' => esc_html__('Special category?','discy'),
			'desc' => esc_html__("Select 'On' to enable special category. (In a special category, the admin must answer the question before anyone else).",'discy'),
			'id'   => $prefix.'special',
			'type' => 'checkbox'
		);
		
		$options[] = array(
			'name' => esc_html__('New category?','discy'),
			'desc' => esc_html__("Select 'On' to enable new category. (In a new category, the admin must answer the question before anyone else and the user has add question and admin only can answer).",'discy'),
			'id'   => $prefix.'new',
			'type' => 'checkbox'
		);
		
		$options[] = array(
			'type' => 'heading-2',
			'end'  => 'end'
		);
	}
	
	$options[] = array(
		'name' => esc_html__("Logo Setting",'discy'),
		'type' => 'heading-2'
	);
	
	$options[] = array(
		'name' => esc_html__('Custom logo','discy'),
		'id'   => $prefix.'custom_logo',
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'type'      => 'heading-2',
		'div'       => 'div',
		'condition' => $prefix.'custom_logo:not(0)'
	);
	
	$options[] = array(
		'name'    => esc_html__('Logo display','discy'),
		'desc'    => esc_html__('choose Logo display.','discy'),
		'id'      => $prefix.'logo_display',
		'std'     => 'display_title',
		'type'    => 'radio',
		'options' => array("display_title" => esc_html__("Display site title","discy"),"custom_image" => esc_html__("Custom Image","discy"))
	);
	
	$options[] = array(
		'name'      => esc_html__('Logo upload','discy'),
		'desc'      => esc_html__('Upload your custom logo. ','discy'),
		'id'        => $prefix.'logo_img',
		'type'      => 'upload',
		'condition' => $prefix.'logo_display:is(custom_image)',
		'options'   => array("height" => $prefix."logo_height","width" => $prefix."logo_width"),
	);
	
	$options[] = array(
		'name'      => esc_html__('Logo retina upload','discy'),
		'desc'      => esc_html__('Upload your custom logo retina.','discy'),
		'id'        => $prefix.'retina_logo',
		'type'      => 'upload',
		'condition' => $prefix.'logo_display:is(custom_image)'
	);
	
	$options[] = array(
		'name'      => esc_html__('Logo height','discy'),
		"id"        => $prefix."logo_height",
		"type"      => "sliderui",
		'std'       => '45',
		"step"      => "1",
		"min"       => "0",
		"max"       => "80",
		'condition' => $prefix.'logo_display:is(custom_image)'
	);
	
	$options[] = array(
		'name'      => esc_html__('Logo width','discy'),
		"id"        => $prefix."logo_width",
		"type"      => "sliderui",
		'std'       => '137',
		"step"      => "1",
		"min"       => "0",
		"max"       => "170",
		'condition' => $prefix.'logo_display:is(custom_image)'
	);
	
	$options[] = array(
		'name' => (isset($tax) && $tax == "question-category"?esc_html__('Enable logo at questions','discy'):esc_html__('Enable logo at posts','discy')),
		'id'   => $prefix.'logo_single',
		'std'  => 'on',
		'type' => 'checkbox',
	);
	
	$options[] = array(
		'type' => 'heading-2',
		'end'  => 'end',
		'div'  => 'div'
	);
	
	$options[] = array(
		'type' => 'heading-2',
		'end'  => 'end'
	);
	
	$options[] = array(
		'name' => esc_html__("Loop Setting","discy"),
		'type' => 'heading-2'
	);
	
	if (isset($tax) && $tax == "category") {
		$options[] = array(
			'name'    => esc_html__('Post style','discy'),
			'desc'    => esc_html__('Choose post style from here.','discy'),
			'id'      => $prefix.'post_style',
			'options' => array(
				'default' => esc_html__('Default','discy'),
				'style_1' => esc_html__('1 column','discy'),
				'style_2' => esc_html__('List style','discy'),
				'style_3' => esc_html__('Columns','discy'),
			),
			'std'   => 'default',
			'type'  => 'radio',
			'class' => 'radio',
		);
		
		$options[] = array(
			'type'      => 'heading-2',
			'div'       => 'div',
			'condition' => $prefix.'post_style:not(default)'
		);
		
		$options[] = array(
			'name' => esc_html__('Hide the featured image in the loop','discy'),
			'desc' => esc_html__('Select ON to hide the featured image in the loop.','discy'),
			'id'   => $prefix.'featured_image_loop_post',
			'type' => 'checkbox'
		);
		
		$options[] = array(
			'id'        => $prefix."sort_meta_title_image",
			'condition' => $prefix.'post_style:is(style_3)',
			'std'       => array(
							array("value" => "image",'name' => esc_html__('Image','discy'),"default" => "yes"),
							array("value" => "meta_title",'name' => esc_html__('Meta and title','discy'),"default" => "yes"),
						),
			'type'      => "sort",
			'options'   => array(
							array("value" => "image",'name' => esc_html__('Image','discy'),"default" => "yes"),
							array("value" => "meta_title",'name' => esc_html__('Meta and title','discy'),"default" => "yes"),
						)
		);
		
		$options[] = array(
			'name'    => esc_html__('Select the meta options','discy'),
			'id'      => $prefix.'post_meta',
			'type'    => 'multicheck',
			'std'     => array(
				"category_post" => "category_post",
				"title_post"    => "title_post",
				"author_by"     => "author_by",
				"post_date"     => "post_date",
				"post_comment"  => "post_comment",
				"post_views"    => "post_views",
			),
			'options' => array(
				"category_post" => esc_html__("Category post - Work at 1 column only",'discy'),
				"title_post"    => esc_html__("Title post",'discy'),
				"author_by"     => esc_html__("Author by - Work at 1 column only",'discy'),
				"post_date"     => esc_html__("Date meta",'discy'),
				"post_comment"  => esc_html__("Comment meta",'discy'),
				"post_views"    => esc_html__("Views stats",'discy'),
			)
		);
		
		$options[] = array(
			'name' => esc_html__('Read more enable or disable','discy'),
			'id'   => $prefix.'read_more',
			'std'  => 'on',
			'type' => 'checkbox',
		);
		
		$options[] = array(
			'name'    => esc_html__('Select the share options','discy'),
			'id'      => $prefix.'post_share',
			'type'    => 'multicheck',
			'condition' => $prefix.'post_style:not(style_3)',
			'sort'    => 'yes',
			'std'     => array(
				"share_facebook" => array("sort" => "Facebook","value" => "share_facebook"),
				"share_twitter"  => array("sort" => "Twitter","value" => "share_twitter"),
				"share_google"   => array("sort" => "Google","value" => "share_google"),
				"share_whatsapp" => array("sort" => "WhatsApp","value" => "share_whatsapp"),
			),
			'options' => array(
				"share_facebook" => array("sort" => "Facebook","value" => "share_facebook"),
				"share_twitter"  => array("sort" => "Twitter","value" => "share_twitter"),
				"share_google"   => array("sort" => "Google","value" => "share_google"),
				"share_whatsapp" => array("sort" => "WhatsApp","value" => "share_whatsapp"),
			)
		);
		
		$options[] = array(
			'name' => esc_html__('Excerpt post','discy'),
			'desc' => esc_html__('Put here the excerpt post.','discy'),
			'id'   => $prefix.'post_excerpt',
			'std'  => 40,
			'type' => 'text',
		);
		
		$options[] = array(
			'name'    => esc_html__('Pagination style','discy'),
			'desc'    => esc_html__('Choose pagination style from here.','discy'),
			'id'      => $prefix.'post_pagination',
			'options' => array(
				'standard'        => esc_html__('Standard','discy'),
				'pagination'      => esc_html__('Pagination','discy'),
				'load_more'       => esc_html__('Load more','discy'),
				'infinite_scroll' => esc_html__('Infinite scroll','discy'),
				'none'            => esc_html__('None','discy'),
			),
			'std'     => 'pagination',
			'type'    => 'radio',
			'class'   => 'radio',
		);
		
		$options[] = array(
			'name' => esc_html__("Post number",'discy'),
			'desc' => esc_html__("put the post number",'discy'),
			'id'   => $prefix.'post_number',
			'type' => 'text',
			'std'  => "5"
		);
		
		$options[] = array(
			'type' => 'heading-2',
			'end'  => 'end',
			'div'  => 'div'
		);
	}
	
	if (isset($tax) && $tax == "question-category") {
		$options[] = array(
			'name'    => esc_html__('Question style','discy'),
			'desc'    => esc_html__('Choose post style from here.','discy'),
			'id'      => $prefix.'question_columns',
			'options' => array(
				'default' => esc_html__('Default','discy'),
				'style_1' => esc_html__('1 column','discy'),
				'style_2' => esc_html__('2 columns','discy')." - ".esc_html__('Works with sidebar, full width, and left menu only.','discy'),
			),
			'std'   => 'default',
			'type'  => 'radio',
			'class' => 'radio',
		);
		
		$options[] = array(
			'type'      => 'heading-2',
			'div'       => 'div',
			'condition' => $prefix.'question_columns:not(default)'
		);
		
		$options[] = array(
			'name'    => esc_html__('Select the meta options','discy'),
			'id'      => $prefix.'question_meta',
			'type'    => 'multicheck',
			'std'     => array(
				"author_by"         => "author_by",
				"question_date"     => "question_date",
				"category_question" => "category_question",
				"question_answer"   => "question_answer",
				"question_views"    => "question_views",
				"bump_meta"         => "bump_meta",
			),
			'options' => array(
				"author_by"         => esc_html__('Author by','discy'),
				"question_date"     => esc_html__("Date meta",'discy'),
				"category_question" => esc_html__("Category question",'discy'),
				"question_answer"   => esc_html__("Answer meta",'discy'),
				"question_views"    => esc_html__("Views stats",'discy'),
				"bump_meta"         => esc_html__('Bump question meta','discy'),
			)
		);
		
		$options[] = array(
			'name' => esc_html__("Active the author image in questions loop?",'discy'),
			'id'   => $prefix.'author_image',
			'type' => 'checkbox',
			'std'  => 'on'
		);
		
		$options[] = array(
			'name' => esc_html__("Active the vote in loop?",'discy'),
			'id'   => $prefix.'vote_question_loop',
			'type' => 'checkbox',
			'std'  => 'on'
		);
		
		$options[] = array(
			'name'      => esc_html__("Select ON to hide the dislike at questions loop",'discy'),
			'id'        => $prefix.'question_loop_dislike',
			'type'      => 'checkbox',
			'condition' => $prefix.'vote_question_loop:not(0)'
		);
		
		$options[] = array(
			'name' => esc_html__('Select ON to show the poll in questions loop','discy'),
			'id'   => $prefix.'question_poll_loop',
			'type' => 'checkbox'
		);
		
		$options[] = array(
			'name' => esc_html__("Select ON to hide the excerpt in questions",'discy'),
			'id'   => $prefix.'excerpt_questions',
			'type' => 'checkbox',
		);
		
		$options[] = array(
			'div'       => 'div',
			'condition' => $prefix.'excerpt_questions:is(0)',
			'type'      => 'heading-2'
		);
		
		$options[] = array(
			'name'      => esc_html__('Excerpt question','discy'),
			'desc'      => esc_html__('Put here the excerpt question.','discy'),
			'id'        => $prefix.'question_excerpt',
			'std'       => 40,
			'type'      => 'text',
			'condition' => $prefix.'excerpt_questions:is(0)',
		);
		
		$options[] = array(
			'name' => esc_html__('Select ON to active the read more button in questions','discy'),
			'id'   => $prefix.'read_more_question_h',
			'type' => 'checkbox'
		);
		
		$options[] = array(
			'name' => esc_html__('Active the follow button at questions loop','discy'),
			'desc' => esc_html__('Select ON if you want to activate the follow button at questions loop.','discy'),
			'id'   => $prefix.'question_follow_loop',
			'type' => 'checkbox'
		);
		
		$options[] = array(
			'type' => 'heading-2',
			'div'  => 'div',
			'end'  => 'end'
		);
		
		$options[] = array(
			'name' => esc_html__("Tags at loop enable or disable",'discy'),
			'id'   => $prefix.'question_tags_loop',
			'type' => 'checkbox',
			'std'  => 'on'
		);
		
		$options[] = array(
			'name' => esc_html__('Active the answer at loop by best answer, most voted, last answer or first answer','discy'),
			'id'   => $prefix.'question_answer_loop',
			'type' => 'checkbox'
		);
		
		$options[] = array(
			'name'      => esc_html__('Answer type','discy'),
			'desc'      => esc_html__('Choose what\'s the answer you need to show from here.','discy'),
			'id'        => $prefix.'question_answer_show',
			'condition' => $prefix.'question_answer_loop:not(0)',
			'options'   => array(
				'best'   => esc_html__('Best answer','discy'),
				'vote'   => esc_html__('Most voted','discy'),
				'last'   => esc_html__('Last answer','discy'),
				'oldest' => esc_html__('First answer','discy'),
			),
			'std'       => 'best',
			'type'      => 'radio'
		);
		
		$options[] = array(
			'name'    => esc_html__('Pagination style','discy'),
			'desc'    => esc_html__('Choose pagination style from here.','discy'),
			'id'      => $prefix.'question_pagination',
			'options' => array(
				'standard'        => esc_html__('Standard','discy'),
				'pagination'      => esc_html__('Pagination','discy'),
				'load_more'       => esc_html__('Load more','discy'),
				'infinite_scroll' => esc_html__('Infinite scroll','discy'),
				'none'            => esc_html__('None','discy'),
			),
			'std'     => 'pagination',
			'type'    => 'radio',
			'class'   => 'radio',
		);
		
		$options[] = array(
			'name' => esc_html__("Question number",'discy'),
			'desc' => esc_html__("put the question number",'discy'),
			'id'   => $prefix.'question_number',
			'type' => 'text',
			'std'  => "5"
		);
		
		$options[] = array(
			'type' => 'heading-2',
			'end'  => 'end',
			'div'  => 'div'
		);
	}
	
	$options[] = array(
		'type' => 'heading-2',
		'end'  => 'end'
	);
	
	$options[] = array(
		'name' => esc_html__("Category Setting","discy"),
		'type' => 'heading-2'
	);
	
	$options[] = array(
		'name' => (isset($tax) && $tax == "question-category"?esc_html__('Enable the setting at questions','discy'):esc_html__('Enable the setting at posts','discy')),
		'desc' => (isset($tax) && $tax == "question-category"?esc_html__("Select ON to enable the setting at inner questions",'discy'):esc_html__("Select ON to enable the setting at inner posts",'discy')),
		'id'   => $prefix.'setting_single',
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => esc_html__("Category sidebar layout",'discy'),
		'id'   => $prefix."cat_sidebar_layout",
		'std'  => "default",
		'type' => "images",
		'options' => array(
			'default'      => $imagepath.'sidebar_default.jpg',
			'menu_sidebar' => $imagepath.'menu_sidebar.jpg',
			'right'        => $imagepath.'sidebar_right.jpg',
			'full'         => $imagepath.'sidebar_no.jpg',
			'left'         => $imagepath.'sidebar_left.jpg',
			'centered'     => $imagepath.'centered.jpg',
			'menu_left'    => $imagepath.'menu_left.jpg',
		)
	);
	
	$options[] = array(
		'name'      => esc_html__("Category Page sidebar",'discy'),
		'id'        => $prefix."cat_sidebar",
		'std'       => '',
		'options'   => $new_sidebars,
		'type'      => 'select',
		'condition' => $prefix.'cat_sidebar_layout:not(full),'.$prefix.'cat_sidebar_layout:not(centered),'.$prefix.'cat_sidebar_layout:not(menu_left)'
	);
	
	$options[] = array(
		'name'      => esc_html__("Category Page sidebar 2",'discy'),
		'id'        => $prefix."cat_sidebar_2",
		'std'       => '',
		'options'   => $new_sidebars,
		'type'      => 'select',
		'operator'  => 'or',
		'condition' => $prefix.'sidebar:is(menu_sidebar),'.$prefix.'sidebar:is(menu_left)'
	);
	
	$options[] = array(
		'name'    => esc_html__("Choose Your Skin",'discy'),
		'class'   => "site_skin",
		'id'      => $prefix."cat_skin",
		'std'     => "default",
		'type'    => "images",
		'options' => array(
			'default'    => $imagepath.'default_color.jpg',
			'skin'       => $imagepath.'default.jpg',
			'violet'     => $imagepath.'violet.jpg',
			'bright_red' => $imagepath.'bright_red.jpg',
			'green'      => $imagepath.'green.jpg',
			'red'        => $imagepath.'red.jpg',
			'cyan'       => $imagepath.'cyan.jpg',
			'blue'       => $imagepath.'blue.jpg',
		)
	);
	
	$options[] = array(
		'name' => esc_html__("Primary Color",'discy'),
		'id'   => $prefix.'cat_primary_color',
		'type' => 'color' );
	
	$options[] = array(
		'name'    => esc_html__("Background Type",'discy'),
		'id'      => $prefix.'cat_background_type',
		'std'     => 'default',
		'type'    => 'radio',
		'options' => 
			array(
				"default"           => esc_html__("Default","discy"),
				"none"              => esc_html__("None","discy"),
				"patterns"          => esc_html__("Patterns","discy"),
				"custom_background" => esc_html__("Custom Background","discy")
			)
	);

	$options[] = array(
		'name'      => esc_html__("Background Color",'discy'),
		'id'        => $prefix.'cat_background_color',
		'std'       => "#FFF",
		'type'      => 'color',
		'condition' => $prefix.'cat_background_type:is(patterns)'
	);
		
	$options[] = array(
		'name'      => esc_html__("Choose Pattern",'discy'),
		'id'        => $prefix."cat_background_pattern",
		'std'       => "bg13",
		'type'      => "images",
		'class'     => "pattern_images",
		'condition' => $prefix.'cat_background_type:is(patterns)',
		'options'   => array(
			'bg1'  => $imagepath.'bg1.jpg',
			'bg2'  => $imagepath.'bg2.jpg',
			'bg3'  => $imagepath.'bg3.jpg',
			'bg4'  => $imagepath.'bg4.jpg',
			'bg5'  => $imagepath.'bg5.jpg',
			'bg6'  => $imagepath.'bg6.jpg',
			'bg7'  => $imagepath.'bg7.jpg',
			'bg8'  => $imagepath.'bg8.jpg',
			'bg9'  => $imagepath_theme.'patterns/bg9.png',
			'bg10' => $imagepath_theme.'patterns/bg10.png',
			'bg11' => $imagepath_theme.'patterns/bg11.png',
			'bg12' => $imagepath_theme.'patterns/bg12.png',
			'bg13' => $imagepath.'bg13.jpg',
			'bg14' => $imagepath.'bg14.jpg',
			'bg15' => $imagepath_theme.'patterns/bg15.png',
			'bg16' => $imagepath_theme.'patterns/bg16.png',
			'bg17' => $imagepath.'bg17.jpg',
			'bg18' => $imagepath.'bg18.jpg',
			'bg19' => $imagepath.'bg19.jpg',
			'bg20' => $imagepath.'bg20.jpg',
			'bg21' => $imagepath_theme.'patterns/bg21.png',
			'bg22' => $imagepath.'bg22.jpg',
			'bg23' => $imagepath_theme.'patterns/bg23.png',
			'bg24' => $imagepath_theme.'patterns/bg24.png',
		)
	);

	$options[] = array(
		'name'      => esc_html__( "Custom Background",'discy'),
		'id'        => $prefix.'cat_custom_background',
		'std'       => $background_defaults,
		'options'   => $background_defaults,
		'type'      => 'background',
		'condition' => $prefix.'cat_background_type:is(custom_background)'
	);
		
	$options[] = array(
		'name'      => esc_html__("Full Screen Background",'discy'),
		'desc'      => esc_html__("Select ON to Full Screen Background",'discy'),
		'id'        => $prefix.'cat_full_screen_background',
		'type'      => 'checkbox',
		'condition' => $prefix.'cat_background_type:is(custom_background)'
	);
	
	$options[] = array(
		'type' => 'heading-2',
		'end'  => 'end'
	);
	
	$options[] = array(
		'name' => esc_html__('Advertising','discy'),
		'type' => 'heading-2'
	);
	$options[] = array(
		'type' => 'info',
		'name' => esc_html__('Advertising after header 1','discy')
	);
	
	$options[] = array(
		'name'    => esc_html__('Advertising type','discy'),
		'id'      => $prefix.'header_adv_type_1',
		'std'     => 'custom_image',
		'type'    => 'radio',
		'options' => array("display_code" => esc_html__("Display code","discy"),"custom_image" => esc_html__("Custom Image","discy"))
	);
	
	$options[] = array(
		'name'      => esc_html__('Image URL','discy'),
		'desc'      => esc_html__('Upload a image, or enter URL to an image if it is already uploaded.','discy'),
		'id'        => $prefix.'header_adv_img_1',
		'condition' => $prefix.'header_adv_type_1:is(custom_image)',
		'type'      => 'upload'
	);
	
	$options[] = array(
		'name'      => esc_html__('Advertising url','discy'),
		'id'        => $prefix.'header_adv_href_1',
		'std'       => '#',
		'condition' => $prefix.'header_adv_type_1:is(custom_image)',
		'type'      => 'text'
	);
	
	$options[] = array(
		'name'      => esc_html__('Advertising Code html ( Ex: Google ads)','discy'),
		'id'        => $prefix.'header_adv_code_1',
		'condition' => $prefix.'header_adv_type_1:is(display_code)',
		'type'      => 'textarea'
	);
	
	$options[] = array(
		'type' => 'info',
		'name' => esc_html__('Advertising after content','discy')
	);
	
	$options[] = array(
		'name'    => esc_html__('Advertising type','discy'),
		'id'      => $prefix.'content_adv_type',
		'std'     => 'custom_image',
		'type'    => 'radio',
		'options' => array("display_code" => esc_html__("Display code","discy"),"custom_image" => esc_html__("Custom Image","discy"))
	);
	
	$options[] = array(
		'name'      => esc_html__('Image URL','discy'),
		'desc'      => esc_html__('Upload a image, or enter URL to an image if it is already uploaded.','discy'),
		'id'        => $prefix.'content_adv_img',
		'type'      => 'upload',
		'condition' => $prefix.'content_adv_type:is(custom_image)'
	);
	
	$options[] = array(
		'name'      => esc_html__('Advertising url','discy'),
		'id'        => $prefix.'content_adv_href',
		'std'       => '#',
		'type'      => 'text',
		'condition' => $prefix.'content_adv_type:is(custom_image)'
	);
	
	$options[] = array(
		'name'      => esc_html__('Advertising Code html ( Ex: Google ads)','discy'),
		'id'        => $prefix.'content_adv_code',
		'type'      => 'textarea',
		'condition' => $prefix.'content_adv_type:is(display_code)'
	);
	
	$options[] = array(
		'name' => esc_html__('Between questions or posts','discy'),
		'type' => 'info'
	);
	
	$options[] = array(
		'name'    => esc_html__('Advertising type','discy'),
		'id'      => $prefix.'between_adv_type',
		'std'     => 'custom_image',
		'type'    => 'radio',
		'options' => array("display_code" => esc_html__("Display code","discy"),"custom_image" => esc_html__("Custom Image","discy"))
	);
	
	$options[] = array(
		'name'      => esc_html__('Image URL','discy'),
		'desc'      => esc_html__('Upload a image, or enter URL to an image if it is already uploaded.','discy'),
		'id'        => $prefix.'between_adv_img',
		'condition' => $prefix.'between_adv_type:is(custom_image)',
		'type'      => 'upload'
	);
	
	$options[] = array(
		'name'      => esc_html__('Advertising url','discy'),
		'id'        => $prefix.'between_adv_href',
		'std'       => '#',
		'condition' => $prefix.'between_adv_type:is(custom_image)',
		'type'      => 'text'
	);
	
	$options[] = array(
		'name'      => esc_html__('Advertising Code html (Ex: Google ads)','discy'),
		'id'        => $prefix.'between_adv_code',
		'condition' => $prefix.'between_adv_type:not(custom_image)',
		'type'      => 'textarea'
	);
	
	$options[] = array(
		'type' => 'heading-2',
		'end'  => 'end'
	);
	
	return $options;
}