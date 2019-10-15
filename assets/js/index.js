$('document').ready(function(){
	$('input[type="text"], input[type="class"], input[type="number"], select').focus(function(){
		var background = $(this).attr('id');
		$('#' + background + '-form').addClass('formgroup-active');
		$('#' + background + '-form').removeClass('formgroup-error');
	});
	$('input[type="text"], input[type="class"], input[type="number"], select').blur(function(){
		var background = $(this).attr('id');
		$('#' + background + '-form').removeClass('formgroup-active');
	});

function errorfield(field){
	$(field).addClass('formgroup-error');
}

$("#waterform").submit(function() {
	var stopsubmit = false;

	if($('#name').val() == "") {
		errorfield('#name-form');
		stopsubmit=true;
	}
	if($('#class').val() == "") {
		errorfield('#class-form');
		stopsubmit=true;
	}
	if($('#mobile').val() == "") {
		errorfield('#mobile-form');
		stopsubmit=true;
	}
	if($('#school').val() == "") {
		errorfield('#school-form');
		stopsubmit=true;
	}
	if($('#dept').val() == "") {
		errorfield('#dept-form');
		stopsubmit=true;
	}
	if($('#year').val() == "") {
		errorfield('#year-form');
		stopsubmit=true;
	}
	if($('#city').val() == "") {
		errorfield('#city-form');
		stopsubmit=true;
	}
	if($('#state').val() == "") {
		errorfield('#state-form');
		stopsubmit=true;
	}
	if(stopsubmit) 
		return false;
	else{
  	//  	var inputq1 = encodeURIComponent($('#name').val());
	// 	var inputq2 = encodeURIComponent($('#class').val());
	// 	var inputq3 = encodeURIComponent($('#mobile').val());
	// 	var inputq4 = encodeURIComponent($('#school').val());
	// 	var inputq5 = encodeURIComponent($('#city').val());
	//   	var q1ID = "entry.935151554";    
	//   	var q2ID = "entry.626358483";	  
	//   	var q3ID = "entry.480766998";	 
	//   	var q4ID = "entry.379400597";	  
	//   	var q5ID = "entry.1756221855";	  	  
	// 	var baseURL;
	// 	var submitRef = '&submit=Submit';
	// 	var submitURL = (baseURL + q1ID + "=" + inputq1 + "&" + q2ID + "=" + inputq2 + "&" + q3ID + "=" + inputq3 + "&" + q4ID + "=" + inputq4 + "&" +  q5ID + "=" + inputq5 +  submitRef);
	// 	$(this)[0].action=submitURL;
	// 		     //    alert("Response Submitted Successfully!");
	// 		     //    document.getElementById("waterform").reset();
	  // 
	}
});
});