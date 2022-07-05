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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ndrewkhb_WPJDJ' );

/** MySQL database username */
define( 'DB_USER', 'ndrewkhb_WPJDJ' );

/** MySQL database password */
define( 'DB_PASSWORD', 'zAWK53rrvCd0nlRlU' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '[>rU|0~xf^#n|RIt{O`1B$M6L[F[7+)NunSm>D6,7.~v@=_(Y@Ii3`=&-XglvP0B' );
define( 'SECURE_AUTH_KEY',   '&M-9I?,gVKdh:rn:@&o<{P+9<2MuVHo:K!wf5?(#[9!9t?d55OXFqO|22~!?Xi`G' );
define( 'LOGGED_IN_KEY',     '>4yrq9 sDj$Gfc9xfQ|YoQ#^x<[`wPdgD[`S+@0.kwY*nWXJs?<-=akI,Z)xkix$' );
define( 'NONCE_KEY',         'gw^+#P8c9PWyy4jR$%UzGE@o}lx*3IWE#&RX!@%3KQd(Hkx%zel,gYp1iSZ;[K9C' );
define( 'AUTH_SALT',         'vg@#.Z52H(<I..UesKnFl>l=guxJ7Kg*HzG7bJ7%EtGL8Nsj`BZdRm6BitVK1q9x' );
define( 'SECURE_AUTH_SALT',  '!tFC=_dc4iBJ4tC65g}HpxT>@VO[Lx+*7;pPF]=_m0Tyuj=OG1/* %=nu,Hr)e3:' );
define( 'LOGGED_IN_SALT',    'ueY6ZwmZ12F6Cp<<[i}4Q-hB<2`6;lF^XB[38>$>0Okq+96oqr([h3*Z,utrJwh+' );
define( 'NONCE_SALT',        'xE*Lx96|Dw:kY 7t|hDs!UL_E@:?Mj(v~>@.y{q+>jC3E[PvxRA1]+ ::NJDLv:z' );
define( 'WP_CACHE_KEY_SALT', 'XS!5z,S>Hd27<7&b_,8A[KD@>XrgUY7OH2w]/tI3+p?cKb1L:U1XzQ~aoP-L%C@j' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'staging_Zwv_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
