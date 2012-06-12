$(document).ready(function() {
	$('#load-content').click(function(e) {
		e.preventDefault();
		for (var i=1; i<=50; i++)
		{
			$.ajax({
				async: false,
				url: BASE+'content/'+i,
				success: function(data) {
					$('#content').html(data);
				}
			});
		}
	})
});