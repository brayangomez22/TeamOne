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
	// HIDDEN ROUTE
	//=============================================

	var hiddenRoute = $("#hiddenRoute").val(); 
	localStorage.setItem("hiddenRoute", hiddenRoute);
	
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
		url:hiddenRoute+"assets/js/institutions.json",
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

});  