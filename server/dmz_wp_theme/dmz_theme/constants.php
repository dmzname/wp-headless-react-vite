<?php

/****************************************************************
 * Define Constants
 ****************************************************************/

if ( ! defined( 'DMZ_THEME_VERSION' ) ) {
	define( 'DMZ_THEME_VERSION', '1.0.0' );
}

/****************************************************************
 * System Functions
 ****************************************************************/

require_once ( DMZ_THEME_DIR . '/etc/default.php' );
require_once ( DMZ_THEME_DIR . '/etc/front.php' );
require_once ( DMZ_THEME_DIR . '/functions/general.php' );
require_once ( DMZ_THEME_DIR . '/config.php' );
require_once ( DMZ_THEME_DIR . '/api/create_user.php' );
