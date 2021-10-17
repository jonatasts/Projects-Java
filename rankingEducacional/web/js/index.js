let fatores = 30;

$(document).ready(function () {
  limpeza();
});

function validacao() {
  if ($("input[name=matricula")[0].value === "") {
    alert("Você precisa preencher o número de matrícula!");
    return false;
  } else if ($("input[name=ano_corrente")[0].value === "") {
    alert("Você precisa preencher o ano corrente!");
    return false;
  } else {
    for (var i = 0; i < fatores; i++) {
      if ($(`input[name=fator${i + 1}]:checked`).val() === undefined) {
        alert(`Você precisa marcar a questão ${i + 1}`);
        return false;
      }
    }
    return true;
  }
}

function validaPesquisa() {
  if ($("input[name=matricula")[0].value === "") {
    alert("Você precisa preencher o número de matrícula!");
    return false;
  }
  return true;
}

function limpeza() {
  document.cadastro.reset();
}
