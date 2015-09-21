/*

	Question2Answer (c) Gideon Greenspan
	http://www.question2answer.org/
	
	Back To Top Plugin by Bruno Vandekerkhove © 2015
		
*/


// This is a snippet to add a back to top button script

jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');
	
	/*
	var audioElement = document.createElement("audio");
	audioElement.setAttribute("src", "QA_PLUGINDIRaudio/ding.mp3");
	audioElement.setAttribute("autoplay", "autoplay");
	*/

	// Hide / show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration, function () {/*audioElement.currenttime=0;audioElement.play();*/}
		);
	});

});