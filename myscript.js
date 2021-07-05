
//всплывающие окна

const text_home	= document.getElementsByClassName("h4_add_text");
	for (let i = 0; i < text_home.length; i++) {
	 	text_home[i].addEventListener("click", function() {
	 		if(this.parentNode.parentNode.style.height === "33px") {
	 			this.parentNode.parentNode.style.height = "317px";
	 		}
	 		else {
	 			this.parentNode.parentNode.style.height = "33px";
	 		}
	 	});
	 } 

const ad_text = document.getElementsByClassName("name_te_ad_links");
const box_ad = document.getElementsByClassName("box_admin_links")[0];
	for (let i = 0; i < ad_text.length; i++) {
		ad_text[i].addEventListener("click", function() {
			if (this.parentNode.style.height === "30px") {
				this.parentNode.style.height = "345px";
			}
			else {
				this.parentNode.style.height = "30px";
			}
		
		});
	}

	// обрезаем пробелы 

	const inp_name_menu = document.getElementsByClassName("in")[0];
	inp_name_menu.addEventListener("blur", function() {
		let probel = this.value.replace(/\s/g, '');;
		this.value = probel;
	});
	
	// select 
	const input_disabled = document.createElement("input");
	input_disabled.type = "hidden"; input_disabled.name = "name_menu";
	input_disabled.className = "disabked_hidden";
	const selects = document.getElementsByClassName("select_menu")[0];
	const input_in = document.getElementsByClassName("in")[0];
	if (selects) {
		selects.addEventListener("change", function() {

			input_in.value = this.value; // втовляем значение из select в input
			input_in.disabled = "disabled";		
			input_disabled.value = this.value;
			document.getElementById("form_data2").prepend(input_disabled);

			if (this.value === "Добавть новое меню") {
				input_in.disabled = "";
				input_in.value = "";
			}
		});
	}
	document.addEventListener("DOMContentLoaded", function() {
		if (selects) {
			input_in.value = selects.value; // встовляем при загрузке страницы
			input_in.disabled = "disabled";
			input_disabled.value = selects.value;
			document.getElementById("form_data2").prepend(input_disabled);
			


		}
	});

// button display none = block

	const box_panel = document.getElementsByClassName("box_control_panel"); 
	const button_add_box_menu = document.getElementsByClassName("button_add_box_menu");
	for (let i = 0; i < button_add_box_menu.length; i++) {
		
		button_add_box_menu[i].addEventListener("click", function() {
			
			if (this.innerHTML === "Добавить текстовое меню") {
				box_panel[1].classList.add('_textclass');

			}else {
				box_panel[1].classList.remove("_textclass");

			}

			if (this.innerHTML === "Добавить меню сылок") {
				box_panel[0].classList.add('_textclass');
			
			}else {
				box_panel[0].classList.remove("_textclass");
			}


	});

	
// document.body.classList.add('article');
// el.classList.remove("bar");


	}
	

