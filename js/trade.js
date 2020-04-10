var usrName = $('#usrName').text();
$(function(){
	/* have to insert data two seperate times currentPrice from api and rest from database.*/
	/*then calculate % change*/
	$('#qty').val(0);
	$('#repeat').val(0);
	$('#proceed').hide();

	var currPrice = 0;

	function getPrice(data){
		console.log("Get Price Worked");
		currPrice = data[0][1];
	}

	function xmlParser2(json){

	}

	$('#add').click(function(){
		var symbol = $('#stockSymbol').val();
		var trans = $('#transMode').val();
		var qty = $('#qty').val();
		var date = $('#date').val();
		var repeat = $('#repeat').val();

		if(symbol != ''  && qty > 0){
			//getting current price of stock
			console.log('Before get price call');
			$.ajax({
				type : "GET",
				url : "http://167.172.209.156/getquotes.php",
				async: false,
				data:{symbols: symbol},
				dataType : "json",
				success : getPrice
			});

			if(date != ''){
				// ajax call with date on success fill table
				// $.ajax({
				// 	type : "GET",
				// 	url : "http://167.172.209.156/trade.php",
				// 	data: {symbol: symbol, mode: trans, qty: qty, date: date, recur: repeat},
				// 	dataType : "json",
				// 	success : xmlParser2
				// });
			}else{
				//ajax call without date
				$('#repeat').val(0);
				// $.ajax({
				// 	type : "GET",
				// 	url : "http://167.172.209.156/trade.php",
				// 	data: {symbol: symbol, mode: trans, qty: qty},
				// 	dataType : "json",
				// 	success : xmlParser2
				// });
			}	
		}

		// add rows to table....
		
		var stock_data = '<tr class="myrow"><td>' 
				+ symbol + '</td><td>'
				+ trans + '</td><td>'
				+ qty + '</td><td>'
				+ currPrice + '</td><td>'
				+ date + '</td><td>' 
				+ repeat + '</td><td>'
				+'<button class="delete"><strong>x</strong></button></td></tr>';

		$('tbody').append(stock_data);
		$('#proceed').show();
	});

	$(document).on('click', '.delete', function(){
		$(this).closest('tr').remove();
	});

	var arr = [];

	function tradefunc(data){ // put data inside ()
		console.log("tradefunc worked");
	}

	$('#proceed').click(function(){
		$('.myrow').each(function(){
			$(this).find('td').each(function(){
				arr.push($(this).text());
			});
			console.log(arr);
			var symbol = arr[0];
			var trans = arr[1];
			var qty = arr[2];
			var price = arr[3]
			var date = arr[4];
			var repeat = arr[5];
			$.ajax({
					type : "GET",
					url : "http://167.172.209.156/dotrade.php",
					data: {user: usrName,symbol: symbol, mode: trans, qty: qty,price: price, date: date, recur: repeat},
					dataType : "json",
					success : tradefunc
			});
			arr = [];	
		});

		$('tbody').empty();
		$('#proceed').hide();
	});




















	$('#currPrice').hide();

	function xmlParser(xml){
		console.log("this is xml parser");
		$(xml).find('stock').each(function(){
			var tickerSymbolText = $(this).find('tickerSymbol').text();

			var newrow = '<option value="'+ tickerSymbolText +'">';
			$("datalist").append(newrow);
		});
	}

	$.ajax({
		type : "GET",
		url : "xml/stockList.xml",
		dataType : "xml",
		success : xmlParser
	});

	function getQuotesParser(data){
		console.log("Get Quotes Worked");
		console.log(data[0][1]);
		$('#cprice').append(data[0][1]);
	}

	function getHistDataParser(data){
		console.log("Hist Data Worked");
		$('tbody').empty();
		console.log(data);
		var stock_data = '';
		var i = 0;
		console.log(data.length);
		for(i=0; i<data.length; i++){
			stock_data = '<tr class="myrow"><td>' 
				+ data[i][0] + '</td><td>' 
				+ data[i][1] + '</td></tr>';
			$("tbody").append(stock_data);
		}
	}

	function clearAll(){
		$('#currPrice').hide();
		$('tbody').empty();
		$('#cprice').empty();
		$('#symbol').val(null);
		$('#sDate').val(null);
		$('#eDate').val(null);
		$('#freq').val(0);
	}

	$('#reset').click(function(){
		clearAll();
	});

	$('#submit').click(function(){
		var symbol = $('#symbol').val();
		var startDate = $('#sDate').val();
		var endDate = $('#eDate').val();
		var freq = $('#freq').val();
		var startDateEpoch = Math.round(new Date(startDate).getTime() / 1000.0);
		var endDateEpoch = Math.round(new Date(endDate).getTime() / 1000.0);
		console.log(symbol);
		console.log(startDate);
		console.log(freq);
		if(symbol != ""){
			$('#cprice').empty();
			//$('tbody').empty();
			$('#currPrice').show();
			if(startDate != "" && freq != "Select" && endDate != ""){
				$.ajax({
					type : "GET",
					url : "http://167.172.209.156/getquotes.php",
					data: {symbols : symbol},
					dataType : "json",
					success : getQuotesParser
				});

				$.ajax({
					type : "GET",
					url : "http://167.172.209.156/hist_data.php",
					data: {period1: startDateEpoch, period2: endDateEpoch, symbol: symbol, frequency: freq},
					dataType : "json",
					success : getHistDataParser
				});			
			}else{
				console.log("First Break!");
				$('#sDate').val(null)
				$('#eDate').val(null);
				$('#freq').val(0);

				$.ajax({
					type : "GET", //in php file isset _GET method implement
					url : "http://167.172.209.156/getquotes.php",
					data: {symbols : symbol},
					dataType : "json",
					success : getQuotesParser
				});				
			}
		}

	});

	$(document).on('click', '.headers', function(){
		var header_name = $(this).text();
		console.log(header_name);//2 and 3 (0,1)column in sort function
		if(header_name == 'Date')
			sortColumn(0);
		else
			sortColumn(1);
	});

	function sortColumn(column) {
	  var table, rows, switching, i, a, b, switch_flag;
	  table = document.getElementById("my_table");
	  switching = true;
	  
	  while (switching) {

	    switching = false;
	    rows = table.rows;
	    
	    for(i = 1; i < (rows.length - 1); i++){
	      
	      switch_flag = false;
	      
	      a = rows[i].getElementsByTagName('td')[column];
	      b = rows[i + 1].getElementsByTagName('td')[column];

	      if(column == 1){
	      	if(Number(a.innerHTML.toLowerCase()) > Number(b.innerHTML.toLowerCase())){
	        	switch_flag = true;
	        	break;
	      	}
	      }
	      else{
	      	if(a.innerHTML.toLowerCase() > b.innerHTML.toLowerCase()){
	        	switch_flag = true;
	        	break;
	      	}
	      }
	    }
	    if(switch_flag){
	    	rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
	      	switching = true;
	    }
	  }
	}
	/* Searches entire table for particular value and shows all the rows containing that value*/
	function filterTable(value){
		$('#my_table .myrow').each(function(){
			var found = 'false';
			$(this).each(function(){
				if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
					found = 'true';
				}
			});
			if(found == 'true'){
				$(this).show();
			}
			else{
				$(this).hide();
			}
		});
	}

	$('#filter').keyup(function(){
		filterTable($(this).val());
	});

});