<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <title>Detetive</title>

    <link rel="apple-touch-icon" href="/custom_icon.png"/>
    <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="touch-icon-iphone4.png" />
    
    <link href="css/detetive.css" rel="stylesheet" />
    <link href="css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
    <link href="css/jquery.mobile-1.1.1.min.css"  rel="stylesheet" />
  </head>
  <body>
    <!-- Login -->
    <div data-role="page" id="PageLogin">
      <div data-role="header" data-position="fixed">
        <h1>Detetive</h1>
        <a href="#cadastro" data-icon="plus" class="ui-btn-right">Novo</a>
      </div>
      <div data-role="content">
        <h2>Login</h2>    
        <form action="javascript:Detetive.Login();" id="form_login" method="post">
          <ul data-role="listview">
            <li>
              <div data-role="fieldcontain">
                <label for="login_email">Email:</label>
                <input type="text" name="login_email" id="login_email" value="" placeholder="Email"/>
              </div>
            </li>
            <li>
              <div data-role="fieldcontain">
                <label for="login_senha">Senha:</label>
                <input type="password" name="login_senha" id="login_senha" value="" placeholder="Senha"/>
              </div>
            </li>
            <li>
              <button id="btLogin" type="submit">Login</button>          
            </li>
          </ul>
        </form>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Cadastro de Usuário -->
    <div data-role="page" id="cadastro">
      <div data-role="header" data-position="fixed">
        <a href="#PageLogin" data-icon="home">Login</a>
        <h1>Detetive</h1>
      </div>
      <div data-role="content">
        <h2>Cadastro</h2>    
        <form action="javascript:Detetive.CreateUser();" method="post" id="form_CreateUser">
          <ul data-role="listview">
            <li>
              <div data-role="fieldcontain">
                <label for="email">Email:</label>
                <input type="email" name="email" id="CreateUser_email" value="" placeholder="Email"/>
              </div>
            </li>
            <li>
              <div data-role="fieldcontain">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="CreateUser_senha" value="" placeholder="Senha"/>
              </div>
            </li>
            <li>
              <button type="submit" name="CreateUser" value="CreateUser">Salvar</button>          
            </li>
          </ul>
        </form>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Confirmação de Cadastro de Usuário -->
    <div data-role="page" data-transition="pop" id="cadastro_sucesso">
      <div data-role="header" data-position="fixed">
        <h1>Detetive</h1>
      </div>
      <div data-role="content">
        <h2>Parabéns!</h2>    
        <p>Cadastro efetuado com sucesso!</p>
        <a href="#PageLogin" data-role="button" data-icon="home">entrar</a>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Falha de Cadastro de Usuário -->
    <div data-role="page" data-transition="pop" id="cadastro_falha">
      <div data-role="header" data-position="fixed">
        <h1>Detetive</h1>
      </div>
      <div data-role="content">
        <h2>Atenção!</h2>    
        <p>Já existe uma conta cadastra com esse email!</p>
        <a href="#esqueciSenha" data-role="button">Esqueci minha senha</a>
        <a href="#cadastro" data-role="button">Tentar com outro email</a>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Home -->
    <div data-role="page" id="home">
      <div data-role="header" data-position="fixed">
        <h1>Detetive</h1>
        <a href="#perfil" data-icon="gear" class="ui-btn-right">Perfil</a>
      </div>
      <div data-role="content">
        <h2>Home</h2>    
        <ul data-role="listview">
          <li><a href="#criarPartida" data-role="button" data-icon="plus">Criar uma partida</a></li>
          <li><a href="#GameList" data-role="button" data-icon="search">Entrar em uma partida</a></li>  
        </ul>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Criar Partida -->
    <div data-role="page" id="criarPartida">
      <div data-role="header" data-position="fixed">
        <a href="#home" data-role="button" data-icon="home">Home</a>
        <h1>Detetive</h1>
        <a href="#perfil" data-icon="gear" class="ui-btn-right">Perfil</a>
      </div>
      <div data-role="content">
        <h2>Criar Partida</h2>    
        <form action="javascript:Detetive.CreateGame();" method="post" id="form_CreateGame">
          <ul data-role="listview">
            <li>
              <div data-role="fieldcontain">
                <label for="game_name">Nome da Partida:</label>
                <input type="text" name="game_name" id="game_name" value="" placeholder="Nome da Partida"/>
              </div>
            </li>
            <li>
              <div data-role="fieldcontain">
                <label for="game_senha">Senha:</label>
                <input type="password" name="game_senha" id="game_senha" value="" placeholder="Senha"/>
              </div>
            </li>
            <li>
              <button type="submit" name="CreateGame" value="CreateGame">Criar</button>          
            </li>
          </ul>
        </form>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>
    
    <!-- Confirmação de Cadastro de Partida -->
    <div data-role="page" data-transition="pop" id="CreateGame_sucesso">
      <div data-role="header" data-position="fixed">
        <h1>Detetive</h1>
      </div>
      <div data-role="content">
        <h2>Parabéns!</h2>    
        <p>Partida criada com sucesso!</p>
        <a href="#GameRoom" id="CreateGame_sucesso_btEntrar" data-role="button" data-icon="home">entrar</a>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Falha de Cadastro de Partida -->
    <div data-role="page" data-transition="pop" id="CreateGame_falha">
      <div data-role="header" data-position="fixed">
        <h1>Detetive</h1>
      </div>
      <div data-role="content">
        <h2>Atenção!</h2>    
        <p>Já existe uma partida com esse nome!</p>
        <a href="#GameList" data-role="button">Entrar em uma partida</a>
        <a href="#criarPartida" data-role="button">Tentar com outro nome</a>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Game Room -->
    <div data-role="page" id="GameRoom">
      <div data-role="header" data-position="fixed">
        <a href="#home" data-role="button" data-icon="home">Home</a>
        <h1>Detetive</h1>
        <a href="#perfil" data-icon="gear" class="ui-btn-right">Perfil</a>
      </div>
      <div data-role="content">
        <h2></h2>
        <h4>Jogadores</h4>    
        <ul data-role="listview" data-inset="true" id="ListaJogadores"></ul>
        <button style="display: none;" id="GameRoom_btParticipar" data-role="button" data-icon="check">Participar</button>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Lista de Partidas -->
    <div data-role="page" id="GameList">
      <div data-role="header" data-position="fixed">
        <a href="#home" data-role="button" data-icon="home">Home</a>
        <h1>Detetive</h1>
        <a href="#perfil" data-icon="gear" class="ui-btn-right">Perfil</a>
      </div>
      <div data-role="content">
        <h2>Escolha uma Partida</h2>    
        <ul data-role="listview" id="ListaPartidas" data-filter="true"></ul>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile-1.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/detetive.js"></script>
  </body>
</html>