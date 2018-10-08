function alterarCor(){
	var elemCor = document.getElementById("corFundo");
	var elemBody = document.getElementById("corpo");
	elemBody.setAttribute("style","background-color: "+elemCor.value+";");	
}