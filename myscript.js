
//всплывающие окна


const ad_text = document.getElementsByClassName("name_te_ad_links");
const box_ad = document.getElementsByClassName("box_admin_links")[0];
	for (let i = 0; i < ad_text.length; i++) {
		ad_text[i].addEventListener("click", function() {
			if (this.parentNode.style.height === "30px") {
				this.parentNode.style.height = "327px";
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
	