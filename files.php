<?php 

$folder = __DIR__.'/admin';
				$open_dir = scandir($folder);
				echo "<select class=select_menu name=name_value_select>";
				foreach ($open_dir as $ap_dir) {
					 if (!in_array($ap_dir, array(".", ".."))) {  
					 $ap_dir = basename($ap_dir, ".php");    				 	
      				 	
      				 	echo "<option>$ap_dir</option>";

  					  }
  					  
				}
				echo "</select>";




?>