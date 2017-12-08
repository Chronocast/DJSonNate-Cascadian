//Author: Nate Hascup, Duck Nguyen
//Date: 11/11/17
//Filename: admin.js
//Description: javascript for admin pages


// Duck's codes modified from
// https://stackoverflow.com/questions/35427641/how-to-dynamically-set-the-active-class-in-bootstrap-navbar/35428555
$(document).ready(function () {
	console.log("we're in the js file");
	var url = window.location;
	$('ul.nav a[href="'+ url +'"]').addClass('active');
	$('ul.nav a').filter(function() {
		 return this.href == url;
	}).addClass('active');
});

// Nate's codes
//$('#myModal').on('shown.bs.modal', function () {
//  $('#myInput').focus()
//})


$('a.delete').click(function(){
	$(this).parent().parent().parent().find("form.delete").submit();
});