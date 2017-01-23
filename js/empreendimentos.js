(function($) {
  //Cadastra Regional
  $('form[name="formulario"]').on('submit', function(event){

    event.preventDefault();

    var formulario = $(this);
    var btnGravar = $(this).find(':button');

    $.ajax({
      url: 'ajax/controleEmpreendimentos.php',
      type: 'post',
      data: 'action=cadastra&'+formulario.serialize(),
      beforeSend: function() {
        btnGravar.html('Gravando...').attr('disable', true);
      },
      success: function(retorno) {
        btnGravar.attr('disable', false).html('Gravar');
        console.log(retorno);
      }
    });
  });
  //Lista Regionais
  var listaRegionais = function() {

      $.ajax({
          url: 'ajax/controleEmpreendimentos.php',
          type: 'post',
          data: 'action=lista',
          success: function(retorno) {
              var regional = JSON.parse(retorno);

              var listaRegionais = '<option selected="selected" value="0">Selecione</option>';

              for(var i = 0; i < regional.length; i++) {
                  listaRegionais +=
                  "<option value='"+regional[i].idregional+ "'>"+regional[i].descricao+"</option>";
              }

              $("#regionais").html(listaRegionais);
          }
      });
  }
  listaRegionais();

  //Lista Regionais
  var listaEmpreendimentos = function() {

      $.ajax({
        url: 'ajax/controleEmpreendimentos.php',
        type: 'post',
        data: 'action=listaEmpreendimentos',
        success: function(retorno) {
          var empreendimento = JSON.parse(retorno);

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
                    '<td class="edita-exclui"><a href="" id="btnEdita">Editar</a></td>'+
                    '<td class="edita-exclui"><a href="" id="btnExclui">Excluir</a></td>'+
                    '<td class="descricao-empreendimento">'+empreendimento[i].descricao+'</td>'+
                    '<td class="cidade">'+empreendimento[i].cidade+'</td>'+
                    '<td class="uf">'+empreendimento[i].uf+'</td>'+
                  '</tr>';
            }

          $("#tbEmpreendimento").html(listItems);
        }
    });
  }
  listaEmpreendimentos();

})(jQuery);
