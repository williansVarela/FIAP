//Validando formulario e exibindo mensagem de erro
var buttonSend = document.querySelector("#botao-enviar");

buttonSend.addEventListener('click', function(event){
	//event.preventDefault(); //preventDefault() previne o comportamento padrão do navegador

	var formulario = document.querySelector("#formulario");

	var campos = obterDadosFormulario(formulario);
	//console.log(campos)
    
	var erros = verificaForm(campos);
	if(erros.length > 0) {
		exibeMensagemErro(erros);
		return;
	};
	if(erros.length == 0) {
		formulario.reset();
		var ul = document.querySelector("#mensagem-erro");
		ul.innerHTML = "";
		modal.style.display = "block";
		//alert("Mensagem enviada com sucesso");
	}
});

function obterDadosFormulario(form) {
	var formCampo = { //objeto
        nome:     form.nome.value,
        email:    form.email.value,
        motivo:   form.motivo.value,
        mensagem: form.msg.value,
    };
    return formCampo;
};

function verificaForm(campos) {
	var erros = []; //Array de erros

	if(campos.nome.length == 0) {
		erros.push("Nome não pode ser em branco");
	}

	if(campos.email.length == 0) {
		erros.push("Email não pode ser em branco");
	}

	if(campos.motivo.length == 0) {
		erros.push("Motivo não pode ser em branco");
	}

	if(campos.mensagem.length == 0) {
		erros.push("Mensagem não pode ser em branco");
	}
	return erros;
};

function exibeMensagemErro(erros) {
	var ul = document.querySelector("#mensagem-erro");

	ul.innerHTML = "";

	erros.forEach(function(erros){
		var li = document.createElement("li");
		li.textContent = erros;
		ul.appendChild(li);
	});
};

//Fim Validação


//Inicio modal
// Get the modal
var modal = document.getElementById('msg-enviada');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    };
};
//Fim Modal
