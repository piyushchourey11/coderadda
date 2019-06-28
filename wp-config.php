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
define('DB_NAME', 'coderadda');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '?Ut8t,(XkBor%(?rIHUhL}wXVcCCv8L;FP-x9~;g[(w{XHOvOXTgkx[_0%0e%jWt');
define('SECURE_AUTH_KEY',  'n4uXSu~X@^bVDAEaof#GON7IB~%5(U]DD?HN_qkgybEWRJu:l7DZ;yo eOPAGd[v');
define('LOGGED_IN_KEY',    'Th]MxoZCuwcWe.aS>Wl.$l,V6~>@3X?tkGzB[:m=FWC TKKT|s)q*:5ciI6:a]k1');
define('NONCE_KEY',        'uJD `p<(a$g{BWBNv=x0K3aeQ=Ow8WtmE9TRy>yYf$tp5?_|<UNTE$!wd[tauW~2');
define('AUTH_SALT',        '$]Z:7X8Ds|V+T$I<N`a7$`MOZ2)4SP5f8[;uR!L4FZ|(0Ao&2dP~`nl|4|y(Itnr');
define('SECURE_AUTH_SALT', '&0Wj.QSJQhvQ4:a$y6A.A#9_#[FGJJGX/Wk:h]jJhlp%qXdb U9+ m[p.mC4-zKj');
define('LOGGED_IN_SALT',   '!7<OG;@6F!+|^&s6k %sUX0-~d$aL{*R=G@v?nm.3/id9<;r`!sSX(f9uSI4~rI%');
define('NONCE_SALT',       'eW6Z?KSs7m#wy>rcClOKOc,buJ2wQaW{mPgs,>oe_?-]`AZY5y +csw+IJRT@^D0');

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
