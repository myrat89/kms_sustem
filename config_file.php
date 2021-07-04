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

	echo '<meta http-equiv = "Refresh" content = "0; URL = index.php">';
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
	
	echo '<meta http-equiv = "Refresh" content = "0; URL = index.php">';
	exit();

	//DROP TABLE Clients; удаление таблиц

}

	if (isset($_POST['sub_delete_links'])) {
		$delete_link = $conn->query("DELETE FROM `$id_name_table` WHERE id = $id_link");
		
		echo '<meta http-equiv = "Refresh" content = "0; URL = index.php">';
		exit();

	}

	






?>