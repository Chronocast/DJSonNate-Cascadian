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
		jQuery('.btn.active:first').removeClass('active');
		
		// add active class to current tab
		jQuery($(this)).children(":first").addClass('active');
		
		// show the div
		jQuery('#div'+$(this).attr('target')).show();
	});
});

jQuery(function(){
	jQuery('input[id*=cmn-toggle]').click(function(){
		var idData = ($(this).attr('id'));
		var checkStatus = $(this).prop('checked');
		var target = idData.substring(idData.indexOf("toggle-")+7);
		
		$.post(
		   "./controller/acceptance-toggle-logic.php",
		   { track_id : target, checkStatus : checkStatus }
		);
		
		var cardParent = $(this).parent().closest('.card');
		if (checkStatus === true)
		{
			cardParent.addClass('card-1');
		} else {
			cardParent.removeClass('card-1');
		}
	});
});

jQuery(function(){
	jQuery('input[id*=punchlist-checkbox-]').click(function(){
		var dataID = ($(this).attr('value'));
		
		var targetID = dataID.substring(0, dataID.indexOf('-'));
		var targetValue = dataID.substring(dataID.indexOf('-') +1);
		
		$.post(
			"./controller/punchlist-toggle-logic.php",
		   { targetID : targetID, targetValue : targetValue }
		);
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


$('a.delete').click(function(){
	var name = $(this).attr('id');
	var type = name.substring(0,1);
	var typeID = name.substring(1, name.indexOf('-'));
	var trackingID = name.substring(name.indexOf('-') + 1);
	$('#delInput').attr("value",trackingID);
	$('#delTypeID').attr("value",typeID);
	$('#delType').attr("value",type);
});

$('a.construction').click(function(){
	var src = $(this).attr('id');
	$('#constructionTitle').attr("value",src.substring(2));
});

$('a.scheduling').click(function(){
	var src = $(this).attr('id');
	$('#schedulingTitle').attr("value",src.substring(2));
});

$('a.final').click(function(){
	var src = $(this).attr('id');
	$('#finalTitle').attr("value",src.substring(2));
});

$('input.fileID').change(function(){
	var name = this.value;
	var filename = name.replace(/C:\\fakepath\\/i, ': ');
	$(this).parent().find("span.imgName").text(filename);
});

$('a.input').click(function(){
	$(this).parent().find("input.fileID").click();
});



$('a.editScheduling').click(function(){
	var src = $(this).attr('id');
	var typeID = src.substring(0, src.indexOf('-'));
	$('.updateID').attr("value",typeID);
	
	var title = $(this).parent().siblings(".schedule-title").html();
	$('.worktype').attr("value",title);
	
	var quantity = $(this).parent().siblings(".schedule-quantity").html();
	$('.quantity').attr("value",quantity);
	
	var notes = $(this).parent().siblings(".schedule-notes").html();
	$('.notes').attr("value",notes);
});

$('a.editConstruction').click(function(){
	var src = $(this).attr('id');
	var typeID = src.substring(0, src.indexOf('-'));
	$('.updateConstructionID').attr("value",typeID);
	
	var targetParent = $(this).parent().siblings(".construction-info");
	var reportName = targetParent.children().eq(0).children('h5').html();
	$('.report-name').attr("value",reportName);
	
	var reportDate = targetParent.children().eq(0).children('p').html();
	$('.report-date').attr("value",reportDate);
	
	var test = targetParent.children().eq(1).children('p').html();
	
	var imgSrc = test.substring(10, test.indexOf('" '));
	$('.photo-construction-preview').attr("src",imgSrc);
	
	var details = test.substring(test.indexOf(">") +1);
	$('.details').val(details);
	
	
});