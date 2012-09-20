var Detetive = {
	CreateUser: function(){		
		var email = $('#CreateUser_email').val();
		var senha = $('#CreateUser_senha').val();

		var ajaxUrl = 'ajax/CreateUser.php?email='+email+'&senha='+senha;
		
		$.ajax({
			url: ajaxUrl,
			success: function(data) {
				var result = eval(data);
				if(result) {	
					$.mobile.changePage("#cadastro_sucesso", { 
						transition: "pop",
						role: "dialog"
					});
				} else {
					$.mobile.changePage("#cadastro_falha", { 
						transition: "pop",
						role: "dialog"
					});
				}
			}
		});
	}
};

// Validação CreateUser

$(document).ready(function(){
    $('#form_CreateUser').validate({
        rules:{
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true
            }
        },
        messages:{
            email: {
                required: "O campo email é obrigatorio.",
                email: "O campo email deve conter um email válido."
            },
            senha: {
                required: "O campo senha é obrigatorio."
            }
        } 
    });
});