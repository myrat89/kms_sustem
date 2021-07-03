<?php include "connectBasa.php"; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<link href='allstyle.css' rel='stylesheet'>
	<title>Система управления сайтом</title>
	
</head>
<body>
	<div class="heder_box_info">
		<a href="/Users_prects/index.php" class="href_User_proect">Перейти на сайт </a>
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
					<input type="text" name="name_menu" placeholder="Название меню на Англиском " class="in" required>

					<div class="box_form_display">
						<input type="text" name="name_links" placeholder="Имя сылки" class="in" required>
						<input type="text" name="name_href" placeholder="http://" class="in" required>
						<input type="text" name="name_class" placeholder="Имя class напрмер mk-class" class="in">
						<input type="text" name="name_id" placeholder="Имя id например mk-id" class="in">
						<input type="submit" name="add_sumbit" class="in_but" value="Добавить">
					</div>
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


				?>
					
		</div>	<!-- Конец обвертки блока wrappers -->


		<script src='myscript.js'></script>
		

</body>
</html>