<?php

function nestor_form_system_theme_settings_alter(&$form, $form_state) {
  
  $header_versions = array('header-1' => t('Version 1'),
                           'header-2' => t('Version 2'));
  
  $theme_colors = array('aqua'    => t('Aqua'),
	                      'blue'    => t('Blue'),
                        'brown'   => t('Brown'),
                        'emerald' => t('Emerald'),
		                    'green'   => t('Green'),
		                    'orange'  => t('Orange'),
		                    'red'     => t('Red'),
                        'violet'  => t('Violet'),
		                    'yellow'  => t('Yellow'),
		                    'custom'  => t('Custom'));

  $text_colors = array('text-color-default' => t('Default'),
                       'text-color-light'   => t('Light'),
                       'text-color-theme'   => t('Theme Color'));
	
  $background_colors = array('bg-color-white'      => t('White'),
                             'bg-color-theme'      => t('Theme Color'),
                             'bg-color-grayDark1'  => t('Gray Dark 1'),
                             'bg-color-grayDark2'  => t('Gray Dark 2'),
                             'bg-color-grayLight1' => t('Gray Light 1'),
                             'bg-color-aqua'       => t('Aqua'),
                             'bg-color-blue'       => t('Blue'),
                             'bg-color-brown'      => t('Brown'),
                             'bg-color-emerald'    => t('Emerald'),
                             'bg-color-green'      => t('Green'),
                             'bg-color-orange'     => t('Orange'),
                             'bg-color-red'        => t('Red'),
                             'bg-color-violet'     => t('Violet'),
                             'bg-color-yellow'     => t('Yellow'));

  $background_patterns = array('bg-pattern-45degreee_fabric'       => t('45 Degreee Fabric'),
                               'bg-pattern-agsquare'               => t('Agsquare'),
                               'bg-pattern-asfalt'                 => t('Asfalt'),
                               'bg-pattern-bedge_grunge'           => t('Bedge Grunge'),
                               'bg-pattern-billie_holiday'         => t('Billie Holiday'),
                               'bg-pattern-binding_dark'           => t('Binding Dark'),
                               'bg-pattern-binding_light'          => t('Binding Light'),
                               'bg-pattern-black_linen'            => t('Black Linen'),
                               'bg-pattern-blackorchid'            => t('Blackorchid'),
                               'bg-pattern-brickwall'              => t('Brickwall'),
                               'bg-pattern-bright_squares'         => t('Bright Squares'),
                               'bg-pattern-brillant'               => t('Brillant'),
                               'bg-pattern-brushed_alu_dark'       => t('Brushed Alu Dark'),
                               'bg-pattern-brushed_alu'            => t('Brushed Alu'),
                               'bg-pattern-carbon_fibre_big'       => t('Carbon Fibre Big'),
                               'bg-pattern-cardboard_flat'         => t('Cardboard Flat'),
                               'bg-pattern-cartographer'           => t('Cartographer'),
                               'bg-pattern-chruch'                 => t('Chruch'),
                               'bg-pattern-climpek'                => t('Climpek'),
                               'bg-pattern-concrete_wall_3'        => t('Concrete Wall 3'),
                               'bg-pattern-cream_pixels'           => t('Cream Pixels'),
                               'bg-pattern-crisp_paper_ruffles'    => t('Crisp Paper Ruffles'),
                               'bg-pattern-cross_scratches'        => t('Cross Scratches'),
                               'bg-pattern-crossed_stripes'        => t('Crossed Stripes'),
                               'bg-pattern-dark_dotted'            => t('Dark Dotted'),
                               'bg-pattern-dark_dotted2'           => t('Dark Dotted 2'),
                               'bg-pattern-dark_fish_skin'         => t('Dark Fish Skin'),
                               'bg-pattern-dark_geometric'         => t('Dark Geometric'),
                               'bg-pattern-dark_mosaic'            => t('Dark Mosaic'),
                               'bg-pattern-dark_wood'              => t('Dark Wood'),
                               'bg-pattern-debut_dark'             => t('Debut Dark'),
                               'bg-pattern-debut_light'            => t('Debut Light'),
                               'bg-pattern-diagonales_decalees'    => t('Diagonales Decalees'),
                               'bg-pattern-dust'                   => t('Dust'),
                               'bg-pattern-escheresque_ste'        => t('Escheresque Ste'),
                               'bg-pattern-fabric_of_squares_gray' => t('Fabric of Squares Gray'),
                               'bg-pattern-fabric_plaid'           => t('Fabric Plaid'),
                               'bg-pattern-gplaypattern'           => t('GPlay Pattern'),
                               'bg-pattern-grey'                   => t('Grey'),
                               'bg-pattern-grey_wash_wall'         => t('Grey Wash Wall'),
                               'bg-pattern-greyfloral'             => t('Greyfloral'),
                               'bg-pattern-honey_im_subtle'        => t('Honey I am subtle'),
                               'bg-pattern-low_contrast_linen'     => t('Low contrast Linen'),
                               'bg-pattern-mochaGrunge'            => t('Mocha Grunge'),
                               'bg-pattern-mooning'                => t('Mooning'),
                               'bg-pattern-navy_blue'              => t('Navy Blue'),
                               'bg-pattern-otis_redding'           => t('Otis Redding'),
                               'bg-pattern-p1'                     => t('P1'),
                               'bg-pattern-p2'                     => t('P2'),
                               'bg-pattern-p4'                     => t('P4'),
                               'bg-pattern-p5'                     => t('P5'),
                               'bg-pattern-p6'                     => t('P6'),
                               'bg-pattern-ps_neutral'             => t('Ps Neutral'),
                               'bg-pattern-pw_maze_black'          => t('Pw Maze Black'),
                               'bg-pattern-pw_pattern'             => t('Pw Pattern'),
                               'bg-pattern-retina_wood'            => t('Retina Wood'),
                               'bg-pattern-shattered'              => t('Shattered'),
                               'bg-pattern-skelatal_weave'         => t('Skelatal Weave'),
                               'bg-pattern-slash_it'               => t('Slash it'),
                               'bg-pattern-squairy_light'          => t('Squairy Light'),
                               'bg-pattern-subtle_grunge'          => t('Subtle Grunge'),
                               'bg-pattern-subtle_surface'         => t('Subtle Surface'),
                               'bg-pattern-textured_paper'         => t('Textured Paper'),
                               'bg-pattern-ticks'                  => t('Ticks'),
                               'bg-pattern-tileable_wood_texture'  => t('Tileable Wood Texture'),
                               'bg-pattern-tweed'                  => t('Tweed'),
                               'bg-pattern-type'                   => t('Type'),
                               'bg-pattern-use_your_illusion'      => t('Use Your Illusion'),
                               'bg-pattern-washi'                  => t('Washi'),
                               'bg-pattern-wavegrid'               => t('Wavegrid'),
                               'bg-pattern-white_wall_hash'        => t('White Wall Hash'),
                               'bg-pattern-wild_oliva'             => t('Wild Oliva'),
                               'bg-pattern-witewall_3'             => t('Wite Wall 3'));

  $background_images = array('bg-image-coffee'       => t('Background Image Coffee'),
                             'bg-image-rails'        => t('Background Image Rails'),
                             'bg-image-cactus'       => t('Background Image Cactus'),
                             'bg-image-bench'        => t('Background Image Bench'),
                             'bg-image-city'         => t('Background Image City'),
                             'bg-image-dealer'       => t('Background Image Dealer'),
                             'bg-image-photographer' => t('Background Image Photographer'));



  $form['settings'] = array(     
        '#type' => 'vertical_tabs',  
        '#title' => t('Nestor Settings'),
        '#weight' => 2,              
        '#collapsible' => TRUE,      
        '#collapsed' => FALSE);                             


  /************************/
  /*** General Settings ***/
  /************************/

  $form['settings']['general'] = array(
        '#type' => 'fieldset',
        '#title' => t('General settings'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE);

  $form['settings']['general']['layout'] = array(
    '#type' => 'fieldset',
    '#title' => t('Layout settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['settings']['general']['layout']['layout_version'] = array(
    '#type' => 'select',
    '#title' => t('Layout Version'),
    '#options' => array('wide' => 'Wide', 'boxed' => "Boxed"),
    '#default_value' => theme_get_setting('layout_version'),
    '#description' => t('Set the layout version of your theme.'),
  );

  $form['settings']['general']['layout']['boxed_bPattern'] = array(
    '#type' => 'select',
    '#title' => t('Boxed Pattern'),
    '#options' => $background_patterns,
    '#default_value' => theme_get_setting('boxed_bPattern'),
    '#description' => t('Set the background pattern for the boxed version.'),
  );
  
  // Theme Colors
  $form['settings']['general']['colors'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['settings']['general']['colors']['theme_color'] = array(
    '#type' => 'select',
    '#title' => t('Theme Color'),
    '#options' => $theme_colors,
    '#default_value' => theme_get_setting('theme_color'),
    '#description' => t('Set the main color of your theme.'),
  );

  // Theme
  $form['settings']['general']['theme'] = array(
        '#type' => 'fieldset',
        '#title' => t('Theme settings'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['general']['theme']['breadcrumbs'] = array(
        '#type' => 'radios',
        '#title' => t('Breadcrumbs'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('breadcrumbs'),
        '#description' => t('Enable or disable Breadcrumbs'));
	
  $form['settings']['general']['theme']['breadcrumb_delimiter'] = array(
        '#type' => 'textfield',
        '#title' => t('Breadcrumb Delimiter'),
        '#default_value' => theme_get_setting('breadcrumb_delimiter'),
        '#size' => 10,
        '#maxlength' => 10);
	
  $form['settings']['general']['theme']['header_version'] = array(
        '#type' => 'select',
        '#title' => t('Header Version'),
        '#options' => $header_versions,
        '#default_value' => theme_get_setting('header_version'),
        '#description' => t('Choose the Header Version.'));

  $form['settings']['general']['theme']['sticky_header'] = array(
        '#type' => 'radios',
        '#title' => t('Sticky Header'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('sticky_header'),
        '#description' => t('Enable or disable the Sticky Header'));

  $form['settings']['general']['theme']['back_to_top'] = array(
        '#type' => 'radios',
        '#title' => t('Activate Back to top button'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('back_to_top'),
        '#description' => t('Set the Back to top button on or off.'),
  );
	
  // Demo switcher
  $form['settings']['general']['demo'] = array(
        '#type' => 'fieldset',
        '#title' => t('Demo settings'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['general']['demo']['switcher'] = array(
        '#type' => 'radios',
        '#title' => t('Activate switcher'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('switcher'),
        '#description' => t('Set the switcher on or off.'));
	
	
  /************************/
  /*** Regions Settings ***/
  /************************/
	
  $form['settings']['regions'] = array(
        '#type' => 'fieldset',
        '#title' => t('Regions'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE);
	
  // Top Header region
  $form['settings']['regions']['top_header_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Top Header Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['top_header_region']['top_header_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('top_header_bColor'),
        '#description' => t('Set the Background Color for your Top Header Region.'));
	
  $form['settings']['regions']['top_header_region']['top_header_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('top_header_tColor'),
        '#description' => t('Set the Text Color for your Top Header Region.'));
  
  // Highlighted 1 region
  $form['settings']['regions']['highlighted_1_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Highlighted 1 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['highlighted_1_region']['highlighted_1_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('highlighted_1_bColor'),
        '#description' => t('Set the Background Color for your Highlighted 1 Region.'));
	
  $form['settings']['regions']['highlighted_1_region']['highlighted_1_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('highlighted_1_tColor'),
        '#description' => t('Set the Text Color for your Highlighted 1 Region.'));

  $form['settings']['regions']['highlighted_1_region']['highlighted_1_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('highlighted_1_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['highlighted_1_region']['highlighted_1_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Highlighted 1 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('highlighted_1_bImg'),
        '#description' => t('Set the background image of your Highlighted 1 Region.'));

  $form['settings']['regions']['highlighted_1_region']['highlighted_1_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('highlighted_1_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['highlighted_1_region']['h1_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('h1_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['highlighted_1_region']['h1_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('h1_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['highlighted_1_region']['h1_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('h1_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));

  // Highlighted 2 region
  $form['settings']['regions']['highlighted_2_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Highlighted 2 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
  
  $form['settings']['regions']['highlighted_2_region']['highlighted_2_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('highlighted_2_bColor'),
        '#description' => t('Set the Background Color for your Highlighted 2 Region.'));
  
  $form['settings']['regions']['highlighted_2_region']['highlighted_2_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('highlighted_2_tColor'),
        '#description' => t('Set the Text Color for your Highlighted 2 Region.'));

  $form['settings']['regions']['highlighted_2_region']['highlighted_2_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('highlighted_2_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['highlighted_2_region']['highlighted_2_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Highlighted 2 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('highlighted_2_bImg'),
        '#description' => t('Set the background image of your Highlighted 2 Region.'));

  $form['settings']['regions']['highlighted_2_region']['highlighted_2_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('highlighted_2_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['highlighted_2_region']['h2_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('h2_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['highlighted_2_region']['h2_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('h2_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['highlighted_2_region']['h2_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('h2_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 1 region
  $form['settings']['regions']['content_1_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 1 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_1_region']['content_1_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_1_bColor'),
        '#description' => t('Set the Background Color for your Content 1 Region.'));
	
  $form['settings']['regions']['content_1_region']['content_1_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_1_tColor'),
        '#description' => t('Set the Text Color for your Content 1 Region.'));
  
  $form['settings']['regions']['content_1_region']['content_1_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_1_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_1_region']['content_1_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 1 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_1_bImg'),
        '#description' => t('Set the background image of your Content 1 Region.'));

  $form['settings']['regions']['content_1_region']['content_1_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_1_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_1_region']['c1_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c1_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_1_region']['c1_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c1_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_1_region']['c1_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c1_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 2 region
  $form['settings']['regions']['content_2_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 2 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_2_region']['content_2_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_2_bColor'),
        '#description' => t('Set the Background Color for your Content 2 Region.'));
	
  $form['settings']['regions']['content_2_region']['content_2_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_2_tColor'),
        '#description' => t('Set the Text Color for your Content 2 Region.'));
  
  $form['settings']['regions']['content_2_region']['content_2_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_2_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_2_region']['content_2_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 2 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_2_bImg'),
        '#description' => t('Set the background image of your Content 2 Region.'));

  $form['settings']['regions']['content_2_region']['content_2_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_2_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_2_region']['c2_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c2_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_2_region']['c2_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c2_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_2_region']['c2_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c2_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 3 region
  $form['settings']['regions']['content_3_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 3 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_3_region']['content_3_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_3_bColor'),
        '#description' => t('Set the Background Color for your Content 3 Region.'));
	
  $form['settings']['regions']['content_3_region']['content_3_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_3_tColor'),
        '#description' => t('Set the Text Color for your Content 3 Region.'));
  
  $form['settings']['regions']['content_3_region']['content_3_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_3_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_3_region']['content_3_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 3 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_3_bImg'),
        '#description' => t('Set the background image of your Content 3 Region.'));

  $form['settings']['regions']['content_3_region']['content_3_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_3_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_3_region']['c3_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c3_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_3_region']['c3_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c3_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_3_region']['c3_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c3_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 4 region
  $form['settings']['regions']['content_4_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 4 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_4_region']['content_4_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_4_bColor'),
        '#description' => t('Set the Background Color for your Content 4 Region.'));
	
  $form['settings']['regions']['content_4_region']['content_4_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_4_tColor'),
        '#description' => t('Set the Text Color for your Content 4 Region.'));
  
  $form['settings']['regions']['content_4_region']['content_4_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_4_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_4_region']['content_4_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 4 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_4_bImg'),
        '#description' => t('Set the background image of your Content 4 Region.'));

  $form['settings']['regions']['content_4_region']['content_4_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_4_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_4_region']['c4_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c4_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_4_region']['c4_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c4_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_4_region']['c4_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c4_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 5 region
  $form['settings']['regions']['content_5_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 5 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_5_region']['content_5_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_5_bColor'),
        '#description' => t('Set the Background Color for your Content 5 Region.'));
	
  $form['settings']['regions']['content_5_region']['content_5_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_5_tColor'),
        '#description' => t('Set the Text Color for your Content 5 Region.'));
  
  $form['settings']['regions']['content_5_region']['content_5_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_5_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_5_region']['content_5_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 5 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_5_bImg'),
        '#description' => t('Set the background image of your Content 5 Region.'));

  $form['settings']['regions']['content_5_region']['content_5_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_5_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_5_region']['c5_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c5_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_5_region']['c5_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c5_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_5_region']['c5_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c5_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 6 region
  $form['settings']['regions']['content_6_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 6 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_6_region']['content_6_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_6_bColor'),
        '#description' => t('Set the Background Color for your Content 6 Region.'));
	
  $form['settings']['regions']['content_6_region']['content_6_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_6_tColor'),
        '#description' => t('Set the Text Color for your Content 6 Region.'));
  
  $form['settings']['regions']['content_6_region']['content_6_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_6_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_6_region']['content_6_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 6 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_6_bImg'),
        '#description' => t('Set the background image of your Content 6 Region.'));

  $form['settings']['regions']['content_6_region']['content_6_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_6_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_6_region']['c6_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c6_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_6_region']['c6_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c6_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_6_region']['c6_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c6_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 7 region
  $form['settings']['regions']['content_7_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 7 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_7_region']['content_7_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_7_bColor'),
        '#description' => t('Set the Background Color for your Content 7 Region.'));
	
  $form['settings']['regions']['content_7_region']['content_7_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_7_tColor'),
        '#description' => t('Set the Text Color for your Content 7 Region.'));
  
  $form['settings']['regions']['content_7_region']['content_7_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_7_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_7_region']['content_7_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 7 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_7_bImg'),
        '#description' => t('Set the background image of your Content 7 Region.'));

  $form['settings']['regions']['content_7_region']['content_7_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_7_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_7_region']['c7_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c7_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_7_region']['c7_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c7_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_7_region']['c7_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c7_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 8 region
  $form['settings']['regions']['content_8_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 8 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_8_region']['content_8_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_8_bColor'),
        '#description' => t('Set the Background Color for your Content 8 Region.'));
	
  $form['settings']['regions']['content_8_region']['content_8_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_8_tColor'),
        '#description' => t('Set the Text Color for your Content 8 Region.'));
  
  $form['settings']['regions']['content_8_region']['content_8_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_8_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_8_region']['content_8_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 8 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_8_bImg'),
        '#description' => t('Set the background image of your Content 8 Region.'));

  $form['settings']['regions']['content_8_region']['content_8_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_8_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_8_region']['c8_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c8_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_8_region']['c8_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c8_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_8_region']['c8_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c8_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Content 9 region
  $form['settings']['regions']['content_9_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 9 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['content_9_region']['content_9_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_9_bColor'),
        '#description' => t('Set the Background Color for your Content 9 Region.'));
	
  $form['settings']['regions']['content_9_region']['content_9_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_9_tColor'),
        '#description' => t('Set the Text Color for your Content 9 Region.'));
  
  $form['settings']['regions']['content_9_region']['content_9_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_9_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_9_region']['content_9_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 9 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_9_bImg'),
        '#description' => t('Set the background image of your Content 9 Region.'));

  $form['settings']['regions']['content_9_region']['content_9_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_9_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_9_region']['c9_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c9_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_9_region']['c9_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c9_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_9_region']['c9_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c9_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));

  // Content 10 region
  $form['settings']['regions']['content_10_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 10 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
  
  $form['settings']['regions']['content_10_region']['content_10_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_10_bColor'),
        '#description' => t('Set the Background Color for your Content 10 Region.'));
  
  $form['settings']['regions']['content_10_region']['content_10_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_10_tColor'),
        '#description' => t('Set the Text Color for your Content 10 Region.'));
  
  $form['settings']['regions']['content_10_region']['content_10_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_10_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_10_region']['content_10_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 10 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_10_bImg'),
        '#description' => t('Set the background image of your Content 10 Region.'));

  $form['settings']['regions']['content_10_region']['content_10_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_10_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_10_region']['c10_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c10_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_10_region']['c10_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c10_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_10_region']['c10_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c10_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));

  // Content 11 region
  $form['settings']['regions']['content_11_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 11 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
  
  $form['settings']['regions']['content_11_region']['content_11_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_11_bColor'),
        '#description' => t('Set the Background Color for your Content 11 Region.'));
  
  $form['settings']['regions']['content_11_region']['content_11_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_11_tColor'),
        '#description' => t('Set the Text Color for your Content 11 Region.'));
  
  $form['settings']['regions']['content_11_region']['content_11_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_11_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_11_region']['content_11_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 11 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_11_bImg'),
        '#description' => t('Set the background image of your Content 11 Region.'));

  $form['settings']['regions']['content_11_region']['content_11_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_11_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_11_region']['c11_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c11_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_11_region']['c11_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c11_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_11_region']['c11_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c11_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));

  // Content 12 region
  $form['settings']['regions']['content_12_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Content 12 Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
  
  $form['settings']['regions']['content_12_region']['content_12_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('content_12_bColor'),
        '#description' => t('Set the Background Color for your Content 12 Region.'));
  
  $form['settings']['regions']['content_12_region']['content_12_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('content_12_tColor'),
        '#description' => t('Set the Text Color for your Content 12 Region.'));
  
  $form['settings']['regions']['content_12_region']['content_12_use_bImg'] = array(
        '#type' => 'radios',
        '#title' => t('Do you want a background Image?'),
        '#options' => array('0' => t('No'), '1' => t('Yes')),
        '#default_value' => theme_get_setting('content_12_use_bImg'),
        '#description' => t('If you want to use a background image instead of a background color choose \'Yes\'.'));

  $form['settings']['regions']['content_12_region']['content_12_bImg'] = array(
        '#type' => 'select',
        '#title' => t('Content 12 Region Image Background'),
        '#options' => $background_images,
        '#default_value' => theme_get_setting('content_12_bImg'),
        '#description' => t('Set the background image of your Content 12 Region.'));

  $form['settings']['regions']['content_12_region']['content_12_wide'] = array(
        '#type' => 'radios',
        '#title' => t('Make the region wide'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('content_12_wide'),
        '#description' => t('When wide the region content will have 100% width of the window'));

  $form['settings']['regions']['content_12_region']['c12_parallax'] = array(
        '#type' => 'radios',
        '#title' => t('Parallax'),
        '#options' => array('on' => t('on'), 'off' => t('off')),
        '#default_value' => theme_get_setting('c12_parallax'),
        '#description' => t('Activate parallax effect'));

  $form['settings']['regions']['content_12_region']['c12_parallax_ratio'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the ratio for Parallax speed'),
        '#default_value' => theme_get_setting('c12_parallax_ratio'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('For better visual effect choose a value between -1 and 1. But you can set any number.'));

  $form['settings']['regions']['content_12_region']['c12_parallax_offset'] = array(
        '#type' => 'textfield',
        '#title' => t('Choose the vertical offset for the Parallax image'),
        '#default_value' => theme_get_setting('c12_parallax_offset'),
        '#size' => 5,
        '#maxlength' => 5,
        '#description' => t('If the image is not in a good position because of the Parallax speed chosen, you can move it up or down.'));
  
  // Footer Columns region
  $form['settings']['regions']['footer_columns_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Footer Columns Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['footer_columns_region']['footer_columns_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('footer_columns_bColor'),
        '#description' => t('Set the Background Color for your Footer Columns Region.'));
	
  $form['settings']['regions']['footer_columns_region']['footer_columns_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('footer_columns_tColor'),
        '#description' => t('Set the Text Color for your Footer Columns Region.'));
  
  // Footer region
  $form['settings']['regions']['footer_region'] = array(
        '#type' => 'fieldset',
        '#title' => t('Footer Region'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE);
	
  $form['settings']['regions']['footer_region']['footer_bColor'] = array(
        '#type' => 'select',
        '#title' => t('Background Color'),
        '#options' => $background_colors,
        '#default_value' => theme_get_setting('footer_bColor'),
        '#description' => t('Set the Background Color for your Footer Region.'));
	
  $form['settings']['regions']['footer_region']['footer_tColor'] = array(
        '#type' => 'select',
        '#title' => t('Text Color'),
        '#options' => $text_colors,
        '#default_value' => theme_get_setting('footer_tColor'),
        '#description' => t('Set the Text Color for your Footer Region.'));


  /************************/
  /***   Google Maps    ***/
  /************************/

  $form['settings']['google_maps'] = array(
        '#type' => 'fieldset',
        '#title' => t('Google maps'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE);
	
  $form['settings']['google_maps']['latitude'] = array(
        '#type' => 'textfield',
        '#title' => t('Latitude'),
        '#default_value' => theme_get_setting('latitude'),
        '#size' => 50,
        '#maxlength' => 50);
	
  $form['settings']['google_maps']['longitude'] = array(
        '#type' => 'textfield',
        '#title' => t('Longitude'),
        '#default_value' => theme_get_setting('longitude'),
        '#size' => 50,
        '#maxlength' => 50);
	
  $form['settings']['google_maps']['google_zoom'] = array(
        '#type' => 'select',
        '#title' => t('Google maps zoom'),
        '#options' => array('1'  => '1',  '2'  => '2',  '3'  => '3',  '4'  => '4',  '5'  => '5',
                            '6'  => '6',  '7'  => '7',  '8'  => '8',  '9'  => '9',  '10' => '10',
                            '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15',
                            '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20'),
        '#default_value' => theme_get_setting('google_zoom'),
        '#description' => t('Set the zoom for your google maps.'));
	
  $form['settings']['google_maps']['google_title'] = array(
        '#type' => 'textfield',
        '#title' => t('Google maps title'),
        '#default_value' => theme_get_setting('google_title'),
        '#size' => 50,
        '#maxlength' => 50);
	
  $form['settings']['google_maps']['google_description'] = array(
        '#type' => 'textarea',
        '#title' => t('Google maps description'),
        '#default_value' => theme_get_setting('google_description'),
        '#size' => 500,
        '#maxlength' => 500);

  /*******************************************/
  /*** Maintenance & Construction Settings ***/
  /*******************************************/

  $form['settings']['maintenance_construction'] = array(
        '#type' => 'fieldset',
        '#title' => t('Maintenance & Under Construction'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE);

  // Maintenance or Under Construction
  $form['settings']['maintenance_construction']['maintenanceOrConstruction'] = array(
        '#type' => 'radios',
        '#title' => t('Maintenance & Under Construction settings'),
        '#options' => array('maintenance' => t('Maintenance'), 'construction' => t('Under Construction')),
        '#default_value' => theme_get_setting('maintenanceOrConstruction'),
        '#description' => t('Choose if you are under maintenance or under construction.'));
	
}