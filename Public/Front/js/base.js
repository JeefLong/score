$(function(){


$(".ico-nav").bind({
	tap:function(){
		$("#menu").toggleClass("active");
		$('.layer-bg2').toggleClass("active");
		return false;
	}
});
$(".icon-close").bind({
	tap:function(){
		$("#menu").removeClass("active");
		$('.layer-bg2').removeClass("active");
		return false;
	}
});
$(".layer-bg2").bind({
	tap:function(){
		$("#menu").removeClass("active");
		$('.layer-bg2').removeClass("active");
		return false;
	}
});


$("#back").bind({
	tap:function(){
		history.back();
		}
	});
	
})
	
// JavaScript Document