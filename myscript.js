
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
	const selects = document.getElementsByClassName("select_menu"); //#
	const input_in = document.getElementsByClassName("in")[0];
	const input_in2 = document.getElementsByClassName("home_text_add")[0];
 	const inp_home_text = document.getElementsByClassName("box_control_panel")[1]; 
 	const select_menu = document.getElementsByClassName("select_menu"); 
	for (let i = 0; i < selects.length; i++) {
		
		selects[i].addEventListener("change", function() {
			if (selects) {
				
				if (this.value === "Добавть сылочное меню") {
					input_in.disabled = "";
					input_in.value = "";
						input_in2.disabled = "";
						input_in2.value = "";
						
				}else {
					input_in.value = this.value; // втовляем значение из select в input
					input_in.disabled = "disabled";		
					input_disabled.value = this.value;
					document.getElementById("form_data2").prepend(input_disabled);

	
				}

				if (inp_home_text.className === "box_control_panel _textclass") {
					if (this.value === "Добавть текстовое меню") {
						inp_home_text.children[1].children[3].value = ""; // встовляем значение в input
						inp_home_text.children[1].children[3].disabled = "";
					
					} 
					else {
						inp_home_text.children[1].children[3].value = this.value; // встовляем значение в input
						inp_home_text.children[1].children[3].disabled = "disabled";			
						input_disabled.name = "_name_text_home";	
						input_disabled.value = this.value;	
						document.getElementById("form_add_text").prepend(input_disabled);
					}

				}
			
			
			}


		});
	

	}


// button display none = block

	const box_panel = document.getElementsByClassName("box_control_panel"); 
	const button_add_box_menu = document.getElementsByClassName("button_add_box_menu");
	for (let i = 0; i < button_add_box_menu.length; i++) {
		
		button_add_box_menu[i].addEventListener("click", function() {
			
			if (this.innerHTML === "Добавить текстовое меню") {
				box_panel[1].classList.add('_textclass');
				input_in2.value = "";
				input_in2.disabled = "";
					if(select_menu[1].value !== "Добавть текстовое меню") {
						input_in2.value = select_menu[1].value; 
						input_in2.disabled = "disabled";
					}


			}
			else {
				box_panel[1].classList.remove("_textclass");

			}

			if (this.innerHTML === "Добавить меню сылок") {
				box_panel[0].classList.add('_textclass');
				input_in.disabled = "";
				input_in.value = "";
				
					if(select_menu[0].value !== "Добавть сылочное меню") {
						input_in.value = select_menu[0].value; 
						input_in.disabled = "disabled";
					}

			
			}

			else {
				box_panel[0].classList.remove("_textclass");
			}


	});

	}
	
	//удаление побелов обьединение строк

	input_in2.addEventListener("blur", function() {
		if (this.value !== "") {
			let arr = this.value.split(' ');
			let str = arr.join(""); 
			this.value = str;
		}
	});

// document.body.classList.add('article');
// el.classList.remove("bar");