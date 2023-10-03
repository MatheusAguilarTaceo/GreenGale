

const filtro1 = document.getElementById('horario');
const linhass = document.querySelectorAll('#tabela tbody tr');

const filtroNum = document.getElementById('Num');
const linhas1 = document.querySelectorAll('#tabela tbody tr');




filtro1.addEventListener('keyup', filtrarTabela);
filtroNum.addEventListener('keyup', filtrarTabela);


function filtrarTabela() {
  
  
  const valorFiltroo = filtro1.value.toLowerCase();
  const valorFiltro1 = filtroNum.value.toLowerCase();
 
  linhass,linhas1.forEach((linha) => {

    const colunaValor = linha.querySelector('td.box-time').textContent.toLowerCase();
    const colunaValor1 = linha.querySelector('td.box-vela').textContent.toLowerCase();
   
    
      if (colunaValor.includes(valorFiltroo)) {
        linha.setAttribute('dt-valor', 'horario');
        
      } 
  
      else {
          linha.removeAttribute('dt-valor');
      
        }  
    console.log("VELA = ",colunaValor1)
    console.log("INCLUDE = ",valorFiltro1)

    if (colunaValor1.includes(valorFiltro1)) {

        linha.setAttribute('dat-valor', 'Num');
      }
    else {
    
      linha.removeAttribute('dat-valor');
    }

    
  });
}



document.addEventListener('DOMContentLoaded', function() {
  var btnFiltrar = document.getElementById('Num');
  btnFiltrar.addEventListener('click', filtrarValores);

  function filtrarValores() {
    var tabela = document.getElementById('tabela');
    var linhas = tabela.getElementsByTagName('tr');
    console.log(linhas)

    for (var i = 1; i < linhas.length; i++) {
      console.log('AQUI', linhas[i])
      var linha = linhas[i];
      var colunaVelas = linha.getElementsByClassName('box-vela')[0];
      console.log(colunaVelas)
      var valorVelas = parseFloat(colunaVelas.innerText);
      console.log('BEM AQUI')
      if (valorVelas < 2) {
        linha.classList.add('vela-azul');
      } 
      
      else if (valorVelas > 2 && valorVelas < 9) {
        linha.classList.add('vela-roxa');
      }
      else if (valorVelas > 10){
        linha.classList.add('vela-rosa');
      }
    }
  }
});



function redirecionar() {
  var selecionado = document.getElementById("boxfiltro").value;
  if (selecionado !== "") {
      window.location.href = selecionado; // Redirecionar para a página selecionada
  }
}