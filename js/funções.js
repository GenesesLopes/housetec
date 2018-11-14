$(document).ready(function($){


//Ajax Buscar Predio Tabela
function buscaPredioTabela(){
	var local = document.getElementById("locPredio").value;
	var gif = $('<img src="../Imagens/gif/carregando_e.gif" class="icon" /><br> <span class="form-group">Carregando.. Favor aguarde...</span>');
	$.ajax({
		url: 'ações/Ajax/prediolocalizarOn.php',
		dataType: 'html',
		type : 'POST',
		data: {locPredio: local},
		beforeSend: function(){
			$('#tabelaBusca').html(gif);
		},
		complete: function(){
			$(gif).remove();
		},
		success: function(data){
			$('#tabelaBusca').html(data);
		}

	});
}

//Ajax atualizar predio
function atualizarPredio(){
	var local = document.getElementById("locPredio2").value;
	var gif = $('<img src="../Imagens/gif/carregando_e.gif" class="icon" /><br> <span class="form-group">Carregando.. Favor aguarde...</span>');
	$.ajax({
		url: 'ações/Ajax/atualizarpredio.php',
		dataType: 'html',
		type : 'POST',
		data: {locPredio: local},
		beforeSend: function(){
			$('#dadosPredio').html(gif);
		},
		complete: function(){
			$(gif).remove();
		},
		success: function(data){
			$('#dadosPredio').html(data);
		}

	});
}
//Ajax Busca id do Apartamento para atualizar
function atualizarApartamento(){
	var local = document.getElementById("idap").value;
	var gif = $('<img src="../Imagens/gif/carregando_e.gif" class="icon" /><br> <span class="form-group">Carregando.. Favor aguarde...</span>');
	$.ajax({
		url: 'ações/Ajax/apartamentobusca2.php',
		dataType: 'html',
		type : 'POST',
		data: {locPredio: local},
		beforeSend: function(){
			$('#formAtualizaAp').html(gif);
		},
		complete: function(){
			$(gif).remove();
		},
		success: function(data){
			$('#formAtualizaAp').html(data);
		}

	});
}

//Ajax Busca id do Apartamento 
function buscaIdApartamento(){
	var local = document.getElementById("idap").value;
	var gif = $('<img src="../Imagens/gif/carregando_e.gif" class="icon" /><br> <span class="form-group">Carregando.. Favor aguarde...</span>');
	$.ajax({
		url: 'ações/Ajax/apartamentobusca.php',
		dataType: 'html',
		type : 'POST',
		data: {locPredio: local},
		beforeSend: function(){
			$('#tabelaApartamento').html(gif);
		},
		complete: function(){
			$(gif).remove();
		},
		success: function(data){
			$('#tabelaApartamento').html(data);
		}

	});
}
//Ajax Busca Locatário
function buscaLocatario(){
	var locatario = document.getElementById("cpf").value;
	var gif = $('<img src="../Imagens/gif/carregando_e.gif" class="icon" /><br> <span class="form-group">Carregando.. Favor aguarde...</span>');
	$.ajax({
		url: 'ações/Ajax/LocatariobuscaOn.php',
		dataType: 'html',
		type : 'POST',
		data: {cpf: locatario},
		beforeSend: function(){
			$('#resultLocalario').html(gif);
		},
		complete: function(){
			$(gif).remove();
		},
		success: function(data){
			$('#resultLocalario').html(data);
		}

	});
}

//Ajax Busca Locatário2
function buscaLocatario2(){
	var locatario = document.getElementById("cpf2").value;
	var gif = $('<img src="../Imagens/gif/carregando_e.gif" class="icon" /><br> <span class="form-group">Carregando.. Favor aguarde...</span>');
	$.ajax({
		url: 'ações/Ajax/atualizarusuarioOn.php',
		dataType: 'html',
		type : 'POST',
		data: {cpf: locatario},
		beforeSend: function(){
			$('#resultLocalario2').html(gif);
		},
		complete: function(){
			$(gif).remove();
		},
		success: function(data){
			$('#resultLocalario2').html(data);
		}

	});
}

//Ajax buscar apartamento livre
function buscaApartamentoLivre(){
	var edificio = document.getElementById("add_idpredio").value;
	var gif = $('<img src="../Imagens/gif/carregando_e.gif" class="icon" /><br> <span class="form-group">Carregando.. Favor aguarde...</span>');
	$.ajax({
		url: 'ações/Ajax/buscaApartamento.php',
		dataType: 'html',
		type : 'POST',
		data: {idedificio: edificio},
		beforeSend: function(){
			$('#resultApartamento').html(gif);
		},
		complete: function(){
			$(gif).remove();
		},
		success: function(data){
			$('#resultApartamento').html(data);
		}

	});
}

//Função para desativar
$(document).on('click','#maior',function(){
	$('.maior').prop("hidden",true);//ocutar div
	$('.menor').prop("hidden",false);//Revelar Div
});

$(document).on('click','#menor',function(){
	$('.menor').prop("hidden",true);//ocutar div
	$('.maior').prop("hidden",false);//Revelar Div
});


//Popover
$(function () {
        $('[data-toggle="popover"]').popover({html: true})
 });

});
