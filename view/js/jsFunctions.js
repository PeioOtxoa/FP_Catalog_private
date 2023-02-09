document.addEventListener("DOMContentLoaded", function (event) {
	
	loadFamilies();

	document.getElementById("cmbFamily").addEventListener("change",showCycles);
		  	
});  	

function loadFamilies()
{
	var url = "controller/cFamily.php";

	fetch(url, {
	  method: 'GET', 
	})
	.then(res => res.json()).then(result => {
	
		console.log(result.list);
		
		var families=result.list;
   		
		var newRow ="";
   		
   		for (let i = 0; i < families.length; i++) {
							
			newRow += "<option value='"+families[i].cod_familia+"'>"+families[i].nom_familia_eu+" / "+families[i].nom_familia_es+"</option>";	
		}  		 
		document.getElementById("cmbFamily").innerHTML=newRow;  	
	})
	.catch(error => console.error('Error status:', error));	
}

function showCycles()
{
	var cod_familia=this.value;
	
	var url = "controller/cCycles.php";
	var data = { 'cod_familia':cod_familia};

	fetch(url, {
	  method: 'POST', // or 'POST'
	  body: JSON.stringify(data), // data can be `string` or {object}!
	  headers:{'Content-Type': 'application/json'}  //input data
	  
	})
	.then(res => res.json()).then(result => {
	
		console.log(result.list);
		
		var cycles=result.list;
   		
		var newRow ="";	       		
   		for (let i = 0; i < cycles.length; i++) {
							
			newRow += "<option value='"+cycles[i].cod_ciclo+"'>"+cycles[i].nom_ciclo_eu+" / "+cycles[i].nom_ciclo_es+"</option>";	
		}	       		
   		document.getElementById("cmbCycle").innerHTML=newRow;
		document.getElementById("cmbCycle").addEventListener("change",showOffers); 
	})
	.catch(error => console.error('Error status:', error));	
}

function showOffers()
{
	var cod_ciclo=this.value;
	console.log(cod_ciclo);
	
	var url = "controller/cOfferCycle.php";
	var data = { 'cod_ciclo':cod_ciclo};

	fetch(url, {
	  method: 'POST', // or 'POST'
	  body: JSON.stringify(data), // data can be `string` or {object}!
	  headers:{'Content-Type': 'application/json'}  //input data
	  
	})
	.then(res => res.json()).then(result => {
       		
		console.log(result.list);
		
		var offers=result.list;
   		
   		var newRow ="<table border=2>";
		newRow +="<tr><th>School</th><th>Town</th><th>Territory</th><th>Model</th><th>Turn</th></tr>";
   		
   		for (let i = 0; i < offers.length; i++) {
										
			newRow += "<tr>" 
								+"<td>"+offers[i].objCentro.nom_centro+"</td>"
								+"<td>"+offers[i].objCentro.municipio+"</td>"
								+"<td>"+offers[i].objCentro.territorio+"</td>"
								+"<td>"+offers[i].modelo+"</td>"	
								+"<td>"+offers[i].turno+"</td>"	
							+"</tr>";	
		}
   		newRow +="</table>";   
   		
   		document.getElementById("schoolOffer").innerHTML=newRow;

   				  		
	})
	.catch(error => console.error('Error status:', error));	
}


