function troca_cad() {
    if(document.getElementById("nome").value && document.getElementById("sobrenome").value && document.getElementById("email").value 
    && document.getElementById("cpf").value && document.getElementById("data_nascimento").value && document.getElementById("cpf").value.length == 14 && mascara_email(document.getElementById("email").value) && mascara_data(document.getElementById("data_nascimento").value)) {
        document.getElementById("cad1").setAttribute("style","display: none;"); 
        document.getElementById("troca_cad").setAttribute("style","display: none;");
        document.getElementById("submit").setAttribute("style","display: true;");
        document.getElementById("cad2").setAttribute("style","display: true;");
    } else {
        alert('Todos os campos abaixo devem ser preenchidos corretamente')
    }
        
}

function voltar_cad() {
    document.getElementById("submit").setAttribute("style","display: none;");
    document.getElementById("cad2").setAttribute("style","display: none;");
    document.getElementById("cad1").setAttribute("style","display: true;");
    document.getElementById("troca_cad").setAttribute("style","display: true;");
}

function mascara_cpf()
{
    var cpf = document.getElementById("cpf").value
    console.log(cpf)
    cpf=cpf.slice(0,14)
    console.log(cpf)
    document.getElementById("cpf").value= cpf
    var cpf_formatado = document.getElementById("cpf").value
    if (cpf_formatado[3]!=".")
    {
        if(cpf_formatado[3]!=undefined)
        {
            document.getElementById("cpf").value=cpf_formatado.slice(0,3)+"."+ cpf_formatado[3]; 
        }
    }
    if (cpf_formatado[7]!=".")
    {
        if(cpf_formatado [7]!=undefined)
        {
            document.getElementById("cpf").value=cpf_formatado.slice(0,7)+"."+cpf_formatado[7]
        }
    }
    if (cpf_formatado[11]!="-")
    {
        if(cpf_formatado [11]!= undefined )
        {
            document.getElementById("cpf").value=cpf_formatado.slice(0,11)+ "-" + cpf_formatado[11]
        }
    }
}

function mascara_cep()
{
    var cep = document.getElementById("cep").value
    console.log(cep)
    cep=cep.slice(0,9)
    console.log(cep)
    document.getElementById("cep").value= cep
    var cep_formatado = document.getElementById("cep").value
    if (cep_formatado[5]!="-")
    {
        if(cep_formatado [5]!=undefined)
        {
            document.getElementById("cep").value=cep_formatado.slice(0,5)+"-"+cep_formatado[5]
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

function mascara_email(email) {
	if ((email == null) || (email.length < 4))
    return false;

    var partes = email.split('@');
    if (partes.length < 2 ) return false;

    var pre = partes[0];
    if (pre.length == 0) return false;
    
    if (!/^[a-zA-Z0-9_.-/+]+$/.test(pre))
        return false;

    // gmail.com, outlook.com, terra.com.br, etc.
    var partesDoDominio = partes[1].split('.');
    if (partesDoDominio.length < 2 ) return false;

    for ( var indice = 0; indice < partesDoDominio.length; indice++ )
    {
        var parteDoDominio = partesDoDominio[indice];

        // Evitando @gmail...com
        if (parteDoDominio.length == 0) return false;  

        if (!/^[a-zA-Z0-9-]+$/.test(parteDoDominio))
            return false;
    }

    return true;
}

function mascara_data(data)
{

    var data_atual = new Date().toLocaleDateString();
   
    const split_atual = data_atual.split("/", 3);
    const split_data = data.split("-", 3);

    if(((split_atual[2]-16)>split_data[0]) || ((split_atual[2]-16) === split_data[0] && split_atual[1]>split_data[1]) || ((split_atual[2]-16) === split_data[0] && split_atual[1] === split_data[1] && split_atual[0]>split_data[2]) || ((split_atual[2]-16) === split_data[0] && split_atual[1] === split_data[1] && split_atual[0] === split_data[2])) return true
    else return false;
}