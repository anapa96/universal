<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'universal' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'universal_admin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'ZFyApzBbfkkqhF3B' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'siZe]=cb^eA6_c0MLL|gwJ{o?(&N~gwk#BxErPme^=Z0%z)*#59Og)p(};3a:,L1' );
define( 'SECURE_AUTH_KEY',  'cDQAp+K&9Gw;qjVBZC$^F;>|}4u1,`jMokY,P:zy5II{G|<F ?B,n]Kd&*1?Fu+4' );
define( 'LOGGED_IN_KEY',    'ciJ}Gm-N!>NnqP axJ1A274i?#M5|y_nq:@*V?(r7}jrTv*,&R;kz#sI#k[KO=kD' );
define( 'NONCE_KEY',        '2e.xTTfUzi9MJS7_K5?18B1UmD#Q{-[}EF2~`u{4Jra?*,9*>(L5sr&dPg<{mUJM' );
define( 'AUTH_SALT',        '2{#xleH4g&cS4<=,q>Fn0)#H PvZ*j|p<F8oJK^XkT:*yllt; Am`F>gGE@.jU8T' );
define( 'SECURE_AUTH_SALT', '?Lp*vV3oUHY4cUzcb5e,-OWA$GipTQ]Og`$wwF.TF?pR?0Ezo>8A)ND*Cs0lx9/y' );
define( 'LOGGED_IN_SALT',   'r^~VZ[F 53t6N@:?G=xOL,m@Ah~oLNK$=K]@Vvf.6kB/mC~=#J3?1Nf*HXwITDtN' );
define( 'NONCE_SALT',       '`g$Ww`D=>EfEG09cp^5vn>q~Vj4j:s9.la9pifA6`yz;<VLXulHgweNp<]=fikFE' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'universal_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
