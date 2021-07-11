<?php
include "connectBasa.php"; // подключамся к базе
	$id_name_table = htmlspecialchars($_POST['name_ad_hidden_menu']);
	$id_link = htmlspecialchars($_POST['name_ad_hidden_id']);


if (isset($_POST['sub_ad_save'])) {
	$name_links = htmlspecialchars($_POST['name_ad_links']);
	$name_href_links = htmlspecialchars($_POST['name_ad_href']);
	$name_links_class = htmlspecialchars($_POST['name_ad_class']);
	$name_links_id = htmlspecialchars($_POST['name_ad_id']);
	
	$urdate_table = $conn->query("UPDATE `$id_name_table` SET `name_links` = '$name_links', `href_links` = '$name_href_links', `class_links` = '$name_links_class', `id_links` = '$name_links_id' WHERE id = $id_link");

	echo '<meta http-equiv = "Refresh" content = "0; URL = admin-panel.php">';
	exit();

}

if (isset($_POST['delet_mune'])) {
	$name_menu = htmlspecialchars($_POST['hidden_name_menu']);
	$delete_file = __DIR__. '/admin/'. $name_menu. '.php'; // путь к файлу
	$delet_file_users = __DIR__. '/tamplete_menu/'. $name_menu. '.php'; // путь к файлу

	$filename = basename($delete_file, ".php"); // обрезаем все кроме названия файла
	

	$delet_table = $conn->query("DROP TABLE $filename;"); // удаляем таблицу
	if (file_exists($delete_file) and file_exists($delet_file_users)) { // проверяем существует ли файл
		unlink($delete_file); // удаляем сам файл Admin
		unlink($delet_file_users); // удаляем сам файл Users

	}
	
	echo '<meta http-equiv = "Refresh" content = "0; URL = admin-panel.php">';
	exit();

	//DROP TABLE Clients; удаление таблиц

}

	if (isset($_POST['sub_delete_links'])) {
		$delete_link = $conn->query("DELETE FROM `$id_name_table` WHERE id = $id_link");
		
		echo '<meta http-equiv = "Refresh" content = "0; URL = admin-panel.php">';
		exit();

	}

/*========================================forms text add==================================*/	
//delete text menu 

if (isset($_POST['delet_mune_text'])) {

	$name_menu_text = htmlspecialchars($_POST['hidden_name_menu_text']);
	$delete_file_text = __DIR__. '/admin_text/'. $name_menu_text. '.php'; // путь к файлу
	$delet_file_users_text = __DIR__. '/tamplete_text/'. $name_menu_text. '.php'; // путь к файлу

	$filenametext = basename($delete_file_text, ".php"); // обрезаем все кроме названия файла
	

	$delet_table_text = $conn->query("DROP TABLE $filenametext;"); // удаляем таблицу
	
	if (file_exists($delete_file_text) and file_exists($delet_file_users_text)) { // проверяем существует ли файл
		unlink($delete_file_text); // удаляем сам файл Admin
		unlink($delet_file_users_text); // удаляем сам файл Users

	}
		echo '<meta http-equiv = "Refresh" content = "0; URL = admin-panel.php">';
		exit();


}

if (isset($_POST['sub_config_text'])) {

	$Names = htmlspecialchars($_POST['hidden_tabl']);
	$ids_text = htmlspecialchars($_POST['hidden_add_id']);
	$name_box_text = htmlspecialchars($_POST['hidden_add_boxmenu']);
	$home_text = htmlspecialchars($_POST['home_text_add']);
	$text_messages = htmlspecialchars($_POST['messages_text_add']);
	
	if ($home_text === "") {
		$home_text = $name_box_text;
	}

	$urdate_text = $conn->query("UPDATE `$Names` SET `text_menu` = '$home_text', `textarea_menu` = '$text_messages'  WHERE id = $ids_text");


	echo '<meta http-equiv = "Refresh" content = "0; URL = admin-panel.php">';
	exit();
}

// валидатция userAdmin 

	if (isset($_POST['Log_in'])) {

		$Usrs_admin_name = htmlspecialchars($_POST['username_ad']);
		$Usrs_admin_Password = htmlspecialchars($_POST['Password_ad']);

		$posts = $conn->query("SELECT * FROM `users_admin` WHERE `Login` = '$Usrs_admin_name' AND `Password` = '$Usrs_admin_Password' ");
		if (mysqli_num_rows($posts) > 0) {
			echo '<meta http-equiv = "Refresh" content = "0; URL = admin-panel.php">';
			exit();
	
		}else {
			echo "<small class='small_error'>Непрваильный логин или пароль</small>";
		}
	}




?>