function verificaStatus(){

	   let valor = document.querySelector(".status").innerHTML;

	   switch(valor) {
	   	case "LAUDO PRONTO":
	   		document.querySelector(".status").className = "bg-success text-white";
	   		break;
	   	case "CANCELADA":
	   		document.querySelector(".status").className = "bg-secondary text-white";
	   		break;
	   	case "AGUARDANDO VISTORIA":
	   		document.querySelector(".status").className = "bg-danger text-white";
	   		break;
	   	case "VISTORIA REALIZADA":
	   		document.querySelector(".status").className = "bg-warning text-white";
	   		break;
	   	case "EM ANÁLISE":
	   		document.querySelector(".status").className = "bg-info text-white";
	   		break;
	   	default:
	   		document.querySelector(".status").className = "bg-secondary text-white";
	   }

}

function verificaStatusLista(){

	   let valor = document.querySelector(".statusLista").innerHTML;

	   switch(valor) {
	   	case "AGUARDANDO VISTORIA":
	   		document.querySelector(".statusLista").className = "text-primary";
	   		break;
	   	default:
	   		document.querySelector(".statusLista").className = "text-danger";
	   		break;
	   }
}

$(document).ready(function(){
	$(".valor").on("input", function(){
		var textoDigitado = $(this).val();
		var inputCusto = $(this).attr("custo");
		$("#"+ inputCusto).val(textoDigitado);
	})
})

function Redirect(){
    setTimeout("location.reload(true);",600000);   
 }

function configurarBarra(){
   setInterval(() => {
   		let percentual = ((parseInt(document.getElementById('qtdlaudoPronto').innerHTML)) / (parseInt(document.getElementById('qtdDemandas').innerHTML))) *  100 ;
   		if(isNaN(percentual)){
   			 percentual = 100;
   		}
      	const valorDiv = document.querySelector(`[barra-progresso] > div`);
      	const valorDivExterna = document.querySelector(`[barra-progresso]`);
      	valorDiv.style.width = `${percentual}%`;
      	valorDiv.innerHTML = `${percentual.toFixed(2)}%`;
      		if(percentual == 100){
      			valorDiv.style.backgroundColor = '#3CB371';
      			valorDivExterna.style.borderColor = '#3CB371';
      		}
      		if(percentual <= 9){
      			valorDiv.style.backgroundColor = '#F8F8FF';
      			valorDiv.style.color = '#DC143C';
      		}
     }, 500)
}

/*Cores padrão das telas de cadastro*/
$(document).ready(function(){

	let botoes_atalho_cad = document.querySelectorAll(".botoes-atalho-cad");
	
	botoes_atalho_cad.forEach(item =>{
		item.setAttribute("class", "btn btn-info btn-block font-weight-bold rounded");
	});
	
	let jumbotron_tela_cadastro = document.querySelector("#jumbotron_telas_cadastro");
	jumbotron_tela_cadastro.setAttribute("class", "jumbotron jumbotron-fluid text-white bg-info");

	let background_tela_cadastro = document.querySelector("#background-tela-cadastro");
	background_tela_cadastro.setAttribute("style", "background-color: #DCDCDC",);
	background_tela_cadastro.setAttribute("class", "row m-1 p-2");
	//background_tela_cadastro.setAttribute("style",  "background-image: url('../assets/logo.png');");

	let background_form_cad = document.querySelector(".background-form-cadastro");
	background_form_cad.setAttribute("style", "background-color: #FFFFF0; border-style: outset; padding-bottom: 3px");

	let botoes_gravar_cad = document.querySelector("#botoesGravarCad");
	botoes_gravar_cad.setAttribute("class", "btn btn-lg btn-info btn-block text-white font-weight-bold rounded")

});

/*Cores padrão das telas de consulta**/
$(document).ready(function(){

	let botoes_atalho_cons = document.querySelectorAll(".botoes-atalho-cons");
	

	botoes_atalho_cons.forEach(item =>{
		item.setAttribute("class", "btn btn-success btn-block font-weight-bold rounded");
	});
	
	/*por enquanto a função abaixo está sem uso, pois a telas de consulta não tem jumbotrom
	let jumbotron_tela_consulta = document.querySelector("#jumbotron_telas_consulta");
	jumbotron_tela_consulta.setAttribute("class", "jumbotron jumbotron-fluid text-white bg-info");*/

	let background_tela_consulta = document.querySelector("#background-tela-consulta");
	background_tela_consulta.setAttribute("style", "background-color: #DCDCDC");
	//background_tela_cadastro.setAttribute("style",  "background-image: url('../assets/logo.png');");

	let background_form_cons = document.querySelector(".background-form-cons");
	background_form_cons.setAttribute("style", "background-color: #FFFFF0; border-style: outset; padding-bottom: 3px");

	/*Setando as rows das tabelas propriedades das tabelas de consulta*/
	let row_tbl_consulta = document.querySelector("#row-tbl-consulta");
	row_tbl_consulta.setAttribute("class", "row border-light bg-light m-2");

	/*Ajuste das divs dos inputs de data das consultas*/
	let div_ipt_data_cons = document.querySelector("#div-ipt-data-form-cons");
	div_ipt_data_cons.setAttribute("class", "col-lg-5 col-md-4 col-sm-12 col-xs-12 mt-3");

	/*Ajuste das divs dos botoes de busca das consultas*/
	let div_btn_form_cons = document.querySelector("#div-btn-form-cons");
	div_btn_form_cons.setAttribute("class", "col-lg-5 col-md-5 col-sm-12 col-xs-12 mb-3");

	/*Setando as tabelas de consulta*/
	let tbl_consulta = document.querySelector(".tbl-consulta");
	tbl_consulta.setAttribute("class", "table table-bordered table-hover border-light");
	
	let botoes_cons = document.querySelector("#botoesCons");
	botoes_cons.setAttribute("class", "btn btn-lg btn-info btn-block text-white font-weight-bold rounded");
	//botoes_cons.setAttribute("style", "background-color: #483D8B");
});


/*Cores padrão das telas de edição*/
$(document).ready(function(){

	let background_tela_edicao = document.querySelector("#background-tela-edicao");
	background_tela_edicao.setAttribute("style", "background-color: #DCDCDC");

	let background_form_edicao = document.querySelector(".background-form-edicao");
	background_form_edicao.setAttribute("style", "background-color: #FFFFF0; border-style: outset; padding-bottom: 3px");

	/*background jumbotron telas de edição*/
	let background_jumbotron_telas_ed = document.querySelector("#jumbotron_telas_edicao");
	background_jumbotron_telas_ed.setAttribute("class", "jumbotron jumbotron-fluid text-white");
	background_jumbotron_telas_ed.setAttribute("style", "background-color: #2F4F4F");

	/*background das rows dos forms de edição*/
	let background_row_form_edicao = document.querySelector("#row-form-edicao");
	background_row_form_edicao.setAttribute("class", "row");
	background_row_form_edicao.setAttribute("style", "background-color: #E6E6FA");


	/*botões de gravar alterações de edições*/
	let btn_edicao = document.querySelector("#btnGravarEdicao");
	btn_edicao.setAttribute("class", "btn btn-info btn-block font-weight-bold rounded");
});

$(document).ready(function(){
	let status = document.querySelectorAll("#sel-status-notificacao");
	let divAdiar = document.querySelectorAll("#div-adiar");
	//let contador = 0;

	status.forEach(item => {
		item.onchange = function(){
			if(item.value == 'ADIAR'){
				//divAdiar[contador].setAttribute("class", "input-group col-auto mt-1 mb-1");
				alert(item);
			} 

			if(item.value == 'RESOLVIDO') {
				//divAdiar[contador].setAttribute("class", "d-none");
				alert(item);
			}

			//contador++;
		}
		
		//alert(contador);
	});
});