/**
 * @author Fellype
 */

$(document).ready(function(){
    
    $('#login input').focus(function(){ 
   		if (this.value==this.defaultValue) {
   			this.value='';
   		}
   		
   		$('#login input').css('color','#3c3c3c');
   	});
        
       $('#login input').focusout(function(){
   		if (this.value=='') {
   			this.value=this.defaultValue;
   			$('#login input').css('color','#9393aa');
   		}
   		
   	});
    
    
    $('#endResp').hide();
    $('#openEndResp').click(function(){
        $('#endResp').fadeIn('slow');
    });
    $('#closeEndResp').click(function(){
        $('#endResp').hide();
    });
    
    
    $('#cadEnv').click(function(event){
        alert('Are input fields valid? ' + $('input').isValid());
    });
    
        $('#inputDataNasc,#inputDataNascResp').mask("99/99/9999");
        $('#inputTelRes,#inputTelResp').mask("(99)9999-9999");
        $('.tel').mask("(99)9999-9999");
        $('#inputN').mask("99999");
        $('#inputCep').mask("99999-999");
        $('#inputCpf').mask("999.999.999-99");
        
        
    
        $(
            '#inputNome,#inputDataNasc,#inputEmail,#inputTelRes,#inputEscola,#inputEndereco,#inputN,#inputBairro,#inputCidade,#inputUf,#inputCep,#inputNomeResp,#inputDataNascResp,#inputCpf,#inputEmailResp,#inputTelResp'
        ).valid8("Necessário!");
	
	
   	
   	
        

});