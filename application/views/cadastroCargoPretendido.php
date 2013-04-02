<div class="container-fluid">
      <div class="row-fluid">
        <?php echo $sidebarEtapas ?>
        <div class="span9">
          <?php echo isset($validation) ? $validation : '' ?>
          <form action="/curriculo/cadastrar/cargo-pretendido" id="frmCadastro" method="POST">
            <div class="well">
              <div>
                <h1>
                  Cargo pretendido
                </h1>
                Quais cargos você se propõe&nbsp;a ocupar dentro de uma empresa?
                Você pode escolher no
                <strong>
                  máximo três
                </strong>
                .
              </div>
              <div class="control-group">
              </div>
              <form>
                <div class="control-group">
                  <label for="textinput1">
                    Cargo 1:
                  </label>
                  <input name="input-cargo1" type="text">
                </div>
                <div class="control-group">
                  <label for="textinput3">
                    Cargo 2:
                  </label>
                  <input name="input-cargo2" type="text">
                </div>
                <div class="control-group">
                  <label for="textinput5">
                    Cargo 3:
                  </label>
                  <input name="input-cargo3" type="text">
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