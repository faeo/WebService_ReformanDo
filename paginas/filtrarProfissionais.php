<?php
if(isset($_POST['buscaProfissionais'])){
    $filtroAux = "";
    $buscaNome = $_POST['buscaNome'];
	//$buscaCidade = $_POST['buscaCidade'];
    $buscaProfissao = $_POST['buscaProfissao'];
    //$buscaQualificacao = $_POST['buscaQualificacao'];
    $where = FALSE;

    if($buscaNome != ""){
        $buscaNome = "WHERE nome LIKE '$buscaNome' ";
        $filtroAux = $buscaNome;
        $where = TRUE;
    }
    else{
        $filtroAux = "";
        $buscaNome = "";
    }
    
    $cat = "";
    //WHERE active?
    if($where == TRUE){
        $cat = " AND ";
    }
    else{
        $cat = " WHERE ";
    }
    //SELECT * FROM reformando_banco.pessoas INNER JOIN reformando_banco.profissionais ON pessoas.idpessoas = profissionais.pessoas_idpessoas WHERE profissao = 'pintor';
    if($buscaProfissao == "pintor"){
        $cat .= " profissao = 'pintor'";
    }
    elseif($buscaProfissao == "pedreiro"){
        $cat .= " profissao = 'pedreiro'";
    }
    elseif($buscaProfissao == "encanador"){
        $cat .= " profissao = 'encanador'";
    }
    elseif($buscaProfissao == "eletricista"){
        $cat .= " profissao = 'eletricista'";
    }
    elseif($buscaProfissao == "marceneiro"){
        $cat .= " profissao = 'marceneiro'";
    }
    else{
        $cat .= "TRUE";
    }

    $filtroAux .= $cat;

    //SELECT * FROM reformando_banco.pessoas INNER JOIN reformando_banco.profissionais ON pessoas.idpessoas = profissionais.pessoas_idpessoas WHERE profissao = 'pintor' AND qualificacao = '0';
   /* if($buscaQualificacao == "menor"){
        $preco = " AND qualificacao = ''";
    }
    elseif($buscaQualificacao == "maior"){
        $preco = " ORDER BY valor DESC";
    }

    $filtroAux .= $preco;*/
    
    header('Location: ?pg=profissionais&filtro='.$filtroAux);
}
?>