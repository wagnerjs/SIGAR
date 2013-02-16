function verificaDados(){
    frm=document.form1;
    
    if(frm.txtNome.value == "")
    {
        alert('O nome é obrigatório!');
        frm.txtNome.focus();
        return false;
    }
    if(frm.dataNasc.value == "")
    {
        alert('A data de nascimento é obrigatório!');
        frm.dataNasc.focus();
        return false;
    }
    if(frm.email.value == "")
    {
        alert('O e-mail é obrigatório!');
        frm.email.focus();
        return false;
    }
    
    if(frm.telResidencial.value == "")
    {
        alert('O telefone residencial é obrigatório!');
        frm.telResidencial.focus();
        return false;
    }
    if(frm.endereco.value == "")
    {
        alert('O logradouro é obrigatório!');
        frm.endereco.focus();
        return false;
    }
    if(frm.numero.value == "")
    {
        alert('O número é obrigatório!');
        frm.numero.focus();
        return false;
    }
    if(frm.bairro.value == "")
    {
        alert('O bairro é obrigatório!');
        frm.bairro.focus();
        return false;
    }
    if(frm.cidade.value == "")
    {
        alert('A cidade é obrigatório!');
        frm.cidade.focus();
        return false;
    }
    if(frm.uf.value == "")
    {
        alert('A uf é obrigatório!');
        frm.uf.focus();
        return false;
    }
    if(frm.cep.value == "")
    {
        alert('O cep é obrigatório!');
        frm.uf.focus();
        return false;
    }
    
    return true;
}

