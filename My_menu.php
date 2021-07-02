
		<link href="style_links.css" rel="stylesheet">	<!-- если у вас в верстке свои стили то просто удалите эту сторку -->
		
		<?php 
	
			include "connectBasa.php";

			$filname = basename(__FILE__, ".php");
			$read = $conn->query("SELECT * FROM `$filname`");
			foreach ($read as $key => $value) {
				
				$name = $value["name_links"];
				$namehref = $value["href_links"];
				$classn = $value["class_links"];
				$id_links = $value["id_links"];
				
				// сдесь ваша html разметка страницы

				echo "<a href=$namehref class=$classn id=id_links>$name</a>";
				
			}

		?>


		