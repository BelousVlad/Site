$(".nav-active-btn").click(function(e){
	
	$(".nav-container").toggleClass("active");

	let toggle = $(".nav-container").hasClass("active");
	if (toggle)
	{
		$(".nav-container .nav-active-btn div:nth-child(1)").addClass("nav-btn1-anim1-1");
		$(".nav-container .nav-active-btn div:nth-child(3)").addClass("nav-btn1-anim2-1");
		setTimeout(function(){
			$(".nav-container .nav-active-btn div:nth-child(1)").addClass("nav-btn1-anim1-2")
			$(".nav-container .nav-active-btn div:nth-child(3)").addClass("nav-btn1-anim2-2")

		},300)

		
		$(".nav-container .nav-active-btn div:nth-child(2)").addClass("nav-btn1-anim3");
	}
	else 
	{
		$(".nav-container .nav-active-btn div:nth-child(1)").removeClass("nav-btn1-anim1-1");
		$(".nav-container .nav-active-btn div:nth-child(3)").removeClass("nav-btn1-anim2-1");
		setTimeout(function(){
			$(".nav-container .nav-active-btn div:nth-child(1)").removeClass("nav-btn1-anim1-2")
			$(".nav-container .nav-active-btn div:nth-child(3)").removeClass("nav-btn1-anim2-2")

		},300)

		
		$(".nav-container .nav-active-btn div:nth-child(2)").removeClass("nav-btn1-anim3");
	}

})