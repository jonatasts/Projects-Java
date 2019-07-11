let clickColor = "rgb(66, 133, 244)";
let normalColor = "#B0B999";
let w = screen.width;
let h = screen.height;

$(document).ready(function(){
	$(".opcoes").css("visibility","visible");
	$(".opcoes").hide();
});

$("#imgAluno").click(function(){
	$("#aluno > .opcoes").toggle();
	if($("#imgAluno").css("background-color") === clickColor){
		$("#imgAluno").css("background-color",normalColor);
	}else{
		$("#imgAluno").css("background-color",clickColor);
	};
});

$("#imgRanking").click(function(){
	$("#ranking > .opcoes").toggle();
	if($("#imgRanking").css("background-color") === clickColor){
		$("#imgRanking").css("background-color",normalColor);
	}else{
		$("#imgRanking").css("background-color",clickColor);
	};
});

$("#adicionarAluno").click(function(){
	window.open('questionario.html','','width='+ (w*0.45) +',height='+ (h*0.70) +'');
});

$("#pesquisarAluno").click(function(){
	window.open('pesquisa.html','','width='+ (w*0.45) +',height='+ (h*0.70) +'');
});

$("#gerarRanking").click(function(){
	window.open('ranking.html','','width='+ (w*0.5) +',height='+ (h*0.8) +'');
});

function validacao(){
    
    for(var i = 0; i < 30;i++){
    if($(`input[name=fator${i+1}]:checked`).val()=== undefined) {
		alert(`Você precisa marcar a questão ${i+1}`);
		return false;
	}
    }
    return true;
}