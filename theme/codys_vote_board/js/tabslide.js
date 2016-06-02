$(function () {
	//게시판 탭 최대 카운트는 tabcount;
	var tabcount = 4;
    $(".tab_content").hide();
    $(".tab_content:first").show();


    $("ul.tabs li").click(function () {
        $("ul.tabs li").removeClass("active").css("color", "#333");
        //$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css("color", "darkred");
        $(".tab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();
    });
	
	$('.tab_content.mobile').hammer().on('swipeleft', function(){
		var is_changed = 0;
		//왼쪽으로 swipe -> 오른쪽 탭으로 이동
		console.log("onswipeleft");
		$(this).removeClass("active").css("color","#333");
		var next_id = $(this).attr('id');
		next_id = next_id.replace(/\d+$/, function(n){
			if ( n < tabcount  )
			{
				is_changed = 1;
				return ++n;
			}
			else
			{
				is_changed = 0;
				return n;
			}
		});
		if(is_changed == 1){
			$("ul.tabs li").removeClass("active").css("color", "#333");
			$(this).hide();

			$("ul.tabs li[rel="+next_id+"]").addClass("active").css("color","darkred");
			$("#"+next_id).show("slide");
			console.log("next id : " + next_id);
		}

		
		//console.log("id:" + idofit);
		//$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
		
		
	});
	$('.tab_content.mobile').hammer().on('swiperight', function(){
		//오른쪽으로 swipre -> 왼쪽 탭으로 이동
		console.log("onswiperight");

		var is_changed = 0;
		//왼쪽으로 swipe -> 오른쪽 탭으로 이동
		console.log("onswipeleft");
		$(this).removeClass("active").css("color","#333");
		var next_id = $(this).attr('id');
		next_id = next_id.replace(/\d+$/, function(n){
			if ( n > 1  )
			{
				is_changed = 1;
				return --n;
			}
			else
			{
				is_changed = 0;
				return n;
			}
		});
		if(is_changed == 1){
			$("ul.tabs li").removeClass("active").css("color", "#333");
			$(this).hide();

			$("ul.tabs li[rel="+next_id+"]").addClass("active").css("color","darkred");
			$("#"+next_id).show("slide");
			console.log("next id : " + next_id);
		}
		
	});

	/*$("div").on("swipe",function () {
		
	});*/

});