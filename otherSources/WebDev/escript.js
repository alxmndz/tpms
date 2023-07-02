var tabs = document.querySelectorAll(".tab-header ul li");
var tabs_info = document.querySelectorAll(".tab-info");


tabs.forEach(function(tab, tab_index){
	tab.addEventListener("click", function(){
		tabs.forEach(function(tab){
			tab.classList.remove("active");
		})
		tab.classList.add("active");

		tabs_info.forEach(function(info, info_index){
			if(info_index == tab_index){
				info.style.display = "block";
			}else if(tab_index == "fa-solid fa-xmark"){
				header("Location: employee.php");
			}
			else{
				info.style.display = "none";
			}
		});
	})
});