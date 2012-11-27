// ## Validação Formulario Cargo
$(document).ready( function() {
	$("#formcargo").validate({
		// Define as regras
		rules:{
		
			//campoEmail:{
				// campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
				//required: true, email: true
			//},
			cargo:{
				// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minlength: 3
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			cargo:{
				required: "Porfavor, para cadastrar digite o cargo",
				minlength: "O cargo deve ter mais que 3 caracteres"
			}
		}
	});
});
//## Validação Formulario Cadastro funcionarios.
$(document).ready( function() {
$("#form_cad_func").validate({
// Define as regras
rules:{
nome:{
// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
required: true, minlength: 2
},
email:{
// campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
required: true, email: true
},
celular:{
required: true
},
senha:{
// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
required: true, minlength: 6, maxlength:12
}
},
// Define as mensagens de erro para cada regra
messages:{
nome:{
required: "Preenchimento obrigatório",
minlength: "Deve conter, no mínimo, 2 caracteres"
},
email:{
required: "Digite o e-mail",
email: "Porfavor, digite um e-mail válido"
},
celular:{
required: "Este campo também é obrigatório"
},
senha:{
required: "Digite uma senha",
minlength: "Sua senha deve conter, no mínimo, 6 caracteres",
maxlength: "Sua senha deve conter, no máximo, 12 caracteres"
}
}
});
});
//## Validação Formulario Cadastro unidade
$(document).ready( function() {
$("#form_cad_unidade").validate({
// Define as regras
rules:{
nome:{
// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
required: true, minlength: 2
},
email:{
// campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
required: true, email: true
},
tel:{
required: true
},
end_cidade:{
// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
required: true, minlength: 2
}
},
// Define as mensagens de erro para cada regra
messages:{
nome:{
required: "Preenchimento obrigatório",
minlength: "Deve conter, no mínimo, 2 caracteres"
},
email:{
required: "Digite o e-mail",
email: "Porfavor, digite um e-mail válido"
},
tel:{
required: "Este campo também é obrigatório"
},
end_cidade:{
required: "Digite a cidade",
minlength: "Deve conter, no mínimo, 2 caracteres"
}
}
});
});
//#####################################################################
//## Validação Formulario Cadastro cliente
$(document).ready( function() {
$("#form_cad_cliente").validate({
// Define as regras
rules:{
nome:{ required: true, minlength: 3 },
senha:{ required: true, minlength: 6, maxlength: 12 },
email:{ required: true, email: true },
tel:{ required: true },
end:{ required: true, minlength: 3 },
end_n:{ required: true },
end_bairro:{ required: true, minlength: 3 },
end_cep:{ required: true, minlength: 5 },
cpf:{ required: true, minlength: 9 },
rg:{ required: true, minlength: 5 }
},
// Define as mensagens de erro para cada regra
messages:{
nome:{ required: "Preenchimento obrigatório", minlength: "Deve conter, no mínimo, 3 caracteres" },
senha:{ required: "Preenchimento obrigatório", minlength: "Deve conter, no mínimo, 6 caracteres", maxlength: "Deve conter, no máximo, 12 caracteres" },
email:{ required: "Digite o e-mail do cliente", email: "Porfavor, digite um e-mail válido" },
tel:{ required: "Este campo é obrigatório" },
end_bairro:{ required: "Este campo é obrigatório", minlength: "Deve conter, no mínimo, 3 caracteres" },
end_cep:{ required: "Este campo é obrigatório", minlength: "Deve conter, no mínimo, 5 caracteres" },
end_n:{ required: "Este campo é obrigatório"},
end:{ required: "Digite o endereço do cliente", minlength: "Deve conter, no mínimo, 3 caracteres"},
cpf:{ required: "Informações Fiscais são de preenchimento obrigatório", minlength: "Deve conter, no mínimo, 9 caracteres"},
rg:{ required: "Informações Fiscais são de preenchimento obrigatório", minlength: "Deve conter, no mínimo, 5 caracteres"}
}
});
});
//#####################################################################
//## Validação Formulario Cadastro de fornecedor
$(document).ready( function() {
$("#form_cad_fornecedor").validate({
// Define as regras
rules:{

telfor:{ required: true },
endfor:{ required: true, minlength: 3 },
numfor:{ required: true },
baifor:{ required: true, minlength: 3 },
cepfor:{ required: true },

},
// Define as mensagens de erro para cada regra
messages:{
telfor:{ required: "Este campo é obrigatório" },
baifor:{ required: "Este campo é obrigatório", minlength: "Deve conter, no mínimo, 3 caracteres" },
endfor:{ required: "Este campo é obrigatório", minlength: "Deve conter, no mínimo, 3 caracteres" },
numfor:{ required: "Este campo é obrigatório"},
cepfor:{ required: "Digite o endereço do cliente"}
}
});
});
//########################
//## Validação Formulario Cadastro de equipamento
$(document).ready( function() {
$("#form_cad_equipamento").validate({
// Define as regras
rules:{
nome:{ required: true, minlength: 3 },
marca:{ required: true, minlength: 3 }
},
// Define as mensagens de erro para cada regra
messages:{
nome:{ required: "Preenchimento obrigatório", minlength: "Deve conter, no mínimo, 3 caracteres"},
marca:{ required: "Preenchimento obrigatório", minlength: "Deve conter, no mínimo, 3 caracteres"}
}
});
});
//########################
//## Validação Formulario Cadastro de OS
$(document).ready( function() {
$("#form_cad_os").validate({
// Define as regras
rules:{ data_prevista:{ required: true },data_prevista_hora:{ required: true },defeito:{ required: true, minlength: 10 },solucao:{ required: true, minlength: 10}},
// Define as mensagens de erro para cada regra
messages:{
data_prevista:{ required: "Preenchimento obrigatório"},
data_prevista_hora:{ required: "Preenchimento obrigatório"},
defeito:{ required: "Preenchimento obrigatório", minlength: "Descreva o problema do equipamento, mínimo de 10 caracteres"},
solucao:{ required: "Preenchimento obrigatório", minlength: "Conte o que será feito no equipamento, mínimo de 10 caracteres"}
}
});
});
//########################
//## Validação Formulario buscar cliente
$(document).ready( function() {
$("#form_buscar_cliente").validate({
// Define as regras
rules:{ filtro:{ required: true, minlength: 3}},
// Define as mensagens de erro para cada regra
messages:{
data_prevista:{ required: "Preenchimento obrigatório"},
filtro:{ required: "Preenchimento obrigatório", minlength: "Digite o nome, razão social, telefone ou email do cliente, mínimo de 3 caracteres"}
}
});
});
//########################

