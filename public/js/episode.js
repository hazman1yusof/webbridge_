
$(document).ready(function() {
	Object.keys(episode).forEach(function(key) {
		$('[name="'+key+'"]').val(episode[key]);

	});

	$("#epis_confirm_button").click(function(){
		$('#episode_form').hide();
	});

});