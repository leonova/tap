$(window).bind("load",function(){
// sticky Ads
	if ($('#sticky-ads').length && $("#sidebar-section").length) {
		var startingOffset = $('#sticky-ads').offset().top;
		var stickyHeight = $('#sticky-ads').outerHeight(true);
		var marginBottom = 0;
		
		var footerHeight = $('footer#footer-section').outerHeight(true) + 0;
		var $rightBlock = $("#sidebar-section");		
		var $leftBlock = $("#right-content-section");
		
		
		$(window).scroll(function() {
		
			if ($(window).scrollTop() - (startingOffset) >= 0) {
			   
				if ($leftBlock) if ($leftBlock.height() < $rightBlock.height()) return;
					$('#sticky-ads').css('position','fixed');
				
					var bottomMinus = ($(document).height() - $(window).scrollTop()) - (stickyHeight + marginBottom + footerHeight);
				if (bottomMinus >= 0) bottomMinus = 0;
				$('#sticky-ads').css('top', bottomMinus);
			} else {
				$('#sticky-ads').css('position','relative');
				$('#sticky-ads').css('top','auto');
			}
		});
	}
});
$(document).ready(function(){
    $(".search-icon").on('click', function(){
	   var x = setTimeout('$(".search-dropdown #s").focus()', 700);
	});
    $('.dropdown-menu').hover(function(){	
	$(".dropdown-menu").mouseenter(function() {
		$(this).parent().addClass("active");
	});
 
	$(".dropdown-menu").mouseleave(function() {
		$(this).parent().removeClass("active");
	});
	});
   // $('#carousel').on('slide.bs.carousel', function() { 
  // for ( var i = 5; i < 13; i++ ) {
	// var url = $('#img-'+i).attr('data-src'); 
    //       $('#img-'+i).attr("src", url); //set value : src = url
    //  }     
  //  });
    $('#mobileTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	//  $( "img.lazy" ).each(function( index ) {	 
	  //     var url = $(this).attr('data-src'); 
    //       $(this).attr("src", url); //set value : src = url
	//  });
	  
	});
	//$('.collapse').collapse();
	//realtime_fb_shares();
   // setInterval("realtime_fb_shares()", 3000); 
   // function realtime_fb_likes() {
    //   var url = $('#fbcount').attr('url');
	 //  $('#fbcount').text('0');
    //   $.getJSON('http://graph.facebook.com/?id='+url, function(data) {
	//   $('#fbcount').text(data.shares); 
       	   
  //  });	
  // }
  // $("img.lazy").lazy({
   //     delay: 150,
	//	effect: "fadeIn"
  //  });
		$('.carousel').carousel();		
	$("a.search-close").click(function() {
	   $('.dropdown.open').removeClass('open');
	});
	 $("#subscribe-form").submit(function(e){
		e.preventDefault(); 		
		var $form = $(this),		
		email = $form.find('input[name="email"]').val(),
		list = $form.find('input[name="list"]').val(),
		url = $form.attr('action');
		$.post(url, {list:list, email:email},
		  function(data) {
		      if(data)
		      {
		      	if(data=="Some fields are missing.")
		      	{
			      	$("#status").text("Please fill in your email.");
			      	$("#status").css("color", "red");
		      	}
		      	else if(data=="Invalid email address.")
		      	{
			      	$("#status").text("Your email address is invalid.");
			      	$("#status").css("color", "red");
		      	}
		      	else if(data=="Invalid list ID.")
		      	{
			      	$("#status").text("Your list ID is invalid.");
			      	$("#status").css("color", "red");
		      	}
		      	else if(data=="Already subscribed.")
		      	{		
                    $("#status").text("Already subscribed.");
			      	$("#status").css("color", "red");			
						
		      	}
		      	else
		      	{				
			        $("#status").text("Thank you for Subscribing!.");
			      	$("#status").css("color", "red");
				}
		      }
		      else
		      {
		      	alert("Sorry, unable to subscribe. Please try again later!");
		      }
		  }
		);
	});
	$("#subscribe-form").keypress(function(e) {
		    if(e.keyCode == 13) {
		    	e.preventDefault(); 
				$(this).submit();
		    }
		});
	$("#submit-btn").click(function(e){
		e.preventDefault(); 
		$("#subscribe-form").submit();
	});	
	//For second sendy form
	$("#subscribe-form-2").submit(function(e){
		e.preventDefault(); 		
		var $form = $(this),		
		email = $form.find('input[name="email"]').val(),
		list = $form.find('input[name="list"]').val(),
		url = $form.attr('action');
		$.post(url, {list:list, email:email},
		  function(data) {
		      if(data)
		      {
		      	if(data=="Some fields are missing.")
		      	{
			      	$("#status-2").text("Please fill in your email.");
			      	$("#status-2").css("color", "red");
		      	}
		      	else if(data=="Invalid email address.")
		      	{
			      	$("#status-2").text("Your email address is invalid.");
			      	$("#status-2").css("color", "red");
		      	}
		      	else if(data=="Invalid list ID.")
		      	{
			      	$("#status-2").text("Your list ID is invalid.");
			      	$("#status-2").css("color", "red");
		      	}
		      	else if(data=="Already subscribed.")
		      	{	
				    document.getElementById("subscribe-form-2").innerHTML = "<strong>Already subscribed.</strong>";
			      	$("#subscribe-form-2").css("color", "red");				
					
		      	}
		      	else
		      	{	
                    document.getElementById("subscribe-form-2").innerHTML = "<strong>Thank you for Subscribing!</strong><br />Do check your email inbox for our confirmation email";
			      	$("#subscribe-form-2").css("color", "red");					
			     }
		      }
		      else
		      {
		      	alert("Sorry, unable to subscribe. Please try again later!");
		      }
		  }
		);
	});
	$("#subscribe-form-2").keypress(function(e) {
		    if(e.keyCode == 13) {
		    	e.preventDefault(); 
				$(this).submit();
		    }
		});
	$("#sub-submit2").click(function(e){
		e.preventDefault(); 
		$("#subscribe-form-2").submit();
	});
	
	/////** New Group Functions **//////
	$("#user-login").click(function(e){
		$('#myModalLogin').modal();
	});
	
	$(".table-setting .checkall").click(function () {
        if ($(".table-setting .checkall").is(':checked')) {
            $(".table-setting input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $(".table-setting input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });

 	$(function () {
        $("[rel='tooltip']").tooltip();
    });
		
});

$(function() {
    $(window).scroll(function(){
        var distanceTop = $('#fbslider').offset().top - $(window).height();
 
        if  ($(window).scrollTop() > distanceTop)
		    
            $('#slidebox').animate({'left':'0px'},300);
        else
            $('#slidebox').stop(true).animate({'left':'-430px'},100);
    });
 
    $('#slidebox .button-close').bind('click',function(){
        $(this).parent().remove();
    });
});