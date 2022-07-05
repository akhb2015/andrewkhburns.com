<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ndrewkhb_WPJDJ');

/** Database username */
define('DB_USER', 'ndrewkhb_WPJDJ');

/** Database password */
define('DB_PASSWORD', 'zAWK53rrvCd0nlRlU');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


define('WP_SITEURL',       'http://localhost:8888/andrewkhburns.com');
define('WP_HOME',          'http://localhost:8888/andrewkhburns.com');
define('WP_CONTENT_URL',   'http://localhost:8888/andrewkhburns.com/wp-content');


/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '0a22ecdeff67f55957a827a90f70bb700957b5e229b451943e43a988a59ca225');
define('SECURE_AUTH_KEY', 'fcec033880fbcab276ae26c3da3ca9acb7c5e591debb6e0812e65af79c3c2ce1');
define('LOGGED_IN_KEY', 'd52d10f8f80b598caa050e977bc32007fcceb34021136d902cd9e39d776a9980');
define('NONCE_KEY', 'ac82a9e30f800f15bcc0f0b42237b739da7f4dbec3a4fe67a5bb51fe3988e4f1');
define('AUTH_SALT', '380e4c769bed468000fd89ff994398397587004c6fe356f14ca1b3d971eb381f');
define('SECURE_AUTH_SALT', 'b799e38d8e23e2a096d4af087d5559c2637c1a6ebbe1bc8ceebac9ffd4861662');
define('LOGGED_IN_SALT', '5ebeccd9d490069924b54d6e7403586888abbe34cb4f3c11a4e412a9f92446c9');
define('NONCE_SALT', '8f1e2055f254694fa2e8de58d90be8d22ab0b5171bf93029aa94434ce21a86aa');

/**#@-*/

//YouTube API key
define('YOUTUBE_API_KEY', 'AIzaSyBC3dwFcKdIPAZipC-o1_q_X0fpFgmDahk');

define('WP_ALLOW_MULTISITE', true);


/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Zwv_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
