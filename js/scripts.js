jQuery(document).ready(function($){

/* 
 * 0: js-hidden must be hidden
 ****************************************************
 */ 
 $(".js-hidden").hide();
 $(".js-visible").show();


/* 
 * 1.
 * EmailSpamProtection (jQuery Plugin)
 ****************************************************
 * Author: Mike Unckel
 * Description and Demo: http://unckel.de/labs/jquery-plugin-email-spam-protection
 */
$.fn.emailSpamProtection = function(className) {
	return $(this).find("." + className).each(function() {
		var $this = $(this);
		var s = $this.text().replace(" [at] ", "&#64;");
		$this.html("<a href=\"mailto:" + s + "\">" + s + "</a>");
	});
};
$("body").emailSpamProtection("email");


/* 
 * 2: show hidden texts
 ****************************************************
 */ 
 $("article.text-item").on("click", "header.content-closed", function(){
 		 $(this).removeClass("content-closed");
 		 $(this).addClass("content-open");
 		 $(this).next(".text-item-content").show('200', function() {
 		 // Animation complete.
 		 });
 		 return false;
  });
 
 $("article.text-item").on("click", "header.content-open", function(){
 		 $(this).removeClass("content-open");
 		 $(this).addClass("content-closed");
 		 $(this).next(".text-item-content").hide('200', function() {
 		 // Animation complete.
 		 });
 		 return false;
  });

/*
 * Fix Vimeo Embed for #video-link
*/

$('#video-link iframe').attr('src', function() {
  return this.src + '?title=0&byline=0&portrait=0&color=ffffff'
});


$('iframe[src^="https://player.vimeo.com"]').attr('src', function() {
  return this.src + '?title=0&byline=0&portrait=0&color=ffffff'
});

$('#work-media iframe').parent().addClass("video-container");


});