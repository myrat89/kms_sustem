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

	echo '<meta http-equiv = "Refresh" content = "0; URL = index.php">';
	exit();
}














?>