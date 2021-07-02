<?php include "connectBasa.php"; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<link href='allstyle.css' rel='stylesheet'>
	<title>Панель управления</title>
	
</head>
<body>
	<div class="heder_box_info">
		<a href="/Users_prects/index.php" class="href_User_proect">Перейти на сайт</a>
	</div>
		<div class="wrappers">
			<div class="box_control_panel">
				<p id="panel_text">Панель Упровления страницами сайта</p>
				<form action="function.php" method="post" id="form_data2">
					
					<input type="text" name="name_menu" placeholder="Название меню на Англиском" class="in" required>

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
      				 	include ("admin/". $ap_dir);

  					  }
  					  
				}


				?>
					
		</div>	<!-- Конец обвертки блока wrappers -->

		<?php
			if (isset($_POST['subm'])) {
				$name_links_value = htmlspecialchars($_POST['add']);

					$save_links = "INSERT INTO `nav_menu`(`link_name`) VALUES ('$name_links_value')";

						if (mysqli_query($conn, $save_links)) { // проверяем все ли правильно добавилось

						} else {
						      echo "Error: " . $save_links . "<br>" . mysqli_error($conn);
						}

						$table = $conn->query("SELECT * FROM `nav_menu`");
						foreach ($table as $select_table) {
							$ids = $select_table['id'];
							$name_table = $select_table['link_name'];

							$files = fopen('links='. $ids. '.php', 'w+');
							fwrite($files, "
								<!DOCTYPE html>
								<html lang='ru'>
								<meta charset='utf-8'>
								<link href='allstyle.css' rel='stylesheet'>
								<title>$name_table</title>
									<body>
										<div class='menu'>
											<nav>
												<a href='index.php' class='box_href'>Панель управления</a>
												<?php include 'reading from database.php'; ?>
												<h1>Вами созданная новая страница <span class='nam'>$name_table</span></h1>
											</nav>
										</div>
										<script src='myscript.js'></script>
									</body>
								</html>
								");
							fclose($files);

						}
						mysqli_close($conn);
							echo '<meta http-equiv = "Refresh" content = "0; URL = index.php">';
							exit();

			}

		// 
		?>

		<script src='myscript.js'></script>
		

</body>
</html>