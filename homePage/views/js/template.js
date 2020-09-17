$(document).ready(function(){

    // WOW Instance
	new WOW().init();

    //=============================================
    // OWL-CAROUSEL
    //=============================================
    
    $('.testimonials .owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            560: {
                items: 2
            }
        }
    })

    //=============================================
    // CLICK TO SCROLL TOP
    //=============================================

    $('.move-up span').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    })
	
	//=============================================
	// WE CAPTURE THE CURRENT PAGE ROUTE
	//=============================================

	var rutaActual = location.href;

	$(".btnIngreso, .facebook, .google").click(function(){
		localStorage.setItem("rutaActual", rutaActual);
	})

	//=============================================
	// HIDDEN ROUTE
	//=============================================

	var hiddenRoute = $("#hiddenRoute").val(); 
	
	//=============================================
	// SIGN UP AND LOGIN
	//=============================================

	const sign_in_btn = document.querySelector("#sign-in-btn");
	const sign_up_btn = document.querySelector("#sign-up-btn");
	const containerSignUpLogin = document.querySelector(".containerSignUpLogin");

	sign_up_btn.addEventListener("click", () => {
		containerSignUpLogin.classList.add("sign-up-mode");
	});

	sign_in_btn.addEventListener("click", () => {
		containerSignUpLogin.classList.remove("sign-up-mode");
	});

	//=============================================
	// INSTITUTIONS 
	//=============================================

	$.ajax({
		url:hiddenRoute+"views/js/institutions.json",
		type: "GET",
		cache: false,
		contentType: false,
		processData:false,
		dataType:"json",
		success: function(reply){

			reply.forEach(institution);

			function institution(item, index){

				var nameInstitution = item.name;
				var codInstitution = item.code;

				$("#institution").append('<option value="'+codInstitution+'">'+nameInstitution+'</option>');
			
			}

		}
	})

	//=============================================
	// SHOW AND HIDE THE FORM PASSWORD
	//=============================================

	//---- FOR THE RECORD ----

	var input = document.querySelector('.pswrd1');
	var show = document.getElementById('show1');

	show.addEventListener('click', active);
	function active(){
		if(input.type === "password"){
			input.type = "text";
			show.innerHTML = '<i class="fas fa-eye-slash"></i>';
		}else{
			input.type = "password";
			show.innerHTML = '<i class="fas fa-eye"></i>';
		}
	}

	//-------- FOR ADMISSION ---------

	var input2 = document.getElementById('pswrd2');
	var show2 = document.getElementById('show2');

	show2.addEventListener('click', active2);
		function active2(){
		if(input2.type === "password"){
			input2.type = "text";
			show2.innerHTML = '<i class="fas fa-eye-slash"></i>';
		}else{
			input2.type = "password";
			show2.innerHTML = '<i class="fas fa-eye"></i>';
		}
	}

});  