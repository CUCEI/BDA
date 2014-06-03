$(document).ready(function () {
	$("header").load('/template/menu.html', function(){
		seccion = $('header').attr('class');
		$('nav').find('li.' + seccion.split(' ')[1]).addClass('active')
	});
	$('#consulta').click(function(event) {

		$.getJSON( "ajax/clientes.php?llamada=consulta", function( data ) {

		var items = [], main = $("main"), i=0, textohtml = '';

		textohtml+= '<table class="table">';
		
		for( i=0; i < data.length; i++){
			textohtml+= '<tr>';

		  	textohtml+= '<td id="">' + data[i].id_cliente + '</td>';
		  	textohtml+= '<td id="">' + data[i].nombre + '</td>';
		  	textohtml+= '<td id="">' + data[i].telefono + '</td>';
		  	textohtml+= '<td id="">' + data[i].direccion + '</td>';
		  	textohtml+= '<td id="">' + data[i].nombre_contacto + '</td>';
		  	textohtml+= '<td id="">' + data[i].rfc + '</td>';

		    textohtml+= '</tr>';
		}
		 	
		textohtml+= '</table>';
		main.append(textohtml);
		});
	});
});