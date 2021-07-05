
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



		