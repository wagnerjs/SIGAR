function Iniciar() {
      	 editor.document.designMode = 'On';
         document.forms["formEdit"].onsubmit=function(){
         document.getElementById("texto").value=editor.document.body.innerHTML
         return true
         }
	}

	function recortar() {
		editor.document.execCommand('cut', false, null);
	}

	function copiar() {
		editor.document.execCommand('copy', false, null);
	}

	function colar() {
		editor.document.execCommand('paste', false, null);
	}

	function desfazer() {
		editor.document.execCommand('undo', false, null);
	}

	function refazer() {
		editor.document.execCommand('redo', false, null);
	}

	function negrito() {
		editor.document.execCommand('bold', false, null);
	}

	function italico() {
		editor.document.execCommand('italic', false, null);
	}

	function sublinhado() {
		editor.document.execCommand('underline', false, null);
	}

	function alinharEsquerda() {
		editor.document.execCommand('justifyleft', false, null);
	}

	function centralizado()	{
		editor.document.execCommand('justifycenter', false, null);
	}

	function alinharDireita() {
		editor.document.execCommand('justifyright', false, null);
	}

	function numeracao() {
		editor.document.execCommand('insertorderedlist', false, null);
	}

	function marcadores() {
		editor.document.execCommand('insertunorderedlist', false, null);
	}

	function alterarFonte(f) {
		if(f != '')
			editor.document.execCommand('fontname', false, f);
	}

	function alterarTamanho(t) {
		if(t != '')
			editor.document.execCommand('fontsize', false, t);
	}

	function incluirSelecionados()
	{
		var j = 0;

		var optDisp = $("email_disponivel");
		var optSel = $("email_selecionado");

		for ( i = optDisp.options.length-1; i >= 0; i-- )
		{
			if ( optDisp.options[i].selected )
			{
				var opt = new Option( optDisp.options[i].text, optDisp.options[i].value );
				optSel.options.add( opt );
				optDisp.options[i] = null;
				j++;
			}
		}

		if ( j == 0 )
		{
			alert('Selecione ao menos um email!');
		}
		else
		{
			ordenarCombo( optDisp );
			ordenarCombo( optSel );
		}
	}

	function incluirTodos()
	{
		var optDisp = $("email_disponivel");
		if ( optDisp.length == 0 )
		{
			alert('Nenhum email disponível!');
		}
		else
		{
			var optSel = $("email_selecionado");
			for ( i = optDisp.options.length-1; i >= 0; i-- )
			{
				var opt = new Option( optDisp.options[i].text, optDisp.options[i].value );
				optSel.options.add( opt );
				optDisp.options[i] = null;
			}
			ordenarCombo( optSel );
			ordenarCombo( optDisp );
		}
	}

	function excluirSelecionados()
	{
		var j = 0;

		var optSel = $("email_selecionado");
		var optDisp = $("email_disponivel");

		for ( i = optSel.length-1; i >= 0 ; i-- )
		{
			if( optSel.options[i].selected )
			{
				var opt = new Option( optSel.options[i].text, optSel.options[i].value );
				optDisp.options.add( opt );
				optSel.options[i] = null;
				j++;
			}
		}
		if ( j == 0 )
		{
			alert('Escolha ao menos um email!');
		}
		else
		{
			ordenarCombo( optDisp );
			ordenarCombo( optSel );
		}
	}

	function excluirTodos()
	{
		var optSel = $("email_selecionado");
		if ( optSel.length == 0 )
		{
			alert( 'Nenhum email disponível!' );
		}
		else
		{
			var optDisp = $("email_disponivel");
			for ( i = optSel.length-1; i >= 0 ; i-- )
			{
				var opt = new Option( optSel.options[i].text, optSel.options[i].value );

				optDisp.options.add( opt );
				optSel.options[i] = null;
			}
			ordenarCombo( optDisp );
			ordenarCombo( optSel );
		}
	}

	function gravar()
	{

		var hdSel = $("tt_selecionadas");
		var opSel = $("email_selecionado");

		var hdDisp = $("tt_disponiveis");
		var opDisp = $("email_disponivel");

		hdSel.value = "";
		hdDisp.value = "";

		for ( i = 0; i < opSel.options.length; i++ )
		{
			hdSel.value += opSel.options[i].value + ( (i+1) < opSel.options.length ? ";" : "" );
		}

		for ( i = 0; i < opDisp.options.length; i++ )
		{
			hdDisp.value += opDisp.options[i].value + ( (i+1) < opDisp.options.length ? ";" : "" );
		}

		document.forms[0].submit();
	}


