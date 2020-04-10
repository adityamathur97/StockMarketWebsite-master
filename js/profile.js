
function loaddata(){
	var usrName = $('#usrName').text();
var firstName = $('#fName2').val();
var lastName = $('#lName2').val();
var email = $('#email2').val();
var mobile = $('#mobile2').val();
var address = $('#address2').val();
var auth = $('#authkey').val();

console.log("doing this"  );
$.ajax({
	type : "GET",
	url : "http://167.172.209.156/getprofile.php",
	data: {user: usrName},
	dataType : "json",
	success : jsonParser
});


$.ajax({
	type : "GET",
	url : "http://167.172.209.156/getbal.php",
	data: {user: usrName},
	dataType : "json",
	success : getBalance
});

function getBalance(data){
	$('#balance').append(data[0][0]);
}


$('.myform').css('display', 'none');
$(this).css('display', 'none');

$('.details').css('display', 'block');
$('#edit').css('display', 'block');
}
function jsonParser(data){
	$('#fName').empty();
	$('#lName').empty();
	$('#email').empty();
	$('#mobile').empty();
	$('#address').empty();

	$('#fName').append(data[0][0]);
	$('#lName').append(data[0][1]);
	$('#email').append(data[0][2]);
	$('#mobile').append(data[0][3]);
	$('#address').append(data[0][4]);		
}

$(function(){

	$('.myform').submit(function (e) {
                e.preventDefault()  // prevent the form from 'submitting'
                save();
    });

	// function isEmail(email) {
	//   var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	//   if(!regex.test(email)) {
	//     return false;
	//   }else{
	//     return true;
	//   }
	// }

	// function isPhoneNumber(number){
	// 	//right regex here.............
	// 	var regex = /^\d{10}$/;
	// 	if(!regex.test(number)){
	// 		return false;
	// 	}else{
	// 		return true;
	// 	}
	// }

	$('#edit').click(function(){
		$('.details').css('display', 'none');
		$(this).css('display', 'none');
		$('#fName2').val($('#fName').text());
		$('#lName2').val($('#lName').text());
		$('#email2').val($('#email').text());
		$('#mobile2').val($('#mobile').text());
		$('#address2').val($('#address').text());
		$('.myform').css('display', 'block');
		$('#save').css('display', 'block');
	});

	function jsonParser(data){
		$('#fName').empty();
		$('#lName').empty();
		$('#email').empty();
		$('#mobile').empty();
		$('#address').empty();

		$('#fName').append(data[0][0]);
		$('#lName').append(data[0][1]);
		$('#email').append(data[0][2]);
		$('#mobile').append(data[0][3]);
		$('#address').append(data[0][4]);		
	}

function save(){	
		var usrName = $('#usrName').text();
		var firstName = $('#fName2').val();
		var lastName = $('#lName2').val();
		var email = $('#email2').val();
		var mobile = $('#mobile2').val();
		var address = $('#address2').val();

		$.ajax({
			type : "GET",
			url : "http://167.172.209.156/setprofile.php",
			data: {Username: usrName, fname: firstName, lname: lastName, EmailID: email, Mobileno: mobile, address: address, Update: 'True'},
			dataType : "text",
			success : console.log
		});

		$.ajax({
			type : "GET",
			url : "http://167.172.209.156/getprofile.php",
			data: {user: usrName},
			dataType : "json",
			success : jsonParser
		});

		$('.myform').css('display', 'none');
		$(this).css('display', 'none');
		
		$('.details').css('display', 'block');
		$('#edit').css('display', 'block');
	}

});