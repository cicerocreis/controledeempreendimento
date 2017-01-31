(function($) {

  var empreendimento = "";
  var alteraEmpreendimento = "";

  //Mostra formulario Cadastrar
  $("#btnNovo").click(function(){
    $('.lista').fadeOut();
    $('#form-cadastrar').fadeIn(2000);
    $('#titulo-lista').text('Empreendimento');
  });
  //Fim mostra formulario Cadastrar

  //Cadastra Empreendimento
  $('form[name="formularioCadastrar"]').on('submit', function(event){

    event.preventDefault();

    var formulario = $(this);
    var btnGravar = $(this).find(':submit');

    $.ajax({
      url: 'ajax/controleEmpreendimentos.php',
      type: 'post',
      data: 'action=cadastra&'+formulario.serialize(),
      beforeSend: function() {
        btnGravar.val('Gravando...').attr('disable', true);
      },
      success: function(retorno) {
        btnGravar.attr('disable', false).val('Gravar');
        retorno = JSON.parse(retorno);
        if(retorno == true) {
          $('#mensagem').text('Empreendimento cadastrado com sucesso').css(
            {'color':'red','text-align':'center'}).fadeOut(5000);
            $('#cempreendimento').val('');
            $('#cendereco').val('');
            $('#ccidade').val('');
            $('#cuf').val('');
            $('#cregionais').val('');
        }else {
          $('#mensagem').text('Favor, preencher todos os campos').css(
            {'color':'red','text-align':'center'}).fadeOut(7000);
        }
      }
    });
  });
  //Fim Cadastra Empreendimento

  //Lista Regionais
  var listaRegionais = function() {
      $.ajax({
          url: 'ajax/controleEmpreendimentos.php',
          type: 'post',
          data: 'action=lista',
          success: function(retorno) {
              var regional = JSON.parse(retorno);
              var listaRegionais = '<option>Selecione</option>';
              for(var i = 0; i < regional.length; i++) {
                    listaRegionais +=
                      "<option value='"+regional[i].idregional+ "'>"+regional[i].descricao+"</option>";
              }
              $(".regionais").html(listaRegionais);
          }
        });
  }
  listaRegionais();
  //Fim Lista Regionais

  //Lista Regionais (Atualiza)
  var listaRegionaisAtualiza = function() {
      $.ajax({
          url: 'ajax/controleEmpreendimentos.php',
          type: 'post',
          data: 'action=lista',
          success: function(retorno) {
              var regional = JSON.parse(retorno);

              var listaRegionais = '<option>Selecione</option>';

              for(var i = 0; i < regional.length; i++) {
                  if((regional[i].idregional == alteraEmpreendimento[0].idregional) || alteraEmpreendimento[0].idregional == '') {
                    listaRegionais +=
                    "<option selected='selected' value='"+regional[i].idregional+ "'>"+regional[i].descricao+"</option>";
                  }else {
                    listaRegionais += "<option value='"+regional[i].idregional+ "'>"+regional[i].descricao+"</option>";
                  }
              }
              $(".regionais").html(listaRegionais);
          }
      });
  }
  //Fim Lista Regionais

  //Lista Empreendimento
  var listaEmpreendimentos = function() {
      $.ajax({
        url: 'ajax/controleEmpreendimentos.php',
        type: 'post',
        data: 'action=listaEmpreendimentos',
        success: function(retorno) {
          empreendimento = JSON.parse(retorno);
            console.log(empreendimento);
          if(empreendimento != "") {

            var listItems = '<thead>'+
          		'<tr>'+
          			'<th class="edita-exclui"></th>'+
          			'<th class="edita-exclui"></th>'+
          			'<th class="descricao-empreendimento">Descrição</th>'+
                '<th class="cidade">Cidade</th>'+
                '<th class="uf">UF</th>'+
          		'</tr>'+
          	 '</thead>';
             for(var i = 0; i < empreendimento.length; i++) {
                  listItems += '<tr>'+
                      '<td class="edita-exclui"><a href="" id="btnEdita" data-id-empreendimento='+empreendimento[i].idempreendimento+'>Editar</a></td>'+
                      '<td class="edita-exclui"><a href="" id="btnExclui" data-id-empreendimento='+empreendimento[i].idempreendimento+'>Excluir</a></td>'+
                      '<td class="descricao-empreendimento">'+empreendimento[i].descricao+'</td>'+
                      '<td class="cidade">'+empreendimento[i].cidade+'</td>'+
                      '<td class="uf">'+empreendimento[i].uf+'</td>'+
                    '</tr>';
              }
                $("#tbEmpreendimento").html(listItems);
          }else {
            $('#mensagem-registro').text('Nenhum registro foi encontrado').css(
              {'color':'red','text-align':'center'});
          }
        }
    });
  }
  listaEmpreendimentos();
  //Fim Lista Empreendimento

  //Pega id Empreendimentos
  $('#tbEmpreendimento').on('click', '#btnEdita', function(event) {

      event.preventDefault();

      var id = $(this).attr('data-id-empreendimento');
      $.post('ajax/controleEmpreendimentos.php', {action: 'pegaId', id: id},
      function(retorno) {
        alteraEmpreendimento = JSON.parse(retorno);
        listaRegionaisAtualiza();
    	  $("#titulo-lista").text(document.title);
        $(".lista").fadeOut('fast');
        $("#form-atualizar").fadeIn(3000);
        $('#idempreendimento').val(alteraEmpreendimento[0].idempreendimento);
        $('#empreendimento').val(alteraEmpreendimento[0].nome);
        $('#endereco').val(alteraEmpreendimento[0].endereco);
        $('#cidade').val(alteraEmpreendimento[0].cidade);
        $('#uf').val(alteraEmpreendimento[0].uf);
      });
  });
  //Fim Pega id Empreendimentos

  //Edita Empreendimento
  $('form[name="formularioAtualizar"]').on('submit', function(event){
      event.preventDefault();
      var dados = $(this);
      var btnAtualizar = $(this).find(':submit');
      $.ajax({
        url: 'ajax/controleEmpreendimentos.php',
        type: 'POST',
        data: 'action=editar&'+dados.serialize(),
        beforeSend: function() {
          btnAtualizar.val('Atualizando...').attr('disable', true);
        },
        success: function(retorno) {
          btnAtualizar.attr('disable', false).val('Atualizar');
          retorno = JSON.parse(retorno);
          if(retorno == true) {
            $('#mensagem').text('Regional atualizada com sucesso').css(
              {'color':'red','text-align':'center'}).fadeOut(7000);
          }else {
            $('#mensagem').text('Erro ao atualizar regional').css(
              {'color':'red','text-align':'center'}).fadeOut(7000);
          }
        }
      });
  });

  //Excluir Empreendimento
  $('#tbEmpreendimento').on('click', '#btnExclui', function(event){
      event.preventDefault();
      var idempreendimento = $(this).attr('data-id-empreendimento');
      if(confirm('Você deseja excluir este empreendimento?')) {
        $.post('ajax/controleEmpreendimentos.php', {action: 'excluir', idempreendimento: idempreendimento},
        function(retorno){
          $(location).attr('href', 'empreendimento.php');
        });
      }else {
        $('#mensagem').text('Erro ao excluir regional').css(
          {'color':'red','text-align':'center'}).fadeOut(7000);;
      }
  });


})(jQuery);
