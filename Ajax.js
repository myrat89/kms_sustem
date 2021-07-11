// ajax запрос к форме
	const submit_users_admin = document.getElementsByClassName("Log_in")[0];
	const inp_username = document.getElementsByName("username_ad")[0];
	const inp_password = document.getElementsByName("Password_ad")[0];
	
	submit_users_admin.addEventListener("click", function(event) {
		event.preventDefault();
			if (inp_username.value === "" || inp_password.value === "") {
				alert("Заполните обязательные поля");
				return false;
			}
		let submit_value = this.value;
		let posdata = "username_ad=" + inp_username.value + "&Password_ad=" + inp_password.value + "&Log_in=" + submit_value;
		console.log(posdata);
		let ajaxpost = new XMLHttpRequest();
			ajaxpost.open('POST', '/config_file.php', true);
			ajaxpost.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
			ajaxpost.send(posdata); // отправка данных на сервер
			console.log(ajaxpost);		
				ajaxpost.addEventListener("readystatechange", function() {
					if (ajaxpost.status === 200) {
						if (ajaxpost.readyState === 4) {
							if (ajaxpost.response !== "<small class='small_error'>Непрваильный логин или пароль</small>"){
								window.location.replace('admin-panel.php');
							}
							else {
								inp_password.insertAdjacentHTML("afterend", ajaxpost.response);
							}
						}
					}
				});
	});
