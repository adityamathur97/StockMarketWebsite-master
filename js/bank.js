
	var usrName = $('#usern').text();
	$(function(){

	
	$.ajax({
			type : "GET",
			url : "http://167.172.209.156/bankname.php",
			data: {user: usrName},
			// send username from session......
			dataType : "json",
			success : updateTable
	});
	//[[bankname,account,routnumber],...]
	function updateTable(data){

		for(var i=0; i<data.length; i++){
			var newRow = '<tr class="myrow"><td>' 
				+ data[i][0] + '</td><td>'
				+ data[i][1] + '</td><td>' 
				+ data[i][2] + '</td></tr>';
			var newRow2 = '<option value="'+ data[i][0] +'">'+data[i][0]+'</option>';
			$('tbody').append(newRow);
			$('#banks').append(newRow2);
		}

		// add for loop addBank herer
	}
	// this is previous way to add bank names to select option......
	// $.ajax({
	// 		type : "GET",
	// 		url : "scripts/bankname.php",
	// 		// send username from session......
	// 		dataType : "json",
	// 		success : addBank
	// });
	// // [[bankname1,acc,rout], bankname2,......]

	// function addBank(data) {
	// 	for(var i=0; i<data.length; i++){
	// 		var newRow = '<option value="'+ data[i][0] +'">'+data[i][0]+'</option>';
	// 		$('#banks').append(newRow);
	// 	}
	// }

	$('#makeTrans').click(function(){
		//ajax call to transfer mooney....
		var bankName = $('#banks').val();
		var transMode = $('#mode').val();
		var amount = $('#amount').val();
		console.log(bankName);
		console.log(transMode);
		console.log(amount);

		if(transMode == '-'){
			amount = -1 * amount;
			console.log(amount);
		}

		$.ajax({
				type : "GET",
				url : "http://167.172.209.156/setbal.php",
				data: {user: usrName,add: amount}, // add indivisual user name for ajax call
				dataType : "json",
				success : sample
		});

	});

	function sample(data){

	}

	$('#addBank').click(function(){
		$(this).hide();
		var inputs = '<div class="form-group">'
		+'<label for="bankName"><strong>Bank Name:</strong>'
              +'<input type="text" class="form-control myclass" id="bankName" name="bankName" minlength="1" style="max-width: 1000px;>'
            +'</label>'
        +'</div>'

        +'<div class="form-group">'
            +'<label for="accNumber"><strong>Account Number:</strong>'
              +'<input type="number" class="form-control myclass" id="accNumber" name="accNumber" style="max-width: 1000px;>'
            +'</label>'
        +'</div>'

        +'<div class="form-group">'
            +'<label for="routNumber"><strong>Routing Number:</strong>'
              +'<input type="number" class="form-control myclass" id="routNumber" name="accNumber" style="max-width: 1000px;>'
            +'</label>'
        +'</div>'

        +'<button class="addBankDetail btn btn-success">ADD</button>';

        $('.bankInfo2').append(inputs);

	});

	$(document).on('click', '.addBankDetail', function(){
		// ajax call with data.... get data from input and pass to call
		var bankName = $('#bankName').val();
		var accountNumber = $('#accNumber').val();
		var routingNumber = $('#routNumber').val();

		console.log(bankName);
		console.log(accountNumber);
		console.log(routingNumber);

		$.ajax({
				type : "GET",
				url : "http://167.172.209.156/addaccount.php",
				data: {user: usrName, name: bankName, account: accountNumber, routing: routingNumber}, // add indivisual user name for ajax call
				dataType : "json",
				success : sample
		});

		$('.bankInfo2').empty();
		alert("Bank Added Successfully!");
		$('#addBank').show();
		
	});

});