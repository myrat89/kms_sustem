
//всплывающие окна


const ad_text = document.getElementsByClassName("name_te_ad_links");
const box_ad = document.getElementsByClassName("box_admin_links")[0];
	for (let i = 0; i < ad_text.length; i++) {
		ad_text[i].addEventListener("click", function() {
			if (this.parentNode.style.height === "30px") {
				this.parentNode.style.height = "270px";
			}
			else {
				this.parentNode.style.height = "30px";
			}
		
		});
	}
	