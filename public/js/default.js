var page = {{ Input::get('page', 1) }};
$(document).ready(function() {
	$('.next_page').click(function(e) {
		e.preventDefault();
		page++;
		$.get('{{ URL::current() }}'+'?page='+page, function(data) {
			$('#container').html(data);
		});
	});
	$('.previous_page').click(function(e) {
		e.preventDefault();
		page--;
		$.get('{{ URL::current() }}'+'?page='+page, function(data) {
			$('#container').html(data);
		});
	})
});