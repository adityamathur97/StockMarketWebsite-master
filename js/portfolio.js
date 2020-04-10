$(function(){
	/* have to insert data two seperate times currentPrice from api and rest from database.*/
	/*then calculate % change*/
	// data: {user: name}
	// for portfolio [[symbol,qty,price,currentPrice],]
	var usrName = $('#usern').text();
	console.log(usrName);
	$.ajax({
		type : "GET",
		url : "http://167.172.209.156/getportfolio.php",
		data: {user: usrName},
		dataType : "json",
		success : jsonParser
	});

	function jsonParser(data){
		console.log("Worked");
		var stock_data = '';
		for(var i=0; i<data.length; i++){
			var perChange =  (((data[i][3] - data[i][1])/data[i][1]) * 100).toFixed(2);
			if(perChange=='-100.00'){perChange = 'N/A '}
			stock_data = '<tr class="myrow"><td>' 
				+ data[i][0] + '</td><td>'
				+ data[i][3] + '</td><td>' 
				+ data[i][1] + '</td><td>'
				+ data[i][2] + '</td>';
				if(perChange>=0){
					stock_data = stock_data + '<td class="gcol">'+ perChange +'%</td></tr>';
				}else{
					stock_data = stock_data + '<td class="rcol">'+ perChange +'%</td></tr>';
				}
			$("tbody").append(stock_data);
			stock_data = '';
		}
	}
	// implement watchList sort................	
	// other stuff............
	/* Sorts table rows in Ascending Order depending upon which header is selected*/
	$(document).on('click', '.headers', function(){
		var header_name = $(this).text();
		console.log(header_name);
		if(header_name == 'Order No.')
			sortColumn(0);
		else if(header_name == 'Description')
			sortColumn(1);
		else if(header_name == 'Delivery Date (Y/M/D)')
			sortColumn(2);
		else
			sortColumn(3);
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

	      if(column == 0 || column == 3){
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