(function($){

  //Cadastra Regional
  $('form[name="formulario"]').on('submit', function(event){

    event.preventDefault();

    var formulario = $(this);
    var btnGravar = $(this).find(':button');

    $.ajax({
      url: 'ajax/controleRegional.php',
      type: 'post',
      data: 'action=cadastra&'+formulario.serialize(),
      beforeSend: function() {
        btnGravar.html('Gravando...').attr('disable', true);
      },
      success: function(retorno) {
        btnGravar.attr('disable', false).html('Gravar');
      }
    });
  });

  //Pega id
  $('#tbRegional').on('click', '#btnEdita', function(){
      var id = $(this).attr('data-id-regional');
      $.post('ajax/controleRegional.php', {action: 'pegaId', id: id},
      function(retorno) {
        var alteraRegional = JSON.parse(retorno);
        document.title
    	  $("#titulo-lista").text(document.title);
        $(".lista").fadeOut();
        $("form").fadeIn();
        $("#btnGravar").attr('id','btnAtualizar').html('Atualizar');
        $('textarea').val(alteraRegional[0].descricao);
        $('input:hidden').val(alteraRegional[0].idregional);
      });
      return false;
  });

  //Atualiza Regional
  $('form[name="formulario"]').on('submit', function(event){
    event.preventDefault();
    var dados = $(this);
    var btnAtualizar = dados.find(':button');
    $.ajax({
      url: 'ajax/controleRegional.php',
      type: 'POST',
      data: 'action=editar&'+dados.serialize(),
      beforeSend: function() {
        btnAtualizar.html('Atualizando...').attr('disable', true);
      },
      success: function(retorno) {
        btnAtualizar.attr('disable', false).html('Atualizar');
          $("form").fadeOut();
        $(".lista").fadeIn();
        console.log(retorno);
      }
    });
  });

  //Excluir Regional
  $('#tbRegional').on('click', '#btnExclui', function(){
      var idregional = $(this).attr('data-id-regional');
      console.log(idregional);
      if(confirm('Você deseja excluir está regional?')) {
        $.post('ajax/controleRegional.php', {action: 'excluir', idregional: idregional},
        function(retorno){
          console.log(retorno);
        });
      }else {
        return false;
      }
      return false;
  });
  //Lista Regionais
  var listaRegionais = function() {

      $.ajax({
        url: 'ajax/controleRegional.php',
        type: 'post',
        data: 'action=lista',
        success: function(retorno) {
          var regional = JSON.parse(retorno);

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
                  '</tr>'
            }

          $("#tbRegional").html(listItems);
        }
    });
  }

  listaRegionais();

})(jQuery);
