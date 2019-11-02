<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: 
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "fusion";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     // * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     // * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'fusion Theme Options', 'fusion' ),
        'page_title'           => __( 'fusion Theme Options', 'fusion' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

  
  

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>This is made by Kamal Hossain Mamurjor member</p>', 'fusion' ), $v );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */




    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */



    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'fusion Theme Option', 'fusion' ),
        'id'               => 'basic',
        'desc'             => __( 'These are really basic fields!', 'fusion' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Layout', 'fusion' ),
        'id'               => 'layoutttt',
        'subsection'       => true,
        'desc'             => __( 'Layout Setting ', 'fusion' ),
        'fields'           => array(
           
            array(
                'id'       => 'sitelayoutttt',
                'type'     => 'radio',
                'title'    => __( 'website Layout', 'fusion' ),
                'subtitle' => __( 'Input your website Layout', 'fusion' ),
                'desc'     => __( 'This for website Layout .', 'fusion' ),
                'options'   =>array(
                        '100%'  =>'Full Width',
                        '80%'  =>'Boxed'
                ),
                'default'  => '1'// 1 = on | 0 = off
            ),
        )
        ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Theme Background Color', 'fusion' ),
        'id'         => 'bg',
        'desc'       => __( 'Upload your site Logo', 'fusion' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'bg',
                'type'     => 'background',
                'title'    => __( 'Choose Theme background Color', 'fusion' ),
                'subtitle' => __( 'Choose site background Color', 'fusion' ),
                'desc'     => __( 'Choose site background Color', 'fusion' ),
                'default'  => '#fcadac'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Theme Logo', 'fusion' ),
        'id'         => 'themelogo',
        'desc'       => __( 'Upload your site Logo', 'fusion' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => __( 'Upload your Site Logo', 'fusion' ),
                'subtitle' => __( 'Choose your site logo', 'fusion' ),
                'desc'     => __( 'Choose site Logo', 'fusion' ),
            ),
        )
    ) );


      Redux::setSection( $opt_name, array(
        'title'      => __( 'fusion Footer Option', 'fusion' ),
        'id'         => 'footer',
        'desc'       => __( 'Footer section style Change', 'fusion' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'footerbg',
                'type'     => 'color',
                'title'    => __( 'Footer background Color', 'fusion' ),
                'subtitle' => __( 'Choose Footer background Color', 'fusion' ),
                'desc'     => __( 'Choose Footer background Color', 'fusion' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'       => 'ftfontclr',
                'type'     => 'color',
                'title'    => __( 'Choose Footer Sectin Text Color', 'fusion' ),
                'subtitle' => __( 'Choose Footer Text Color', 'fusion' ),
                'desc'     => __( 'Choose Footer Text Color', 'fusion' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'          => 'ftfontstyle',
                'type'        => 'typography', 
                'title'       => __('Footer Text font size/color/font-weight/font-family', 'fusion'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('h2.site-description'),
                'units'       =>'px',
                'subtitle'    => __('Choose Footer Text Color Size Font family font weight', 'fusion'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '700', 
                    'font-family' => 'Abel', 
                    'google'      => true,
                    'font-size'   => '33px', 
                    'line-height' => '40'
                ),
            )
        )
    ) );
      
        Redux::setSection( $opt_name, array(
        'title'      => __( 'fusion Footer Copy Right Option', 'fusion' ),
        'id'         => 'footercr',
        'desc'       => __( 'Footer Copy Right section style Change', 'fusion' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'year',
                'type'     => 'text',
                'title'    => __( 'Copy right year', 'fusion' ),
                'subtitle' => __( 'This is footer copyright year', 'fusion' ),
                'desc'     => __( 'Give your  footer copyright year', 'fusion' ),
                'default'  => '2019'// 1 = on | 0 = off
            ),
              array(
                'id'       => 'comlink',
                'type'     => 'text',
                'title'    => __( 'Theme develop company name', 'fusion' ),
                'subtitle' => __( 'This is footer Theme develop company name', 'fusion' ),
                'desc'     => __( 'Give your Theme develop company name', 'fusion' ),
                'default'  => 'Anasteck.com'// 1 = on | 0 = off
            ),
             array(
                'id'       => 'comlinkurl',
                'type'     => 'text',
                'title'    => __( 'Theme develop company name Link', 'fusion' ),
                'subtitle' => __( 'Theme develop company name link', 'fusion' ),
                'desc'     => __( 'Give your required Theme develop company name link', 'fusion' ),
                'default'  => 'https://anasbinkml-it.com'// 1 = on | 0 = off
            ), 
             array(
                'id'       => 'cprreserved',
                'type'     => 'text',
                'title'    => __( 'Copy rigth reserved', 'fusion' ),
                'subtitle' => __( 'This is footer Copy rigth reserved', 'fusion' ),
                'desc'     => __( 'Give your Copy rigth reserved', 'fusion' ),
                'default'  => 'kamal Hossen'// 1 = on | 0 = off
            ),
             array(
                'id'       => 'crftbg',
                'type'     => 'color',
                'title'    => __( 'Footer Copy Right Section background Color', 'fusion' ),
                'subtitle' => __( 'Choose Footer Copy Right Section background Color', 'fusion' ),
                'desc'     => __( 'Choose Footer Copy Right Section background Color', 'fusion' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'       => 'crfontclr',
                'type'     => 'color',
                'title'    => __( 'Choose Footer Copy Right Section Text Color', 'fusion' ),
                'subtitle' => __( 'Choose Footer Copy Right Section Text Color', 'fusion' ),
                'desc'     => __( 'Choose Footer Copy Right Section Text Color', 'fusion' ),
                'default'  => '#fcadac'
            ),
              array(
                'id'       => 'crlinkclr',
                'type'     => 'color',
                'title'    => __( 'Choose Footer Copy Right Section Link Color', 'fusion' ),
                'subtitle' => __( 'Choose Footer Copy Right Section Link Color', 'fusion' ),
                'desc'     => __( 'Choose Footer Copy Right Section Link Color', 'fusion' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'          => 'crfontstyle',
                'type'        => 'typography', 
                'title'       => __('Footer Copy Right Section Text font size/color/font-weight/font-family', 'fusion'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('h2.site-description'),
                'units'       =>'px',
                'subtitle'    => __('Choose Footer Copy Right Section Text Color Size Font family font weight', 'fusion'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '700', 
                    'font-family' => 'Abel', 
                    'google'      => true,
                    'font-size'   => '33px', 
                    'line-height' => '40'
                ),
            )

        )
    ) );
        








