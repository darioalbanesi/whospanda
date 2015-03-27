<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es auf der {@link http://codex.wordpress.org/Editing_wp-config.php
 * wp-config.php editieren} Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt, wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'whospandawp');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'whospandawp');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', 'pupoKundePac');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'localhost');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase. 
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service} kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define('AUTH_KEY',         ' yQ %)p5CtnM=z343Z;iG--^.xb&OPpoP~{ac_p0@U!wHhD|E6+mx|zbC+q_1YmP');
define('SECURE_AUTH_KEY',  'I~._]?)*-npHCO3+#(a&I.{7GvFL%SOfC-gfZLr4bnH5f8Jl0$9sdii5sIcuHH--');
define('LOGGED_IN_KEY',    '5RPL?|)b%jfF~4k/uhj^&~)o}VuyQkPAc+J] dZh{RW=4^-@XA+vda9h@Z$/b6D+');
define('NONCE_KEY',        '@yfb^[/.~81?1AtDuewF}Jh<>5=@nB85.(3FQiYFqR[Y1Yc rk8C<,*H=c2L4^FA');
define('AUTH_SALT',        '*Qa)c4|pi:*@Rrm9FD`2}|-[SEf>0^u_2V$tTV]g!#-h.J{iz:sr*$9z}]0vuxyA');
define('SECURE_AUTH_SALT', 'F)g0+J^ fq``O~%=1V4w1H8hY-vQpq?bb+4T6rK-m~2Q;j,& <~AuL1bf1HPyndP');
define('LOGGED_IN_SALT',   'yk$LiR6||vi%5|jsgR%46nSHgj*k|Q7yiSPn8r~C?zf;-x+cPZOq?Tk4EiGS@5%!');
define('NONCE_SALT',       '5+)UUne?/|*cf$?y)<`_1[oq#6%dKsjWPa0MP::+x]Mhi0B?xiG-b^q?m/E}F`YI');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 *  Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 *  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Sprachdatei
 *
 * Hier kannst du einstellen, welche Sprachdatei benutzt werden soll. Die entsprechende
 * Sprachdatei muss im Ordner wp-content/languages vorhanden sein, beispielsweise de_DE.mo
 * Wenn du nichts einträgst, wird Englisch genommen.
 */
define('WPLANG', 'de_DE');

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