<?php include "connectBasa.php"; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="robots" content="noindex, nofollow"/>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/fonts/montserrat.css">
	<link href='allstyle.css' rel='stylesheet' >
	<title>Система управления сайтом</title>
	
</head>
<body>
	<div class="heder_box_info">
		<a href="index.php" title="Система управления сайтом"><div class="logo_svg_cms"></div></a>
		<a href="/Users_prects/index.php" class="href_User_proect">Перейти на сайт </a>
		<button class="button_add_box_menu">Добавить меню сылок</button>
		<button class="button_add_box_menu">Добавить текстовое меню</button>
		
	</div>
		<div class="wrappers">
			<div class="box_control_panel">
				<p id="panel_text">Панель Упровления страницами сайта</p>
				<form action="function.php" method="post" id="form_data2">
					<?php 
						$fails = __DIR__. '/admin';
						$scan = scandir($fails); // массив
						if (count($scan) > 2) {
							
							include 'files.php';
							
						}


					?>
					<input type="text" name="name_menu" placeholder="Название на Англиском и без пробелов" class="in" required>

					<div class="box_form_display">
						<input type="text" name="name_links" placeholder="Имя сылки" class="in" required>
						<input type="text" name="name_href" placeholder="http://" class="in" required>
						<input type="text" name="name_class" placeholder="Имя class напрмер mk-class" class="in">
						<input type="text" name="name_id" placeholder="Имя id например mk-id" class="in">
						<input type="submit" name="add_sumbit" class="in_but" value="Добавить">
					</div>
				</form>

			</div>
			<div class="box_control_panel">
				<p id="panel_text">Панель добовления текста на сайт</p>	
					<form action="function.php" method="post" id="form_add_text">

						<?php 
							
							$fails_text = __DIR__. '/admin_text';
							$scan_text = scandir($fails_text); // массив
							if (count($scan_text) > 2) {
							
							include 'files_text.php';
							
						}
						?>

						<small class="small_text_add">Название текстового блока<span style="color:red;">*</span></small>
						<input type="text" name="_name_text_home" class="home_text_add" required placeholder="Название без пробелов и на Англиском">
						<small class="small_text_add">Заголовак текста</small>
						<input type="text" name="text_home" class="home_text_add">
						<small class="small_text_add" id="text-add">Текст</small>
						<textarea name="textarea_add_text" class="textarea_add" >напечатайте свой текст...</textarea>
						<input type="submit" name="submit_add_text" value="Добавить текст" class="submit_add_text">
					</form>
			</div>
				<?php 
				$folder = __DIR__.'/admin';
				$open_dir = scandir($folder);
				foreach ($open_dir as $ap_dir) {
					 if (!in_array($ap_dir, array(".", ".."))) {      				 	
      				 		include ("admin/". $ap_dir); // подключаем все имеющися файлы в директории

  					  }
  					  
				}
				$files_text = __DIR__. '/admin_text';
				$scan_fil_texst = scandir($files_text);
					foreach ($scan_fil_texst as $file_text) {
						if (!in_array($file_text, array(".", ".."))) {
							include ("admin_text/". $file_text); // подключаем все имеющися файлы в директории	
						}
					}

				?>
					
		</div>	<!-- Конец обвертки блока wrappers -->


		<script src='myscript.js'></script>
		

</body>
</html>