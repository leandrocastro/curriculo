<div class="container-fluid">
      <div class="row-fluid">
        <?php echo $sidebarEtapas ?>
        <div class="span9">
          <form action="/curriculo/cadastrar/localizacao" id="frmCadastro" method="POST">
            <div class="well">
              <div>
                <h1>
                  Localização
                </h1>
                Onde você mora?
              </div>
              <div class="control-group">
              </div>
              <form>
                <div class="control-group">
                </div>
                <div class="control-group">
                  <label for="textinput1">
                    CEP
                  </label>
                  <input id="input-cep" name="input-cep" type="" placeholder="cep">
                </div>
                <div class="control-group">
                  <label for="textinput3">
                    Cidade
                  </label>
                  <input id="input-cidade" name="input-cidade" type="text" placeholder="São Paulo">
                </div>
                <div class="control-group">
                </div>
                <div class="control-group">
                  <label for="selectinput1">
                    Estado
                  </label>
                  <select id="select-estado" name="input-estado">
                      <option value="AC">Acre AC</option>
                      <option value="AL">Alagoas AL</option>
                      <option value="AP">Amapá AP</option>
                      <option value="AM">Amazonas AM</option>
                      <option value="BA">Bahia BA</option>
                      <option value="CE">Ceará CE</option>
                      <option value="DF">Distrito Federal DF</option>
                      <option value="GO">Goiás GO</option>
                      <option value="ES">Espírito Santo ES</option>
                      <option value="MA">Maranhão MA</option>
                      <option value="MT">Mato Grosso MT</option>
                      <option value="MS">Mato Grosso do Sul MS</option>
                      <option value="MG">Minas Gerais MG</option>
                      <option value="PA">Pará PA</option>
                      <option value="PB">Paraiba PB</option>
                      <option value="PR">Paraná PR </option>
                      <option value="PE">Pernambuco PE</option>
                      <option value="PI">Piauí PI</option>
                      <option value="RJ">Rio de Janeiro RJ</option>
                      <option value="RN">Rio Grande do Norte RN</option>
                      <option value="RS">Rio Grande do Sul RS</option>
                      <option value="RO">Rondônia RO</option>
                      <option value="RR">Rorâima RR</option>
                      <option value="SP">São Paulo SP</option>
                      <option value="SC">Santa Catarina SC</option>
                      <option value="SE">Sergipe SE</option>
                      <option value="TO">Tocantins TO</option>
                  </select>
                </div>
                <div class="control-group">
                  <label for="textinput5">
                    Bairro
                  </label>
                  <input id="input-bairro" name="input-bairro" type="text">
                </div>
                 <div class="control-group">
                  <label for="textinput5">
                    Rua
                  </label>
                  <input id="input-rua" name="input-rua" type="text">
                </div>
                 <div class="control-group">
                  <label for="textinput5">
                    Número
                  </label>
                  <input id="input-numero" name="input-numero" type="text">
                </div>
                 <div class="control-group">
                  <label for="textinput5">
                    Complemento
                  </label>
                  <input id="input-complemento" name="input-complemento" type="text">
                </div>
                <input type="submit" value="Pronto! Próxima etapa" class="btn btn-success btn-large btn-form-cadastro">
  
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