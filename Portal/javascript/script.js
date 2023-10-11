let url = "https://portungles.com"

let inputtxt = document.querySelector(".container__inputtxt");
let botao = document.querySelector(".botao");
let resultado = document.querySelector("#container__significado");

botao.addEventListener("click", () =>{
	let palavra = inputtxt.value;
	if (palavra === '') {
		alert('Nada foi escrito')
	}
})
