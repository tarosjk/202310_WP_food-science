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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'food_science');

/** Database username */
define('DB_USER', 'food_science');

/** Database password */
define('DB_PASSWORD', '3lt3j9VmznysR8xO');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '=AsyavD4-_{I*R_>3n#+8Slj,&<[nLGA(26mjD<1^{)}b#5(qTeMI$@])yr3aA+W');
define('SECURE_AUTH_KEY',  '!^L9A8j*1BRgT#gj6}E+1(qem**]Im`0-h#$CZcR=]5%@lMS&TAO9>_N>k9UC[WS');
define('LOGGED_IN_KEY',    'Wj[uKZ?z{2@yXUoG=}?HAP=I:hvA&cNNl[Y}9zSeH[&#-Z~05a,hav8m~UECLB%;');
define('NONCE_KEY',        '6 &$QrCrj]guAs/[</(S4^X`Pan$Q/U}~IZn9?@G_4^D?knacw]Y~Tt MF;yE{f3');
define('AUTH_SALT',        'hpr#G<_]y2*t[6lJwWiwfTDx,b-NYJk4EzX?4hbDa UM}{-Ww1S>@GQk|Z]+op3g');
define('SECURE_AUTH_SALT', 'l;WL*;~U`9}&+8U3#H9k!Fep0}*nVxH8{n*#S#Fw4d96>rC/<^VPUC~^* #GADfk');
define('LOGGED_IN_SALT',   'PcCb%x$kxVYA<BE,VRijfLX2WenKiQwXt)#9*pyz+.Hj3yl0x!3t;pjRx-L86TX`');
define('NONCE_SALT',       '56+=(Zhe~^$mJIER>,:+:31yAvalQ4qEm5a<x1Kd]Q1.4P2#JE^2=6,CN?_OnLpH');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'food_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
