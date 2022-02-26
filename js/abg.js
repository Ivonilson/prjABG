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