/**$(function() {

$('aside div a a').click(function() {
var $linkClicked = $(this).attr('href');
document.location.hash = $linkClicked;
var $pageRoot = $linkClicked.replace('page', '');

  if (!$(this).hasClass("active")) {
    $("aside div a a").removeClass("active");
    $(this).addClass("active");
    $.ajax({
		type: "POST",
		url: "load.php",
		data: 'page='+$pageRoot,
		dataType: "html",
		success: function(msg){
			
			if(parseInt(msg)!=0)
			{
				$('#main-content').html(msg);
				$('#main-content section').hide().fadeIn();
			}
		}
		
	});
  }
  else {
	  event.preventDefault();
  }
  
});


var hash = window.location.hash;
hash = hash.replace(/^#/, '');
switch (hash) {
    case 'perfil' :
      $("#" + hash + "-link").trigger("click");
      break;
    case 'page3' :
      $("#" + hash + "-link").trigger("click");
      break;
    case 'page4' :
      $("#" + hash + "-link").trigger("click");
      break;
}
});*/

$(function(){
    var trigger = $('.load a'),
        container = $('#main-content');
        
    trigger.on('click', function(){
        var $this = $(this)
        target = $this.data('target')
        
        container.load(target + '.php');
        
        return false;
    });
});