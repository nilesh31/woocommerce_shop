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
define('DB_NAME', 'wc_shop');

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
define('AUTH_KEY',         'cB&NsuMk#8|MR*FhM;JZH{I,gBJ4V#hNG;P]?fEwJNGW?](M#[G>xAE2mpP?6~6G');
define('SECURE_AUTH_KEY',  'DEr[tar4v08WYJoP-YrqCemsQUlfdVQ=E)wi^7@$Pgd;jM%B{*P9evPhz>Mnu]7K');
define('LOGGED_IN_KEY',    'K5R?|`BTG$gNB:]%bVJSx!H-t+vFjYyu#}MaU4~~yB?pd<f5bh5E?5:/4JL4cCct');
define('NONCE_KEY',        'HW9;(Q!w;62=ey2%EMu#pL5o}2`w^w8i$dBnD)Yz+L1hI41{e/x84UG;-ySZHa%Z');
define('AUTH_SALT',        '$_b+oyr5[IO6)3E#I(< WAW?H25WTWd;fhf_/GW19~Of2`YM(T8rs=Ha)xAhpwDu');
define('SECURE_AUTH_SALT', '{Zp;pc45sk5O9%Jbv,K*A8c&FATTBnOq=:YQH|q^!O0I%d(vKr?wY8WgtZi1&&(w');
define('LOGGED_IN_SALT',   'qmO7t2,)0r)t .!i~IdhDsCj?`+AZ[E6E80yG<biX/_u>TWj1GuMzbD{DY*VX8G-');
define('NONCE_SALT',       ']n)i%DmVb6(N]-T~#4btVV_F-/?U5@]65agw[m$@;3.WVbpg*vzq7]fX1sTP=$y1');

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
