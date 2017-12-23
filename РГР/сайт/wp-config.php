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
define('DB_NAME', 'top_secret');

/** MySQL database username */
define('DB_USER', 'top_secret');

/** MySQL database password */
define('DB_PASSWORD', 'top_secret');

/** MySQL hostname - this is not top secret. You can use*/
define('DB_HOST', 'mysql.zzz.com.ua');

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
define('AUTH_KEY',         'OqO*lQK<1y3t?q=PAM#:+hHA/riAFl}dd6 L6wd9@]O6~M#VGW6MK(8TY3(n|^V1');
define('SECURE_AUTH_KEY',  '2x|]?g(I?l{wyM5)d l&SFzn#>4anb2rw<~c69mJ/ H}Lci;@YBA+S-QGemppsd%');
define('LOGGED_IN_KEY',    'LgEx{QK*H7`c6jR,MS4<QM8b v7cC]m8+:Dy[v(ZGRQ HEU&nHO2^4`Bo;cTK&Ki');
define('NONCE_KEY',        'ezi;O8@uOQ](|V7fKIxe+P!Q48_av[d7qX2Ta3J~HClmdeWXk~R74o|my:Mr5,}c');
define('AUTH_SALT',        'ESM&QIsTG:tA~+*}0J0lf:mOH{$R<>eH0sC1zwqZhK Jp=Z}V]1v3Y}Y+[3WNg_J');
define('SECURE_AUTH_SALT', 'N4Ea+ngaR6xJ%LRFQOFVYtjW7WYrp_!8DK%%Q!iv3GT0rFn,LWuOre f)5_tPaL:');
define('LOGGED_IN_SALT',   'xS$EJ!52d.32%oj#4u@kz7;j>4l=mt$vJ=&lYfVLIzTgVmb@^C|;Cd,eW<r;ug9m');
define('NONCE_SALT',       '1<j?e4ydhz)rQED,5*vh(EjB R$NOX_M56y8jiWpZ?xt6Z90N&= Y72ck:-ES(TR');

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
