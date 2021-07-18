
	<link href="style_links.css" rel="stylesheet">	<!-- если у вас в верстке свои стили то просто удалите эту сторку -->
		<?php 
		include "../connectBasa.php"; // подключамся к базе
			$fil_name_admin_text = basename(__FILE__, ".php");
			$read_fil_admin_text = $conn->query("SELECT * FROM `$fil_name_admin_text`");
				
				foreach($read_fil_admin_text as $select_text) {
					$home_text = $select_text["text_menu"];
					$home_messages = $select_text["textarea_menu"];

				
					if ($home_text !== "вы оставили поле пустым тут должен быть ваш текст" && $home_text !== "") {
						echo "<h1 class=class id=id>$home_text</h1>";
					}
					
					if ($home_messages !== "Ваш напечатанные текст пустой" && $home_messages !== "") {
						echo "<p class=class-p id=id-p>$home_messages</p>";
					}
							
				}

		?>	



		