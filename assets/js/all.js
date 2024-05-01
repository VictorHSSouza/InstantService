function troca_cad() {
    if(document.getElementById("nome").value && document.getElementById("sobrenome").value && document.getElementById("email").value 
    && document.getElementById("cpf").value && document.getElementById("data_nascimento").value) {
        document.getElementById("cad1").setAttribute("style","display: none;");
        document.getElementById("troca_cad").setAttribute("style","display: none;");
        document.getElementById("submit").setAttribute("style","display: true;");
        document.getElementById("cad2").setAttribute("style","display: true;");
    } else {
        alert('todos os campos abaixo devem ser preenchidos')
    }
        
}

function mascara_cpf()
{
    var cpf = document.getElementById("cpf").value
    console.log(cpf)
    cpf=cpf.slice(0,14)
    console.log(cpf)
    document.getElementById("cpf").value= cpf
    var tel_formatado = document.getElementById("cpf").value
    if (tel_formatado[3]!=".")
    {
        if(tel_formatado[3]!=undefined)
        {
            document.getElementById("cpf").value=tel_formatado.slice(0,3)+"."+ tel_formatado[3]; 
        }
    }
    if (tel_formatado[7]!=".")
    {
        if(tel_formatado [7]!=undefined)
        {
            document.getElementById("cpf").value=tel_formatado.slice(0,7)+"."+tel_formatado[7]
        }
    }
    if (tel_formatado[11]!="-")
    {
        if(tel_formatado [11]!= undefined )
        {
            document.getElementById("cpf").value=tel_formatado.slice(0,11)+ "-" + tel_formatado[11]
        }
    }
}

function somente_numeros(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
	    return false;
	    return true;
}