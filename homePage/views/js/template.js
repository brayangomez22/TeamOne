$(document).ready(function(){

    // WOW Instance
	new WOW().init();

	//=============================================
	// CURSOR 
	//=============================================

	var cursor = document.querySelector(".cursor");
    var cursor2 = document.querySelector(".cursor2");
    document.addEventListener("mousemove",function(e){
      cursor.style.cssText = cursor2.style.cssText = "left: " + e.clientX + "px; top: " + e.clientY + "px;";
	});
	
	//=============================================
	// NUMBERS
	//=============================================

	let nCount = selector => {
		$(selector).each(function () {
			$(this)
			.animate({
				Counter: $(this).text()
			}, {
				// A string or number determining how long the animation will run.
				duration: 4000,
				// A string indicating which easing function to use for the transition.
				easing: "swing",
				/**
				 * A function to be called for each animated property of each animated element. 
				 * This function provides an opportunity to
				 *  modify the Tween object to change the value of the property before it is set.
				 */
				step: function (value) {
				$(this).text(Math.ceil(value));
				}
			});
		});
	};
	  
	let a = 0;
	$(window).scroll(function () {
		// The .offset() method allows us to retrieve the current position of an element  relative to the document
		let oTop = $(".numbers").offset().top - window.innerHeight;
		if (a == 0 && $(window).scrollTop() >= oTop) {
			a++;
			nCount(".rect > h1");
		}
	});

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

	var rutaOculta = $("#rutaOculta").val();
	
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