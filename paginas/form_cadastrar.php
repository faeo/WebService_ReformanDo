<h2>Formulário de Cadastro</h2>
<form class="container-form text-center" action="?pg=processar_formulario" method="POST">
		<div class="form-group">
			<span for="nomeObra">Nome da Obra</span>
			<input class="form-control" type="text" name="nomeObra" id="nomeObra" />
		</div>

		<div class="form-group">
			<span for="descObra">Descrição</span>
			<textarea class="form-control" name="descObra" id="descObra" ></textarea>
		</div>

		<div class="form-group">
			<span for="localObra">Localização</span>
			<select class="form-control" name="localObra">
				<option value="tres coracoes" selected>Três Corações</option> 
				<option value="baependi" >Baependi</option>
			</select>
		</div>

		<div class="form-group">
			<span for="profObra">Tipo de Profissional</span>
			<select class="form-control" name="profObra">
				<option value="todos" selected>Todos</option> 
				<option value="pintor" >Pintor</option>
				<option value="pedreiro">Pedreiro</option>
				<option value="encanador">Encanador</option> 
				<option value="marceneiro">Marceneiro</option>
				<option value="eletricista">Eletricista</option>
			</select>
		</div><br>

		<input class="btn btn-primary" type="submit" value="Cadastrar" />
</form>          
