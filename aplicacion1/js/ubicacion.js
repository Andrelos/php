var cambio = document.getElementById('localidad');
document.getElementById('localidad').value = 1;
validarLocalidad(1);

function validarLocalidad ( prov ){
	

	if( prov == 0 ){
		cambio.disabled = 'asd';
		return;	
	} 

	var archivos = [ null, 'bsas.php?t=', 'capital.html', 'stafe.html', 'cdba.html' ];

	var ajax = new XMLHttpRequest();
	var url= archivos[ prov ];
	ajax.open( 'GET',  "Argentina.php?t=" + prov, true );
	//alert (url);
	ajax.onreadystatechange = function(){
		if( ajax.status == 200 && ajax.readyState == 4 ){
			cambio.disabled = null;
			cambio.innerHTML=ajax.responseText;
		} 
	}
	ajax.send();
	cambio.innerHTML='<option>cargando...</option>';
}

