
function validar() {
    var nome = frm.nome.value;
    var email = frm.email.value;
    var cpf = frm.cpf.value;
    var telefone = frm.telefone.value;

    if (nome == "") {
        alert('Preencha o campo com seu nome');
        frm.nome.focus();
        return false;
    }

    if (cpf.length != 11) {
        alert('Digite seu CPF completo');
        frm.cpf.focus();
        return false;
    }

    if (email == "") {
        alert('Preencha o campo com seu email');
        frm.email.focus();
        return false;
    }

    if (telefone == "") {
        alert('Preencha o campo com sua telefone');
        frm.telefone.focus();
        return false;
    }

}
