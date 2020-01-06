$(document).ready(function(){
$('#Enviar').click(function(){
        
      
        var enlace1='../php/AddQuestionWithImage.php';
        var frm = $("#formquestion")[0];
        var fd = new FormData(frm);
        var files = $('#file')[0].files[0];
        fd.append('file',files);
       

        $.ajax({

            type: 'post' , 
            enctype: 'multipart/form-data',
            url: enlace1,
             contentType: false,
            processData: false,
            data: fd,
            dataType: "html",
            success:function(){ 
                $('#resultado').load("../php/tabla.php");
            },
            cache: false,
            error:function(){ 
                $('#resultado').html('<p class="error"><strong>El servidor parece que no responde</p>');
            }

        }); 
        });

});