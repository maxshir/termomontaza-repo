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
define('DB_NAME', 'termo_db');

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
define('AUTH_KEY',         'a`eoau.7ri-z1x0:n*@rdxG7M[]gI*3!>Nh4I$uEc;kMS;ZZ<9OaWi+kPfb3<rD@');
define('SECURE_AUTH_KEY',  'g@*C+`<5I@wFCe5dHi3XN|%vpBV1Tu|kW_F:k]3s%WW;tnwVk=Y;`u E.Lacx1y%');
define('LOGGED_IN_KEY',    '2mug,^bq|s1:(da729By&hzMfI61;7bx0Q${t-qqEVe;Vl|k:h{P> sQ1Yb+c|du');
define('NONCE_KEY',        ';{<vkktelOSzg!w3f~8{u}bwCp&qV!O4Mqw2-T+cpo5t!M*$o}~)o+*u<cDD/2P.');
define('AUTH_SALT',        'x)2R8CSi[+xPI<@zQM{c@`;s5QI*6O;v`d2q>w%I9!Z$=,UYL9gq! s>vz!-UC.q');
define('SECURE_AUTH_SALT', 'p|,A=J)wV0s.;{70A{r3(0TE^tnwmhpZhLI &oW2=}*cRlDXQ2B=];@:GhkIS`SU');
define('LOGGED_IN_SALT',   'xhM47{e7eVu{[| z)Jv;J7u @]*f(aQX.^_]A/2^S*zMDI.;$0^d3#B1T}9%C}NW');
define('NONCE_SALT',       '! g.DE3k6!{KHGVrnW`SIlwMdQVQTEYY~74wqv]$b~|pg`l&eEZv<[~PEAP>1iDW');

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
