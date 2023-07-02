var tabButton = document.querySelectorAll(".sidebar .sidebar-menu ul li");
var tabContent = document.querySelectorAll("section .main-content");

function openContent(panelIndex) {

	tabContent.forEach(function(node){
		node.style.color = "";
	});

	tabContent[panelIndex].style.display = "block";
}
openContent(0);