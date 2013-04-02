    <div class="container-fluid">

      <div class="row-fluid">
        <?php echo $sidebarEtapas ?>
        <div class="span9">
          <?php echo isset($validation) ? $validation : '' ?>
          <form action="/curriculo/cadastrar/informacoes-basicas" method="POST" id="frmCadastro">
            <div class="well">
              <div>
                <h1>
                  Informações do sistema
                </h1>
                Quando uma empresa entrar em contato com você, precisamos saber para onde
                vamos enviar as mensagens.
              </div>
              <div class="control-group">
              </div>
              <form>
                <div class="control-group">
                  <label for="textinput2">
                    Nome
                  </label>
                  <input name="input-nome" type="" value="<?php echo set_value('input-nome') ?>" placeholder="Nome completo" class="inputform">
                  <?php echo form_error('input-nome'); ?>
                </div>
                <div class="control-group">
                  <label for="textinput3">
                    Email
                  </label>
                  <input id="inputemail" name="input-email" value="<?php echo set_value('input-email') ?>" required type="email" placeholder="Email">
                  <?php echo form_error('input-email'); ?>
                </div>
                <div class="control-group">
                  <label for="textinput4">
                    Senha
                  </label>
                  <input id="inputsenha" name="input-senha" type="password">
                  <?php echo form_error('input-senha'); ?>
                </div>
                <input type="submit" value="Pronto! Próxima etapa" class="btn btn-success btn-large btn-form-cadastro">
                  
                </a>
              </form>
            </div>
          </form>
          <hr>
      </div>
    </div>