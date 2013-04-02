    <div class="container-fluid">
      <div class="row-fluid">
        <?php echo $sidebarEtapas ?>
        <div class="span9">
          <?php echo isset($validation) ? $validation : '' ?>
          <form action="/curriculo/cadastrar/apresentacao" id="frmCadastro" method="POST">
            <div class="well">
              <div>
                <h1>
                  Apresentação
                </h1>
                Escreva uma breve apresentação. Fale sobre você e sobre a vaga que procura.
              </div>
              <div class="control-group">
              </div>
              <form>
                <div class="row-fluid">
                  <div class="span5">
                    <div class="control-group">
                    </div>
                    <div class="control-group">
                      <label for="textarea1">
                        Apresentação
                      </label>
                      <textarea id="text-area-cadastro" onkeyup="limitaTextarea(this.value)" required Minlength="10" Maxlength="250" name="input-apresentacao"><?php echo set_value('input-apresentacao') ?></textarea>
                      <?php echo form_error('input-apresentacao'); ?>
                      <br />
                      Você pode inserir mais <span id="contador"><?php echo isset($tamanho) ? $tamanho : '250' ?></span> caracteres.

                    </div>
                  </div>
                </div>
                  <a id="btn-form-cadastro" onclick='document.getElementById("frmCadastro").submit()' class="btn btn-success btn-large" >
                    Pronto! Próxima etapa
                  </a>
              </form>
            </div>
          </form>
          <hr>
          <div>
            © Só Currículo 2013
          </div>
        </div>
      </div>
    </div>