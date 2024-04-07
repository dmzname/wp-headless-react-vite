<?php

add_action("admin_menu", "remove_menus");
function remove_menus() {
		// remove_menu_page("index.php");                					# Консоль
    // remove_menu_page("edit-comments.php");        					# Комментарии
    // remove_menu_page("edit.php?post_type=page");  					# Страницы
    // remove_menu_page("upload.php");               					# Медиафайлы
    // remove_menu_page("themes.php");               					# Внешний вид
    // remove_menu_page("plugins.php");              					# Плагины
    // remove_menu_page("users.php");                					# Пользователи
    // remove_menu_page("tools.php");                					# Инструменты
		// remove_menu_page("edit.php?post_type=acf-field-group"); # ACF
		// remove_menu_page( 'wpcf7' );														# Contact Form 7
		// remove_menu_page('cptui_main_menu');										# CPT UI
    // remove_menu_page("options-general.php");      					# Параметры
}