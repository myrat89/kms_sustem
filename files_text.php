<?php 

$folder = __DIR__.'/admin_text';
				$open_dir = scandir($folder);
				echo "<small class=smal_text_heder>Выберите меню или добавте новое</small>";
				echo "<select class=select_menu name=name_value_select id=id_select_menu>";
				echo "<option>Добавть новое меню</option>";			
				foreach ($open_dir as $ap_dir) {
					 if (!in_array($ap_dir, array(".", ".."))) {  
					 $ap_dir = basename($ap_dir, ".php");    				 	
      				 	
      				 	echo "<option>$ap_dir</option>";

  					  }
  					  
				}
				echo "</select>";
				




?>