<?php
include "connectBasa.php"; // подключамся к базе


if (isset($_POST['sub_ad_save'])) {
	$id_name_table = htmlspecialchars($_POST['name_ad_hidden_menu']);
	$id_link = htmlspecialchars($_POST['name_ad_hidden_id']);
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
	

	$filename = basename($delete_file, ".php"); // обрезаем все кроме названия файла
	

	$delet_table = $conn->query("DROP TABLE $filename;"); // удаляем таблицу
	if (file_exists($delete_file)) { // проверяем существует ли файл
		unlink($delete_file); // удаляем сам файл

	}
	
	echo '<meta http-equiv = "Refresh" content = "0; URL = index.php">';
	exit();

	//DROP TABLE Clients; удаление таблиц

}



	






?>