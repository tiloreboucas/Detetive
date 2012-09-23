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

	isLogged: {
		status: false,
		userId: null,
		userEmail: null,
		userName: null,
		roomID: null
	}, 

	Login: function(){
		var email = $('#login_email').val();
		var senha = $('#login_senha').val();

		var ajaxUrl = 'ajax/UserLogin.php?email='+email+'&senha='+senha;

		$.ajax({
			url: ajaxUrl,
			success: function(data) {
				var result = eval(data);
				
				if(result.length > 0) {
					Detetive.isLogged.status = true;
					Detetive.isLogged.userId = result[0].id;
					Detetive.isLogged.userEmail = result[0].email;
					Detetive.isLogged.userName = result[0].name;

					$.mobile.changePage("#home");
				} else {
					// Não Logou
				}
			}
		});	
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
				if(result[0].status) {
					var href = "#GameRoom?id=" + result[0].id;

					$("#CreateGame_sucesso #CreateGame_sucesso_btEntrar").attr("href", href);

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
	},

	GameList: {
		start: function(){
			Detetive.GameList.getGameList();
		},

		getGameList: function(){
			var ajaxUrl = 'ajax/getGameList.php';

			$.ajax({
				url: ajaxUrl,
				success: function(data) {
					var result = eval(data);
					var str = "";

					if(result) {
						$(result).each(function(i, item){
							str += "<li><a href='#GameRoom?id="+item.id+"'>"+item.id+" - "+item.name+"</a></li>"		
						});

						$('#ListaPartidas').append(str).listview('refresh');	
					}
				}
			});	
		},

		stop: function() {
			$('#ListaPartidas').empty();	
		}
	},

	getURLPar: function(url, name){
		var pars = url.split("?")[1];
		var itens = pars.split("&");

		var r = null;
		
		$(itens).each(function(i, item){
			current = pars.split("=");
			if(current[0] == name) {
				r = current[1];
			}
		});

		return r;
	},

	ShowGameRoom: function(){
		var RoomID = Detetive.getURLPar($("#GameRoom").attr("data-url"), "id");
		var ajaxUrl = 'ajax/ShowGameRoom.php?id='+RoomID;	
		
		$.ajax({
			url: ajaxUrl,
			success: function(data) {
				var result = eval(data);
				var page = result[0];

				$("#GameRoom h2").html(page.name);

				var str = "";
				var players = eval(page.players);

				if(players) {
					$(players).each(function(i, item){
						str += "<li>"+item.email+"</li>";		
					});

					$("#GameRoom #ListaJogadores").html(str).listview('refresh');	
				}

				$("#GameRoom_btParticipar").show().click(function(){
					if(!Detetive.isLogged.roomID){
						//var ajaxUrl = 'ajax/ShowGameRoom.php?';
						/*var str = "<li>"+Detetive.isLogged.userEmail+"</li>";
						$("#GameRoom #ListaJogadores").append(str).listview('refresh');	
						Detetive.isLogged.roomID = RoomID;
						$("#GameRoom_btParticipar").button('disable');
						*/
					}
				});;
			}
		});		
	} 
};

// Validação CreateUser

$(document).ready(function(){
	if(Detetive.isLogged.status) {
		$.mobile.changePage("#home");	
	} else {
		$.mobile.changePage("#PageLogin");
	}

	/* Validação Form Create User */
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

    /* Home */
    $('#home').live('pageshow',function(event, ui){
		if(Detetive.isLogged.status){

		} else {
			$.mobile.changePage("#PageLogin");
		}	
	});

    /* GameList */
    $('#GameList').live('pageshow',function(event, ui){
		Detetive.GameList.start();	
	});

	$('#GameList').live('pagehide',function(event, ui){
		Detetive.GameList.stop();
	});

	/* Game Room */
	$('#GameRoom').live('pageshow',function(event, ui){
		Detetive.ShowGameRoom();
	});

	$('#GameRoom').live('pagehide',function(event, ui){
		$("#GameRoom h2").empty();
		$("#GameRoom #ListaJogadores").empty();
	});

	/* Page Login */
	$('#PageLogin').live('pageshow',function(event, ui){
		if(Detetive.isLogged.status){ $.mobile.changePage("#home"); }
	});
});