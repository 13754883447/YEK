$(function () {
	var swiper = new Swiper('.swiper1', {
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		pagination: '.swiper-pagination',
		paginationType: 'progress',
		spaceBetween: 30,
		centeredSlides: true,
		autoplay: 2500,
		autoplayDisableOnInteraction: false,
	});//banner
	$(".lianjie").addClass("lianjiein");
	$(".swiper1>ul>li>h2").addClass("h2in");
	$(".swiper1>ul>li>p").addClass("pin");
	$(".HDlist").click(function () {//菜单header
		$(".daohangxiala").slideToggle();
	})
	var wh=$(window).height();//滚动条
	$(window).scroll(function(){//轮播
		var s=wh-$(window).scrollTop();
		if(s>275){
			$(".daohang").css({
				position: "relative",
				width:"100%",
				margin:"0 auto",
				height:"107px",
				padding:0,
			});
			$(".daohangxiala").css("padding-top","107px");
			$(".DHneirong").css({
				width: "",
				height: "",
				margin: "0 auto",
				display: "flex",
				"justify-content": "space-between",
				padding: "36px 15px 34px",
			})
		}
		if(s<275){
			$(".daohang").css({
				position: "fixed",
				top:0,
				left:0,
				height:"56px",
			})
			$(".DHneirong").css({
				height: "100%",
				padding: 0,
				"padding-top":"10px",
			})
            $(".daohangxiala").css("padding-top","54px");
		}
	});
	let S5li=$(".S5ul2>li");
	$(".S5ul2>li").click(function (index,value) {//S5任务详细
		var i=$(this).index();
		$(".S5ul2>li").removeClass("active").eq(i).addClass("active");
		$(".S5b1").removeClass("active").eq(i).addClass("active");
		$(".linseciton").removeClass("active").eq(i).addClass("active");
	})
	//header下拉
	// $(".slide").hover(function (index) {
	// 	$(".GNxiala").finish();
	// 	var i=$(this).index()-1;
	// 	$(".GNxiala").eq(i).slideToggle();
	// })
})