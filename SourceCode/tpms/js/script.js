const header = document.querySelector("header");
		const menu = document.querySelector('#menu-icon');
		const navbar = document.querySelector('.navbar');
	
		window.addEventListener("scroll", function () {
			header.classList.toggle("sticky", window.scrollY > 60)
		});
	
		menu.onclick = () => {
			menu.classList.toggle('bx-x');
			navbar.classList.toggle('open');
		}
