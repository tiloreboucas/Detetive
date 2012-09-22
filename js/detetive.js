var Detetive = {
	CreateUser: function(){		
		$.mobile.changePage("#home");

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
	},

	Login: function(){
		$.mobile.changePage("#home");	
	},

	CreateGame: function(){
		$.mobile.changePage("#home");

		var name = $('#game_name').val();
		var senha = $('#game_senha').val();

		var ajaxUrl = 'ajax/CreateGame.php?name='+name+'&senha='+senha;

		$.ajax({
			url: ajaxUrl,
			success: function(data) {
				var result = eval(data);
				if(result) {	
					$.mobile.changePage("#CreateGame_sucesso", { 
						transition: "pop",
						role: "dialog"
					});
				} else {
					$.mobile.changePage("#CreateGame_falha", { 
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