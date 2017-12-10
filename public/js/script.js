$('#show-menu').click(function(e){
    $('#menu').toggleClass('hidden');
});

$('.pg-default').bind('click', function(event) {
	event.preventDefault();
	$('#pg-default').pignosePopup();
});

$('#q1').click(function(){
	$('#a1').toggleClass('hidden');
});

$('#q2').click(function(){
	$('#a2').toggleClass('hidden');
});

$('#q3').click(function(){
	$('#a3').toggleClass('hidden');
});

$('#q4').click(function(){
	$('#a4').toggleClass('hidden');
});