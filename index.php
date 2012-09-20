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
    
    <link href="css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
    <link href="css/jquery.mobile-1.1.1.min.css"  rel="stylesheet" />
  </head>
  <body>
    <!-- Home -->
    <div data-role="page" id="home">
      <div data-role="header" data-position="fixed">
        <h1>Detetive</h1>
        <a href="#cadastro" data-icon="plus" class="ui-btn-right">Novo</a>
      </div>
      <div data-role="content">
        <h2>Bem-Vindo!</h2>    
        <form action="" method="post">
          <ul data-role="listview">
            <li>
              <div data-role="fieldcontain">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="" placeholder="Email"/>
              </div>
            </li>
            <li>
              <div data-role="fieldcontain">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" value="" placeholder="Senha"/>
              </div>
            </li>
            <li>
              <button type="submit">Login</button>          
            </li>
          </ul>
        </form>
      </div>
      <div data-role="footer" data-position="fixed"></div>
    </div>

    <!-- Cadastro de Usuário -->
    <div data-role="page" id="cadastro">
      <div data-role="header" data-position="fixed">
        <a href="#home" data-icon="home">Home</a>
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
        <a href="#home" data-role="button" data-icon="home">entrar</a>
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
        <a href="#cadastro" data-role="button">Esqueci minha senha</a>
        <a href="#cadastro" data-role="button">Tentar com outro email</a>
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