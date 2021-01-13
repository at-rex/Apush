function validar(){

	var usuario, clave;


	usuario= document.getElementById("user").value;
	clave= document.getElementById("pass").value;


	if (usuario === "" || clave === "") {

		swal.fire({
			
			html: '<span class="alert"> Todos los campos con obligatorios! </span>',
			icon: 'error',
			customClass: 'sweetalert-sm',
		});
		
		return false;
	}

}


