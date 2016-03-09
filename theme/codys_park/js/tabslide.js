$(function () {

    $(".tab_content").hide();
    $(".tab_content:first").show();

    $("ul.tabs li").click(function () {
        $("ul.tabs li").removeClass("active").css("color", "#333");
        //$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css("color", "darkred");
        $(".tab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
    });
	
	$('.tab_container').hammer().on('swipeleft', function(){
		//do smth 
		console.log("onswipe");
		//$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
		$(this).removeClass("active").css("color", "darkred");
		
	});
	$('.tab_container').hammer().on('swiperight', function(){
		//do smth 
		console.log("onswipe");
		//$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
		$(this).addClass("active").css("color", "darkred");
		
	});

	/*$("div").on("swipe",function () {
		
	});*/

});