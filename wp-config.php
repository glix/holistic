<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'nPl905skMIXFl>QSVRS/8OqI,J1L,dYX>.V8)27Ax#%JC>`1n_BW)f>|=0Ikvp}=');
define('SECURE_AUTH_KEY',  '3h!>WuLH+qZU]O.2XDp_!SQGkq]|tJLqcD4dXVzZ`|nk y({}k1?.bJ@4S=#:NF#');
define('LOGGED_IN_KEY',    '7AQ52?Q}2vD9Fu5dr7Ojm-R%L|VAX~i{>O& Q/7SP>F%5eSK~O`I$DT/l(~+A(?E');
define('NONCE_KEY',        '.;?|e+o,f|(N)cT+dxY6y!I|:>{J[8*l-D,LE-i02xuPyUl-}*wPI/-?O$V=WIA5');
define('AUTH_SALT',        '1#Pcv+sj{l- )+iPqdaMSbSYZsQe-Y |CCQx+a(5 nV>(<x,<q~F<qTiO#W.Lj{D');
define('SECURE_AUTH_SALT', 'Q@2G&gG+8L[w) IE%_Y/TxS[83c?b_J14PmA1;A[x:/[ejq_%@6|fG/7UXWD`Wgt');
define('LOGGED_IN_SALT',   'sd?K,wk[1n@vidm1 ?vSAPXe-C/BnGW*Hv,-@q9Rt{6oe1|2;R|pd!UlR3%AZ,#-');
define('NONCE_SALT',       '(|^ sh5BP#jp;&n(i!bD]ScXK=Ena&qr_sY-SEkgl,YJA?{im@@l`V2`X .:%[:F');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
