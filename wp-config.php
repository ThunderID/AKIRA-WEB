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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'akira');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|W| 56UA>hdO7o4I[Jvj |vT}R@Umo4c/ie-{Uc-4bGbu37hGQ`CBLA2;Sl``oG&');
define('SECURE_AUTH_KEY',  'gI}Qc,!tGbpWO4- .l>{AX_En7#Yw+^wOR^?RlMICM8Bd>Cym^sXb9_LX [zbrH[');
define('LOGGED_IN_KEY',    'zzCv.SSg?$d|B&F-gZ#y>XL!Rk4lKIL7V?x{U<;kG]sT;z^oR&;VcQ!dFf$X#OR9');
define('NONCE_KEY',        ')1#6A$q#P3BX<?&8DN++J4=$c/T(nHbsm1J9y~BN51a*nxA U}[4W>eiLl)`HOn7');
define('AUTH_SALT',        'p~&33=6u{tg7vM#SPCt?-.[v?eREFv|sR0s#<W/q0M^vjRhYw43Es*m]7>VaEWSI');
define('SECURE_AUTH_SALT', ',YQfpS+Wt$_)&B[t1<#j4S[/cxZn}t.i4SbFJFqhpk?[`K1H7Zmj3eaw$cKs&m:U');
define('LOGGED_IN_SALT',   'Gpv4ycvX)b)ev18y5#>m6bK6grv8C5=Vb+!W|H<Q5r!d -B-/6KF4{_4B#[|Mw5|');
define('NONCE_SALT',       'DF~cw^;<HdEywKG*9+Cl{^y(zHKc~3rTv&qjT}hz(mY/Yqt-]M>DK}HLj~IN]L!W');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
