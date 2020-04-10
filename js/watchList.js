$(function(){
	/* have to insert data two seperate times currentPrice from api and rest from database.*/
	/*then calculate % change*/
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
		if(data[0][1]==null){$('#cprice').append('Market closed');}
		else {$('#cprice').append(data[0][1]);}
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
					url : "http://167.172.209.156/histData.php",
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