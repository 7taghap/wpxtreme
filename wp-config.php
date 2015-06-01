<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'tfldI:G?A(dh-9Nu6RtOHUB&BYmY)e.iUv)w %9TOUHxIkB0FZy-iEG`aPY,qN~R');
define('SECURE_AUTH_KEY',  '[2$hO7E(`l*H-hK_!;N9aqwe)+hyF=dFA1A!$!*NucCZ0:QN2]`!u*o;8A^Jc6-n');
define('LOGGED_IN_KEY',    '#8,fTz%*>rVyd0tq+fO;r9;*Vcv:G5v*Tb8k#gp*2YtESjB6z^d-h*ebIm]->Wi!');
define('NONCE_KEY',        '%|mK;~YnpIA7nmzdDj9Tg~,oDE+yQmni(|B@!Jwp(*>gRd-pgh3]UB-ZON[]oLK|');
define('AUTH_SALT',        '$aqt67&:sFI-I8+lxJt&)__VWTmXhd92iuSjdvhNBli!J:U e#iE<r(wL[6Uy-?D');
define('SECURE_AUTH_SALT', '[qLWz<qZQ;fO$]dV?,Q2(SD2E:Z`T<Hr$1cn)u~]UJ1ccUJ!Ec=rf23ngeV}Cc9>');
define('LOGGED_IN_SALT',   ' tk+2J;FlLtkpr2yYeetPhm=aONZFt]s#x`A@V -Yx8N<Ik`n_#|!Z{qBw+%:w?2');
define('NONCE_SALT',       '+-O5)6Q[sl.~XghT>4P=Q6Z5`rVw|+<oqc|!~TV+O_Z}|w=WTB2sd2&Moe2(|s]|');

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
