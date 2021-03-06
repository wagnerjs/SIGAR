/**
 * @author Fellype
 */
function abrirModal(id) {
    $.get('http://localhost/SIGAR/codigo/SIGAR/src/view/listarAlunoAjax.php',
    { alunoID : id},
    function(data) {
        $("#ajaxContainer").fadeIn(400).html(data);
        $('a[name=modal]').click();
    })
}


$(document).ready(function(){
    
    $('#dispCalendar td').click(function(){
        if ($(this).attr('class') == "selection") {
            //alert("cacete!");
            $(this).attr('class','');
        }
        else {
            $(this).attr('class','selection');
        }
    });
    
    $('#dispCalendar2 td').click(function(){
         $('#dispCalendar2 td').attr('class', '');
         $(this).attr('class','selection');
    });
    
    $('#cadEnvDisp').click(function(){
       var dia = new Array();
       var horario = new Array();
       var i = -1;
       $('.selection').each(function(){
           i = i + 1;
           dia[i] = $(this).attr('name');
           horario[i] = $(this).html();       
       });
       
       $('#DispTest').append("<br>");
       for (var e = 0; e <= i; e++) {
           $('#DispTest').append("<input name='dia[]' type='text' value="+dia[e]+" id='esconder'/> <input name='horario[]' type='text' value="+horario[e]+" id='esconder'/><br>");
       } 
       
       
    });
    
    $('#cadEnvDisp2').click(function(){
       var horario = new Array();
       var i = -1;
       $('.selection').each(function(){
           i = i + 1;
           horario[i] = $(this).html();       
       });
       
       $('#DispTest').append("<br>");
       for (var e = 0; e <= i; e++) {
           $('#DispTest').append("<input name='horario[]' type='text' value="+horario[e]+" id='esconder' /><br>");
       } 
       
       
    });
    
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
    
    $('#inputDataNasc,#inputDataNascResp').mask("99/99/9999");
    $('#inputTelRes,#inputTelResp').mask("(99) 9999-9999");
    $('.tel').mask("(99) 9999-9999");
    $('#inputN').mask("?99999");
    $('#inputNResp').mask("?99999");
    $('#inputCep').mask("99999-999");
    $('#inputCepResp').mask("99999-999");
    $('#inputCpf').mask("999.999.999-99");

    $(
        '#inputNome,#inputDataNasc,#inputEmail,#inputTelRes,#inputEscola,#inputEndereco,#inputN,#inputBairro,#inputCidade,#inputUf,#inputCep,#inputNomeResp,#inputDataNascResp,#inputCpf,#inputEmailResp,#inputTelResp'
    ).valid8("Necessário!");
    
     $('#endResp').hide();
    $('#openEndResp').click(function(){
        $('#endResp').fadeIn('slow');
    });
    $('#closeEndResp').click(function(){
        $('#endResp').hide();
    });
    
    //select all the a tag with name equal to modal
	$('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		
		//Get the A tag
		var id = $(this).attr('href');
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	
	});
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			

	$(window).resize(function () {
	 
 		var box = $('#boxes .window');
 
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
      
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
               
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();

        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);
	 
	});
    
    $('input#id_search').quicksearch('table#table_example tbody tr');    
    
    $('#cadEnv').click(function(event){
        alert('Are input fields valid? ' + $('input').isValid());
    });
       
});
