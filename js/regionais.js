(function($){

  //Lista Regionais
  var listaRegionais = function() {
      $.ajax({
        url: 'ajax/controleRegional.php',
        type: 'post',
        data: 'action=lista',
        success: function(retorno) {
            regional = JSON.parse(retorno);
            console.log(regional);
            if(regional != false) {
              var listItems = '<thead>'+
                    		'<tr>'+
                    			'<th class="edita-exclui"></th>'+
                    			'<th class="edita-exclui"></th>'+
                    			'<th class="descricao">Regional</th>'+
                    		'</tr>'+
                    	 '</thead>';
                for(var i = 0; i < regional.length; i++) {
                  listItems += '<tr>'+
                       '<td class="edita-exclui"><a href="" id="btnEdita" data-id-regional='+regional[i].idregional+'>Editar</a></td>'+
                       '<td class="edita-exclui"><a href="" id="btnExclui" data-id-regional='+regional[i].idregional+'>Excluir</a></td>'+
                       '<td>'+regional[i].descricao+'</td>'+
                     '</tr>';
                }
                $("#tbRegional").html(listItems);
                }else {
                   $('#mensagem-registro').text('Nenhum registro foi encontrado').css({'color':'red','text-align':'center'});
                 }
              }
          });
    }
    listaRegionais();

  //Mostra formulario Cadastrar
  $("#btnNovo").click(function(){
    $('.lista').fadeOut();
    $('#form-cadastrar').fadeIn(2000);
    $('#titulo-lista').text('Regional');
  });

  //Pega id
  $('#tbRegional').on('click', '#btnEdita', function() {
      var id = $(this).attr('data-id-regional');
      $.post('ajax/controleRegional.php', {action: 'pegaId', id: id},
      function(retorno) {
        var alteraRegional = JSON.parse(retorno);
    	  $("#titulo-lista").text(document.title);
        $(".lista").fadeOut('fast');
        $("#form-atualizar").fadeIn(3000);
        $('textarea').val(alteraRegional[0].descricao);
        $('input:hidden').val(alteraRegional[0].idregional);
      });
      return false;
  });

  //Cadastra Regional
  $('form[name="formularioCadastrar"]').on('submit', function(event){

    event.preventDefault();

    var formulario = $(this);
    var btnGravar = $(this).find(':submit');

    $.ajax({
      url: 'ajax/controleRegional.php',
      type: 'post',
      data: 'action=cadastra&'+formulario.serialize(),
      beforeSend: function() {
        btnGravar.val('Gravando...').attr('disable', true);
      },
      success: function(retorno) {
        btnGravar.attr('disable', false).val('Gravar');
        retorno = retorno === 'true' ? true : false;
        if(retorno) {
          $('#mensagem').text('Regional cadastrada').css(
              {'color':'blue',
              'text-align':'center'}).fadeOut(7000);
              $('#descricao').val('');
        }else {
          $('#mensagem').text('Favor, informar a regional').css(
              {'color':'blue',
              'text-align':'center'}).fadeOut(7000);
        }
      }
    });
  });

  //Edita regional
  $('form[name="formularioAtualizar"]').on('submit', function(event){
      var dados = $(this);
      var btnAtualizar = $(this).find(':submit');
      $.ajax({
        url: 'ajax/controleRegional.php',
        type: 'POST',
        data: 'action=editar&'+dados.serialize(),
        beforeSend: function() {
          btnAtualizar.val('Atualizando...').attr('disable', true);
        },
        success: function(retorno) {
          btnAtualizar.attr('disable', false).val('Atualizar');
          retorno = retorno === 'true' ? true : false;
          if(retorno) {
            $('#mensagem').text('Regional atualizada com sucesso').css(
              {'color':'blue','text-align':'center'}).fadeOut(7000);
          }else {
            $('#mensagem').text('Erro ao atualizar regional').css(
              {'color':'blue','text-align':'center'}).fadeOut(7000);
          }
        }
      });
    return false;
  });

  //Excluir Regional
  $('#tbRegional').on('click', '#btnExclui', function(){
      var idregional = $(this).attr('data-id-regional');
      if(confirm('Você deseja excluir está regional?')) {
        $.post('ajax/controleRegional.php', {action: 'excluir', idregional: idregional},
        function(retorno){
          $(location).attr('href', 'regionais.php');
        });
      }else {
        return false;
      }
      return false;
  });

})(jQuery);
