

		<?php 
			$admin_text_name = basename(__FILE__, ".php" );
			$admin_read_text = $conn->query("SELECT * FROM `$admin_text_name`");
		echo "<div class=box_div_create_menu>"; 	

		echo "
		<form action=config_file.php method=post id=form_delete>
		<input type=hidden name=hidden_name_menu_text value=$admin_text_name>
		<p class=text_mune_admin>$admin_text_name<input type=submit name=delet_mune_text class=delet_class_submit title=Удалить value= ></p></form>";

				foreach($admin_read_text as $select_text_admin) {
					$id_text_admin = $select_text_admin["id"];
					$name_text_admin = $select_text_admin["text_menu"];
					$messages_text_admin = $select_text_admin["textarea_menu"];

					echo "
					<div class=wrap_text style=height:33px;>
						<form action=config_file.php method=post id=form_text_congig>
							<input type=hidden name=hidden_add_id value=$id_text_admin>
							<input type=hidden name=hidden_tabl value=$admin_text_name>
							<textarea name=hidden_add_boxmenu class=hidd>$name_text_admin</textarea>
							<p class=h4_add_text name=add_text_h4>$name_text_admin</p>
							<small class=smal_text>Изменить заголовок:</small>
							<input type=text name=home_text_add class=add_text_congig>
							<small class=smal_text>Изменить текст:</small>
							<textarea name=messages_text_add class=add_messages_congig>$messages_text_admin</textarea>
							<input type=submit name=sub_config_text value=Сохранить class=but_config_add_text>
						</form>
					</div>	

					";

				}


		echo "</div>";		

		?>

		