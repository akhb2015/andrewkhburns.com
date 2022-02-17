<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// Define Environments
$environments = array(
    'development' => 'andrewkhburns.com',
    'stage' => 'stage.andrewkhburns.com',
    'production' => 'prod.andrewkhburns.com'
);

$server_name = $_SERVER['HTTP_HOST'];

//Define our current environment
foreach( $environments as $key => $env ) {
    if( strstr( $server_name, $env ) ) {
        define( 'ENVIRONMENT', $key );
        break;
    }
}

// If no environment is set default to production
if( !defined( 'ENVIRONMENT' ) ) define( 'ENVIRONMENT', 'development' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
switch( ENVIRONMENT ) {
 
    case 'development':

    	define( 'DB_NAME', 'akhb' );
		define( 'DB_USER', 'admin' );
		define( 'DB_PASSWORD', 'Mud$hark1968!' );
		define( 'DB_HOST', 'database-1.cycbf9hqesz9.us-west-2.rds.amazonaws.com' );
        define( 'WP_SITEURL', 'https://www.andrewkhburns.com' );
        define( 'WP_HOME', 'https://www.andrewkhburns.com/' );
        define( 'WP_DEBUG', TRUE );
        define( 'WP_CACHE', FALSE );
        break;

    case 'stage':

        define( 'DB_NAME', 'DBNAME' );
        define( 'DB_USER', 'DBUSER' );
        define( 'DB_PASSWORD', 'PASSWORD' );
        define( 'DB_HOST', '127.0.0.1' );
        define( 'WP_SITEURL', 'https://stage.andrewkhburns.com' );
		define( 'WP_HOME', 'https://stage.andrewkhburns.com/' );
		define( 'WP_DEBUG', TRUE );
		define( 'WP_CACHE', TRUE );
        break;
 
    case 'production':
 
        define( 'DB_NAME', 'DBNAME' );
        define( 'DB_USER', 'DBUSER' );
        define( 'DB_PASSWORD', 'PASSWORD' );
        define( 'DB_HOST', '127.0.0.1' );
        define( 'WP_SITEURL', 'https://prod.andrewkhburns.com' );
		define( 'WP_HOME', 'https://prod.andrewkhburns.com/' );
        define( 'WP_DEBUG', FALSE );
        define( 'WP_CACHE', TRUE );
        break;
}

// Default: If server isn't defined
// Put the details for your production server here.
/*
if(!defined('DB_NAME'))define('DB_NAME', 'DBNAME');
if(!defined('DB_USER')) define('DB_USER', 'DBUSER');
if(!defined('DB_PASSWORD')) define('DB_PASSWORD', 'PASSWORD');
if(!defined('DB_HOST')) define('DB_HOST', '127.0.0.1');
if(!defined('DB_HOST_SLAVE')) define('DB_HOST_SLAVE', '127.0.0.1');
if(!defined('DB_CHARSET')) define('DB_CHARSET', 'utf8');
if(!defined('DB_COLLATE')) define('DB_COLLATE', 'utf8_unicode_ci');
if(!defined('WP_SITEURL')) define('WP_SITEURL', 'http://mysite.com/');
if(!defined('WP_HOME')) define('WP_HOME', 'http://mysite.com/');
if(!defined('WP_DEBUG')) define('WP_DEBUG', false);
if(!defined('WP_CACHE')) define('WP_CACHE', TRUE);
*/


/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~*94dzvIn^G3A4:9Oo-zoK_eca9j!+E/3km!+;s[i-l`0o*9#::FfO6y^~Y1!HE#');
define('SECURE_AUTH_KEY',  'J8>oTc>r|6+!@e&xtMS~Xd/s-PYGTI0>j:|I~2/krkrt-&U$u.P)Mentk:6VMBX9');
define('LOGGED_IN_KEY',    'WK;t=i4w!14((DP/=P(,gikWo>L9g+_tV_1wD;A9!+D:AihX+*+Cz>d`%/x[DPG7');
define('NONCE_KEY',        'q^a8-SSnmYQ&A6Zdp7|a?6*<Z/I[mUsMUg=JiZo-6 m+Ycs@fUXB`Tci0Z:yN^8t');
define('AUTH_SALT',        '7F=8_Xalq6!>C29]Sv4f$VZ`qN(WR(c{a?}1+)|Yw)6Q<smKS>W05!n_@6Fa6aTi');
define('SECURE_AUTH_SALT', '-Pg[KukAIbJ#wZ>+Tz*<<PV0+e%Od`_~Y}CVzA@L*f0ga/~!;;Q4%.Bq8$5t~i{]');
define('LOGGED_IN_SALT',   '^27Rc]+}[R32r!Cl;3+ToL#b/LiKK?thvQ%m{r)]]]O[%lsB^jcrlP@LL C]d+#:');
define('NONCE_SALT',       'MpPJxM<;*6PdUiF8kHGj`X})1f?qQ3omjXE5vB~-f`|vj$R@p`%4Q-Sg[sn:$}~(');


//YouTube API key
define('YOUTUBE_API_KEY', 'AIzaSyBC3dwFcKdIPAZipC-o1_q_X0fpFgmDahk');

//AWS SES creds
define('SES_USERNAME', 'AKIATROF6K4NE6Y2D2PI');
define('SES_PASSWORD', 'BBXSNj1Em6VVDKZliHDPcqEgwd/6+9d0210ACUZiWC0W');

//Cuttly API key
define('CUTTLY_API_KEY', 'bae03ca5b167c33313d01b522327d8adfa6ed');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
//define( 'WP_DEBUG', true );

/** Set FS_METHOD to direct so updates work */
define( 'FS_METHOD', 'direct' );

/** Limit the number of post revisions to 2 */
define( 'WP_POST_REVISIONS', 2 );

/** Disable the file editor */
define( 'DISALLOW_FILE_EDIT', true );

/** Clean up image edits */
define( 'IMAGE_EDIT_OVERWRITE', true );

/** Turn off the WP core auto updater */
define( 'WP_AUTO_UPDATE_CORE', false );

/** S3 Keys */
/*
define( 'AS3CF_SETTINGS', serialize( array(
	'provider'          => $eb_settings['AS3CF_PROVIDER'],
	'access-key-id'     => $eb_settings['AS3CF_ACCESS_KEY_ID'],
	'secret-access-key' => $eb_settings['AS3CF_SECRET_ACCESS_KEY']
) ) );
*/

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
