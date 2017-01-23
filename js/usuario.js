(function($){

  //Cadastra Usuario
  $('form[name="formulario"]').on('submit', function(event){

    event.preventDefault();

    var formulario = $(this);
    var btnGravar = $(this).find(':button');

    $.ajax({
      url: 'ajax/controleUsuario.php',
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

  //Lista Usuarios
  var listaUsuario = function() {

      $.ajax({
        url: 'ajax/controleUsuario.php',
        type: 'post',
        data: 'action=listaUsuario',
        success: function(retorno) {
          //var usuario = JSON.parse(retorno);
          console.log(retorno);

          var listItems = '<thead>'+
            '<tr>'+
              '<th class="edita-exclui"></th>'+
              '<th class="edita-exclui"></th>'+
              '<th class="nome-usuario">Nome</th>'+
              '<th class="nome-empreendimento">Empreendimento</th>'+
            '</tr>'+
           '</thead>';
            /*for(var i = 0; i < usuario.length; i++) {
                listItems += '<tr>'+
                    '<td class="edita-exclui"><a href="" id="btnEdita">Editar</a></td>'+
                    '<td class="edita-exclui"><a href="" id="btnExclui">Excluir</a></td>'+
                    '<td class="descricao-empreendimento">'+usuario[i].nome+'</td>'+
                    '<td class="cidade">'+empreendimento[i].nom+'</td>'+
                  '</tr>';
            }*/

          $("#tbUsuario").html(listItems);
        }
    });
    console.log('tete');
  }

  listaUsuario();

})(jQuery);
