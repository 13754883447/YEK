$(function () {
	var swiper = new Swiper('.swiper-container', {
		spaceBetween: 80,
		centeredSlides: true,
		autoplay: 6000,
		autoplayDisableOnInteraction: false,
		loop:true,
	});//show
	var wh=$(window).height();//滚动条
	$(window).scroll(function(){//轮播
		var s=wh-$(window).scrollTop();
        console.log(s)
        if(s<275){
			$(".nav").slideDown();
		}
		if(s>600){
			$('.touxiang').addClass('touxiangxuanzhuan');
			// $('.jieshao').addClass('jieshaoop');
		}
		if(s>275){
			$(".nav").slideUp();
		}
		$("#top").click(function () {
			$(window).scrollTop(0);
		})
	});
	let S5li=$(".S5ul2>li");
	$(".S5ul2>li").click(function (index,value) {//S5任务详细
		var i=$(this).index();
		$(".S5ul2>li").removeClass("active").eq(i).addClass("active");
		$(".S5b1").removeClass("active").eq(i).addClass("active");
		$(".linseciton").removeClass("active").eq(i).addClass("active");
	});
    // $(".weixin").on('click',function () {
		// alert('微信:w1225803773');
    // })
})/**
 * Created by 凯瑟琳 on 2017/7/22.
 */
