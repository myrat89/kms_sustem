<?php
include "connectBasa.php";

if (isset($_POST['add_sumbit'])) {

	$menu_name = $_POST['name_menu'];
	$links_name = $_POST['name_links'];
	$links_href = $_POST['name_href'];
	$links_class = $_POST['name_class'];
	$links_id = $_POST['name_id'];
	$links_select_menu = $_POST['name_value_select'];

	if ($links_class === "") {
		$links_class = "mk-class";
	}
	if ($links_id === "") {
		$links_id = "mk-id";
	}

	$sql = "CREATE TABLE $menu_name (id INTEGER AUTO_INCREMENT PRIMARY KEY, name_links VARCHAR(100), href_links VARCHAR(100), class_links VARCHAR(100), id_links VARCHAR(100) )";
	if($conn->query($sql)){
    echo "Таблица". $menu_name. "успешно создана";
} else{

}

	
	$table = "INSERT INTO `$menu_name`(`name_links`, `href_links`, `class_links`, `id_links`) VALUES ('$links_name', '$links_href', '$links_class', '$links_id')";
	if (mysqli_query($conn, $table)) { // проверяем все ли правильно добавилось

	} else {
	    echo "Error: " . $table . "<br>" . mysqli_error($conn);
	
	}




	$files_links = fopen('tamplete_menu/'. $menu_name.'.php', 'w+');
	fwrite($files_links, '
		<link href="style_links.css" rel="stylesheet">	<!-- если у вас в верстке свои стили то просто удалите эту сторку -->
		
		<?php 
	
			include "../connectBasa.php";

			$filname = basename(__FILE__, ".php");
			$read = $conn->query("SELECT * FROM `$filname`");
			
			echo "<div class=your_class_div>";
			echo "<ul class=ul_your_class>";

			foreach ($read as $key => $value) {
				
				$name = $value["name_links"];
				$namehref = $value["href_links"];
				$classn = $value["class_links"];
				$id_links = $value["id_links"];
				
						// сдесь ваша html разметка страницы пропешите сдесь так же свои классы и id тегам за тем 
						// подгоняйте ваши стили

				echo "
						<li class=your_li_class><a href=$namehref class=$classn id=id_links>$name</a></li>


						";
						
					}
			echo "</ul>";		
			echo "</div>";		

		?>


		');	
	fclose($files_links);		
	
		$fil_admin = fopen('admin/'. $menu_name.'.php', 'w+');
		fwrite($fil_admin, '
		
		<?php
			
			$fil_name_admin = basename(__FILE__, ".php");
			$read_fil_admin = $conn->query("SELECT * FROM `$fil_name_admin`");
			
			echo "<div class=box_div_create_menu>"; 
			
			echo "
			<form action=config_file.php method=post id=form_delete>
			<input type=hidden name=hidden_name_menu value=$fil_name_admin>
			<p class=text_mune_admin>$fil_name_admin<input type=submit name=delet_mune class=delet_class_submit title=Удалить value= ></p>

			</form>
			";
			
			
			foreach ($read_fil_admin as $key_admin) {
				$id_ad = $key_admin["id"];
				$name_ad = $key_admin["name_links"];
				$namehref_ad = $key_admin["href_links"];
				$classn_ad = $key_admin["class_links"];
				$id_links_ad = $key_admin["id_links"];


			

			echo "
				<div class=box_admin_links style=height:30px;>					
				<p class=name_te_ad_links>$name_ad</p>
					<form action=config_file.php method=post id=form_$fil_name_admin>
						<input type=submit name=sub_delete_links value=Удалить class=inp_delet_links>
						<input type=hidden name=name_ad_hidden_id value=$id_ad>
						<input type=hidden name=name_ad_hidden_menu value=$fil_name_admin>
						<p class=text_info>Имя сылки</p>
						<input type=text name=name_ad_links value=$name_ad class=inp_ad>
						<p class=text_info>Путь сылки</p>
						<input type=text name=name_ad_href value=$namehref_ad class=inp_ad>
						<p class=text_info>class</p>
						<input type=text name=name_ad_class value=$classn_ad class=inp_ad>
						<p class=text_info>id</p>
						<input type=text name=name_ad_id value=$id_links_ad class=inp_ad>
						<input type=submit name=sub_ad_save value=Сохранить class=inp_ad_submit>

					</form>
				</div>


				";

			}

			echo "</div>";
		
		?>
			'); // конец записи файла

		fclose($fil_admin);

$conn->close();	

	echo '<meta http-equiv = "Refresh" content = "0; URL = admin-panel.php">';
	exit();
}
// add text panel two 

if (isset($_POST['submit_add_text'])) {
	$box_name_menu = htmlspecialchars($_POST['_name_text_home']);
	$box_name_text = htmlspecialchars($_POST['text_home']);
	$box_name_textarea = htmlspecialchars($_POST['textarea_add_text']);
		if ($box_name_text === "") {
			$box_name_text = "вы оставили поле пустым тут должен быть ваш текст";
		}
		if ($box_name_textarea === "напечатайте свой текст...") {
			$box_name_textarea = "Ваш напечатанные текст пустой";
		}

	$sql_text = "CREATE TABLE $box_name_menu (id INTEGER AUTO_INCREMENT PRIMARY KEY, text_menu VARCHAR(100), textarea_menu TEXT )";
		if($conn->query($sql_text)){

	} else{
		echo "ошибка". "<br>";
	}

	$table_text = "INSERT INTO `$box_name_menu`(`text_menu`, `textarea_menu`) VALUES ('$box_name_text', '$box_name_textarea')";
	
	if (mysqli_query($conn, $table_text)) { // проверяем все ли правильно добавилось
		
	
	} else {
	    echo "Error: " . $table_text . "<br>" . mysqli_error($conn);
	
	}

	$files_links_text = fopen('tamplete_text/'. $box_name_menu.'.php', 'w+');
	fwrite($files_links_text, '
	<link href="style_links.css" rel="stylesheet">	<!-- если у вас в верстке свои стили то просто удалите эту сторку -->
		<?php 
		include "../connectBasa.php"; // подключамся к базе
			$fil_name_admin_text = basename(__FILE__, ".php");
			$read_fil_admin_text = $conn->query("SELECT * FROM `$fil_name_admin_text`");
				
				foreach($read_fil_admin_text as $select_text) {
					$home_text = $select_text["text_menu"];
					$home_messages = $select_text["textarea_menu"];

							// сдесь вы можете менять теги и классы и id на свои
					echo "
						<h1 class=class id=id>$home_text</h1>
						<p class=class-p id=id-p>$home_messages</p>
					";
				}

		?>	



		');

	fclose($files_links_text);


	$fil_admin_text = fopen('admin_text/'. $box_name_menu.'.php', 'w+');
	fwrite($fil_admin_text, '

		<?php 
			$admin_text_name = basename(__FILE__, ".php" );
			$admin_read_text = $conn->query("SELECT * FROM `$admin_text_name`");
		echo "<div class=box_div_create_menu>"; 	

		echo "
		<form action=config_file.php method=post id=form_delete>
		<input type=hidden name=hidden_name_menu_text value=$admin_text_name>
		<p class=text_mune_admin>$admin_text_name<input type=submit name=delet_mune_text class=delet_class_submit title=Удалить value= ></p></form>";

				foreach($admin_read_text as $select_text_admin) {
					$id_text_admin = $select_text_admin["id"];
					$name_text_admin = $select_text_admin["text_menu"];
					$messages_text_admin = $select_text_admin["textarea_menu"];

					echo "
					<div class=wrap_text style=height:33px;>
						<form action=config_file.php method=post id=form_text_congig>
							<input type=hidden name=hidden_add_id value=$id_text_admin>
							<input type=hidden name=hidden_tabl value=$admin_text_name>
							<textarea name=hidden_add_boxmenu class=hidd>$name_text_admin</textarea>
							<p class=h4_add_text name=add_text_h4>$name_text_admin</p>
							<small class=smal_text>Изменить заголовок:</small>
							<input type=text name=home_text_add class=add_text_congig>
							<small class=smal_text>Изменить текст:</small>
							<textarea name=messages_text_add class=add_messages_congig>$messages_text_admin</textarea>
							<input type=submit name=sub_config_text value=Сохранить class=but_config_add_text>
						</form>
					</div>	

					";

				}


		echo "</div>";		

		?>

		');
	fclose($fil_admin_text);







$conn->close();	

	echo '<meta http-equiv = "Refresh" content = "0; URL = admin-panel.php">';
	exit();

}




?>