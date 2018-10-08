<?php
if(isset($_POST['buscaProfissionais'])){
    $filtroAux = "";
    //$buscaNome = $_POST['buscaNome'];
    //$buscaApelido = $_POST['buscaApelido'];
	//$buscaCidade = $_POST['buscaCidade'];
    $buscaProfissao = $_POST['buscaProfissao'];
    $buscaQualificacao = $_POST['buscaQualificacao'];
    //$where = FALSE;
    /*
    if($busca != ""){
        $busca = "WHERE nome LIKE '%".$busca."%'";
        $filtroAux = $busca;
        $where = TRUE;
    }
    else{
        $filtroAux = "";
        $busca = "";
    }
    */
    $cat = "";

    if($where == TRUE){
        $cat = " AND ";
    }
    else{
        $cat = " WHERE ";
    }
    //SELECT * FROM reformando_banco.profissionais WHERE profissao = 'pintor';
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

    //SELECT * FROM reformando_banco.profissionais WHERE profissao = 'pintor' AND qualificacao = '0';
    if($buscaQualificacao == "menor"){
        $preco = " AND qualificacao = ''";
    }
    elseif($buscaQualificacao == "maior"){
        $preco = " ORDER BY valor DESC";
    }

    $filtroAux .= $preco;
    
    header('Location: ?pg=profissionais&filtro='.$filtroAux);
}
?>