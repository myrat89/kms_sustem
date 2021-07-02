
		
		<?php
			
			$fil_name_admin = basename(__FILE__, ".php");
			$read_fil_admin = $conn->query("SELECT * FROM `$fil_name_admin`");
			
			echo "<div class=box_div_create_menu>"; 
			echo "<p class=text_mune_admin>$fil_name_admin</p>";

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
						<input type=hidden name=name_ad_hidden_id value=$id_ad>
						<input type=hidden name=name_ad_hidden_menu value=$fil_name_admin>
						<input type=text name=name_ad_links value=Имя:$name_ad class=inp_ad>
						<input type=text name=name_ad_href value= Путь:$namehref_ad class=inp_ad>
						<input type=text name=name_ad_class value= class:$classn_ad class=inp_ad>
						<input type=text name=name_ad_id value=id:$id_links_ad class=inp_ad>
						<input type=submit name=sub_ad_save value=Сохранить class=inp_ad_submit>

					</form>
				</div>


				";

			}

			echo "</div>";
		
		?>
			