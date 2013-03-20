<div class="hero-unit hero">
      <div>
        <h1>
          Cadastre seu currículo grátis!
        </h1>
        <p>
          Quer mudar de vida?&nbsp;Cadastre seu currículo e receba ofertas de empresas
          em todo Brasil. É rápido fácil e completamente grátuito.
        </p>
      </div>
      <?php
      
        $link = heading('Quero cadastrar meu currículo agora!', 4, 'style="text-align: center"');

        echo(anchor('/curriculo/cadastrar/informacoes-basicas', $link, 'class="btn btn-primary btn-large"'));

      ?>
    </div>
    <div>
      <h3 style="text-align: center;">
        O cadastro de currículo mais rápido e efeiciante da internet brasileira!
      </h3>
    </div>
    <div class="container">
      <div class="well login-index-form">
        <div>
          <h1>
            Já é cadastrado?
          </h1>
          <p>
            Quer atualizar seu currículo ou responder a uma proposta? Utilize os campos
            abaixo para logar.
          </p>
        </div>
        <form>
          <div class="control-group">
            <label for="textinput1">
              <strong>
                Email
              </strong>
            </label>
            <input id="text-element-email" name="textinput1" type="email" placeholder="exemplo@exemplo.com.br">
          </div>
          <div class="control-group">
            <label for="textinput2">
              <strong>
                Senha
              </strong>
            </label>
            <input id="text-element-senha" name="textinput2" type="password" class="text-element">
          </div>
          <a class="btn btn-primary btn-large btn-entrar" href="#">
            Entrar
          </a>
        </form>
      </div>
      <div class="control-group">
      </div>
      <div class="btn-group">
      </div>
    </div>