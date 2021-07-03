
		
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
			