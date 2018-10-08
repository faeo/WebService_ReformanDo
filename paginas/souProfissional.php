<h2>Cadastrar Profissional</h2>
<form class="container-form text-center" action="?pg=cadastrarProfissional" method="POST">
		<div class="form-group">
			<span for="nome">Nome</span>
			<input class="form-control" type="text" name="nome" id="nome" />
		</div>

		<div class="form-group">
			<span for="apelido">Apelido</span>
			<input class="form-control" name="apelido" id="apelido" />

		</div>

        <div class="form-group">
			<span for="cpf">CPF</span>
			<input class="form-control" name="cpf" id="cpf" />
		</div>

        <div class="form-group">
			<span for="endereco">Endereço</span>
			<input class="form-control" name="endereco" id="endereco" />
		</div>

        <div class="form-group">
			<span for="bairro">Bairro</span>
			<input class="form-control" name="bairro" id="bairro" />
		</div>

		<div class="form-group">
			<span for="cidade">Cidade</span>
			<select class="form-control" name="cidade">
                <option value="baependi" >Baependi</option>
                <option value="cambuquira">Cambuquira</option> 
				<option value="tres coracoes">Três Corações</option> 	
			</select>
		</div>

        <div class="form-group">
			<span for="telefone">Telefone</span>
			<input class="form-control" name="telefone" id="telefone" />
		</div>

		<div class="form-group">
			<span for="profissao">Profissao</span>
			<select class="form-control" name="profissao">
				<option value="pintor" >Pintor</option>
				<option value="pedreiro">Pedreiro</option>
				<option value="encanador">Encanador</option> 
				<option value="marceneiro">Marceneiro</option>
				<option value="eletricista">Eletricista</option>
			</select>
		</div><br>

		<input class="btn btn-primary" type="submit" name="cadastrar" value="Cadastrar" />
</form> 