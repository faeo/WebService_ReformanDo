<?php 
if(isset($_GET['filtro'])){
	$filtro = $_GET['filtro'];
}
else{
	$filtro = FALSE;
}
?>

<div class="text-center">
	<h2>Procure os melhores Profissionais</h2>
	<form method="POST" action="?pg=filtrarProfissionais" class="container-form text-center">

		<div class="form-group">
			<span for = "buscaNome">Nome:</span>
			<input class="form-control" type="text" name="buscaNome" placeholder="Digite o nome do profissional" value="">			
		</div>

        <div class="form-group">
            <span for = "buscaApelido">Apelido:</span>
			<input class="form-control" type="text" name="buscaApelido" placeholder="Digite o apelido do profissional" value="">		
		</div>

        <div class="form-group">
            <span for = "buscaNome">Cidade:</span>
                <select class="form-control" name="buscaCidade" id="buscaCidade">
                    <option value="baependi" >Baependi</option>
                    <option value="cambuquira">Cambuquira</option> 
                    <option value="tres coracoes">Três Corações</option> 
                </select>
		</div>

		<div class="form-group">
            <span for = "buscaProfissao">Profissao:</span>
				<select name="buscaProfissao" class="form-control" id="buscaProfissao">
                    <option value="pintor" >Pintor</option>
                    <option value="pedreiro">Pedreiro</option>
                    <option value="encanador">Encanador</option> 
                    <option value="marceneiro">Marceneiro</option>
                    <option value="eletricista">Eletricista</option>						
				</select>		
		</div>

		<div class="form-group">
            <span for = "buscaQualificacao">Qualificação:</span>
            	<select name="buscaQualificacao" class="form-control" id="buscaQualificacao">
					<option value=""> - </option>
					<option value="1"> 1 </option>
					<option value="2"> 2 </option>
                    <option value="3"> 3 </option>
					<option value="4"> 4 </option>
                    <option value="5"> 5 </option>
										
				</select>		
			</div>
		</div>

		<button type="submit" class="btn btn-primary" name="buscaProfissionais">Pesquisar</button> 
		<br>
	</form>
    <br><br>
    <h2> Lista de Profissionais </h2>
    <br>
    
   

</body>
</html>
	
	<?php	
       
		$query = "SELECT * FROM reformando_banco.profissionais ".$filtro;		
		$sql = mysqli_query($link, $query);
		$tr = 0;
		// echo "<textarea>".$query."</textarea>";
		
		if (mysqli_num_rows($sql) > 0) {
			while($row = mysqli_fetch_assoc($sql)) {
                //$img = "img/" . $row["img"]. ".png";
                
                if($tr == 0){
                    echo "
                    <div align='center'> 
                    ";
				}

                echo "
                    
					   		<img class='figure-img img-fluid rounded' src='img/profile.png' height='150' width='150' align= 'center'/><br> 
							Profissão: " . $row["profissao"]. "<br> 
							Qualificação: " . $row["qualificacao"]. "<br> 
                    ";
                $tr++;
                
                if($tr >= 3){
					echo "</div><br> ";
					$tr = 0;
				}

			
			}
		} else {
			echo "0 results";
		}		
		
	?>
    
</div>
