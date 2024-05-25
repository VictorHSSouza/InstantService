function cad_habilidade(id_profissional,id_habilidade,status_habilidade){

    //ignorar
    if(window.XMLHttpRequest)
    {
        var xhttp = new XMLHttpRequest();
    } 
    else 
    {	
        var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // ACONTECERÁ ASSIM QUE O PHP FOR EXECUTADO
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200)
        {		
            //xhttp.responseText
            if(status_habilidade == 0) {
                document.getElementById("habilidade"+id_habilidade).setAttribute("style","display: none;");
                document.getElementById("habilidade_cad"+id_habilidade).setAttribute("style","display: true;");
            } else {
                document.getElementById("habilidade"+id_habilidade).setAttribute("style","display: true;");
                document.getElementById("habilidade_cad"+id_habilidade).setAttribute("style","display: none;");
            }
            
        }
    }	

    // ACONTECERÁ ASSIM QUE O EVENTO FOR CHAMADO	
    //alert("/profissional_habilidades_cadastro?cad_habilidade=1&id_profissional="+id_profissional+"&id_habilidade="+id_habilidade+"&status_habilidade="+status_habilidade); 
    xhttp.open("GET","/profissional_habilidades_cadastro?cad_habilidade=1&id_profissional="+id_profissional+"&id_habilidade="+id_habilidade+"&status_habilidade="+status_habilidade,true);         //solicitação
    xhttp.send(null);
}