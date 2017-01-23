$(document).ready(function(){

	$("#btn").click(function(){
	  document.title
	  $("#titulo-lista").text(document.title);
      $(".lista").fadeOut();
      $("form").fadeIn();
      //$("form").fadeIn("slow");
      //$("form").fadeIn(3000);
	});

	$("#btnGravar").click(function(){
		$("#titulo-lista").text('Lista de '+ document.title);
		$(".lista").fadeIn();
		$("form").fadeOut();
	});

});
