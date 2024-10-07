<?php
define('FS_METHOD', 'direct');

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'annoriema2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'wYj5rVShh52s' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'Lp?xx*H[Ozbhq|ONZSxC,aC@x)CH,G~Zpm3r,;W}icJZumtsl?xy&  8m,_Ji0yt' );
define( 'SECURE_AUTH_KEY',  '{?~aci;AU5|JD4O/1&(2uZH+`K9x)-xxY-nXxwh`,q6:c.r8s$COliMSo9awZ!0X' );
define( 'LOGGED_IN_KEY',    'JHE]7RuZRr_AN$q2}Lj(aLs{br.kFQOs})h8yIJj9q?]TM^|s,EnoKomQhE]=~Xw' );
define( 'NONCE_KEY',        'Dh]kJgk:vdQRLK)e 7T2X,T.b=@+JQgNuub:J<sw+r,?l`,N*]Q}l7>2@(9ZRAED' );
define( 'AUTH_SALT',        'x~[?6? !ii25QgBJ7#wE06u6Yah0V!r=!KP~7:8[v>VV~JV8~_(JxKA6W]7.FZo@' );
define( 'SECURE_AUTH_SALT', 'Bn6].1W,Hk57oOxo51LOe]<hpTx-d&lId=rt>N,$IsiR+8funBp8$XVnC?:ah@,e' );
define( 'LOGGED_IN_SALT',   'qO_cmYCP}s)#ada]4KN4/Q1,N+>Cr:5(AS%L5V.V@]3zct4S*;1dJ:+[wUc1wtj2' );
define( 'NONCE_SALT',       '-E7,CeGKj^:l]tO$&y3,)Fc4KNvOxt4N1!thN1jX>15n<s[(Fl{qat!?S.B!ri@z' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG',false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
