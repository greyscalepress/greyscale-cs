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



});