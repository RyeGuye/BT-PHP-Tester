
$(document).ready(function()    {
	$(".checkbox").click (function() {
		var input = $(this);
		var fellowinput = $(this).parent().children(".input");
		var fellowtext = $(this).parent().children(".text");
		if (input.is(":checked")) {
			fellowinput.prop("disabled", false);
			fellowtext.css("color", "black");
		}
		else {
			fellowinput.prop("disabled", true);
			fellowtext.css("color", "gray");
		}
	});
	$("#revealbutton").click(function() {
		$("#revealcontents").toggle();
	}); 
});
console.log();