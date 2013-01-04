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

});