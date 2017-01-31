(function($){

    //Mostra formulario Cadastrar
    $("#btnNovo").click(function(){
      $('.lista').fadeOut();
      $('#form-cadastrar').fadeIn(2000);
      $('#titulo-lista').text('Usuario');
    });

    //Cadastra Usuario
    $('form[name="formularioCadastrar"]').on('submit', function(event){

      event.preventDefault();

      var formulario = $(this);

      $.ajax({
    		url: 'ajax/controleUsuario.php',
    		type: 'post',
    		data: 'action=cadastrar&'+formulario.serialize(),
    		beforeSend: function() {
    			$('#btnGravar').val('Gravando...').attr('disable', true);
    		},
    		success: function(retorno) {
    			$('#btnGravar').attr('disable', false).val('Gravar');
          retorno = JSON.parse(retorno);
          if(retorno == true) {
    				$('#mensagem').text('Usuário cadastrado com sucesso').css(
    				{'color':'red','text-align':'center'}).fadeOut(5000);
    				$('#cnome').val('');
    				$('#cemail').val('');
    				$('#csenha').val('');
    			}else {
            $('#mensagem').text('Favor, preencher todos os campos').css(
    				{'color':'red','text-align':'center'}).fadeOut(7000);
    			}
    		}
      });
   });
   //Fim Cadastra Usuario

  //Lista Usuarios
	var listaUsuario = function() {
		$.ajax({
			url: 'ajax/controleUsuario.php',
			type: 'post',
			data: 'action=listaUsuario',
			success: function(retorno) {
				var usuario = JSON.parse(retorno);
				if(usuario != false) {
					var listItems = '<thead>'+
							'<tr>'+
								'<th class="edita-exclui"></th>'+
								'<th class="edita-exclui"></th>'+
								'<th class="nome-usuario">Nome</th>'+
								'<th class="email-usuario">Email</th>'+
							'</tr>'+
						'</thead>';
					for(var i = 0; i < usuario.length; i++) {
						listItems += '<tr>'+
							'<td class="edita-exclui"><a href="" id="btnEdita" data-id-usuario='+usuario[i].idusuario+'>Editar</a></td>'+
							'<td class="edita-exclui"><a href="" id="btnExclui" data-id-usuario='+usuario[i].idusuario+'>Excluir</a></td>'+
							'<td class="nome-usuario">'+usuario[i].nome+'</td>'+
							'<td class="email-usuario">'+usuario[i].email+'</td>'+
						'</tr>';
					}
					$("#tbUsuario").html(listItems);
				}else {
					$('#mensagem-registro').text('Nenhum registro foi encontrado').css(
						{'text-align':'center', 'color':'red'});
				}
			}
		});
	}
  listaUsuario();
  //fim Lista Usuarios

  //Pega id
	$('#tbUsuario').on('click', '#btnEdita', function(event) {

		event.preventDefault();

		var id = $(this).attr('data-id-usuario');

		$('#senha').hide();

		$.post('ajax/controleUsuario.php', {action: 'pegaId', id: id},
			function(retorno) {
  			var alteraUsuario = JSON.parse(retorno);
        console.log(alteraUsuario);
  			$("#titulo-lista").text(document.title);
  			$(".lista").fadeOut('fast');
  			$("#form-atualizar").fadeIn(3000);
  			$('#nome').val(alteraUsuario[0].nome);
  			$('#email').val(alteraUsuario[0].email);
  			$('#idusuario').val(alteraUsuario[0].idusuario);
		});
	});
  //Fim Pega id

  //Edita usuário
	$('form[name="formularioAtualizar"]').on('submit', function(event) {

		event.preventDefault();

		var dados = $(this);

		$.ajax({
			url: 'ajax/controleUsuario.php',
			type: 'POST',
			data: 'action=editar&'+dados.serialize(),
			beforeSend: function() {
				$('#btnAtualizar').val('Atualizando...').attr('disable', true);
			},
			success: function(retorno) {
        $('#btnAtualizar').attr('disable', false).val('Atualizar');
        retorno = JSON.parse(retorno);
        if(retorno == true) {
					$('#mensagem').text('Usuário atualizado com sucesso').css(
					  {'color':'red','text-align':'center'}).fadeOut(7000);
				}else {
          $('#mensagem').text('Não foi possível atualizar o usuário').css(
					  {'color':'red','text-align':'center'}).fadeOut(7000);
				}
			}
		});
	});
  //fim Edita usuário

  //Excluir Usuario
  $('#tbUsuario').on('click', '#btnExclui', function(){
      var idusuario = $(this).attr('data-id-usuario');
      if(confirm('Você deseja excluir este usuário?')) {
        $.post('ajax/controleUsuario.php', {action: 'excluir', idusuario: idusuario},
        function(retorno){
          $(location).attr('href', 'usuarios.php');
        });
      }else {
        return false;
      }
      return false;
  });

  /*Lista Empreendimentos
	var listaEmpreendimentos = function() {

		$.ajax({
			url: 'ajax/controleUsuario',
				type: 'post',
				data: 'action=lista-empreendimentos',
				success: function(retorno) {
					var empreendimento = JSON.parse(retorno);
					console.log(empreendimento);
					var listaEmpreendimento = '<ul>';
					for(var i = 0; i < empreendimento.length; i++) {
						listaEmpreendimento += '<li>'+
						'<input type="checkbox" class="lista-idempreendimento" name="cidempreendimento[]" value="'+empreendimento[i].idempreendimento+'">'+empreendimento[i].nome+'</li>';
					}
					listaEmpreendimento += '</ul>';
					$('.scroll').html(listaEmpreendimento);
				}
		});
	}
  listaEmpreendimentos();
  //fimLista Empreendimentos*/

})(jQuery);
