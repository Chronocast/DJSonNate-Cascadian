//Author: Nate Hascup, Duck Nguyen
//Date: 11/11/17
//Filename: admin.js
//Description: javascript for admin pages


jQuery(function(){
	
	jQuery('div[class*=targetDiv]').hide();
	jQuery('div[class*=overview]').show();
	
	jQuery('.showStep').click(function(){
		
		// get data number 
		var classData = jQuery($(this)).parent().attr('class');
		var target = classData.substring(classData.indexOf("data-")+5);
		
		// add to targetDiv
		jQuery('.targetDiv'+target).hide();
		console.log(jQuery('.btn.active:first'));
		jQuery('.btn.active:first').removeClass('active');
		
		// add active class to current tab
		jQuery($(this)).children(":first").addClass('active');
		
		// show the div
		jQuery('#div'+$(this).attr('target')).show();
	});
});

// Duck's codes modified from
// https://stackoverflow.com/questions/35427641/how-to-dynamically-set-the-active-class-in-bootstrap-navbar/35428555
$(document).ready(function () {
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
	var id = $(this).attr('id');
	$('#delInput').attr("value",id);
});

$('a.edit').click(function(){
	var src = $(this).attr('id');
	$('#modalImg').attr("src",src);
});

$('a.construction').click(function(){
	var src = $(this).attr('id');
	$('#constructionTitle').attr("value",src.substring(2));
});

$('input.fileID').change(function(){
	var name = this.value;
	var filename = name.replace(/C:\\fakepath\\/i, ': ');
	$(this).parent().find("span.imgName").text(filename);
});

$('a.input').click(function(){
	$(this).parent().find("input.fileID").click();
});