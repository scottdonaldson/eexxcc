(function($){
	
// popup links
$('body').on('click', '.popup', function(e){
  e.preventDefault();
  window.open($(this).attr('href'),'share','height=420,width=480,fullscreen=no,location=yes,statusbar=no,toolbar=no,resizeable=yes',false);
});

})(jQuery);