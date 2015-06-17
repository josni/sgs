$().ready(function() {
    $("#form_cadastro").validate({
        rules: {
            NOME: "required",
            ARQUIVO: "required",
            UF: 
                {
                    required: true,
                    minlength: 2,
                    maxlength: 2
                }
        }
    });

   function eCPF() {
      var cpfstring  = $('#cpf').val();
      $.post( '../../Controller/cpf.php', {
         cpf: cpfstring
      },
      function(result_php) {
         if(result_php == 1){
            alert('CPF já cadastrado!');
            $('#cpf').css('border-color','#F00');
            $('#cpf').focus();
         }else{
            $('#cpf').css('border-color','#CCC');
         };
      });
   }

   function TestaCPF(cpf) {
     if(cpf == '') return false; 
       // Elimina CPFs invalidos conhecidos    
       if (cpf.length != 11 || 
           cpf == "00000000000" || 
           cpf == "11111111111" || 
           cpf == "22222222222" || 
           cpf == "33333333333" || 
           cpf == "44444444444" || 
           cpf == "55555555555" || 
           cpf == "66666666666" || 
           cpf == "77777777777" || 
           cpf == "88888888888" || 
           cpf == "99999999999")
               return false;       
       // Valida 1o digito 
       add = 0;    
       for (i=0; i < 9; i ++)       
           add += parseInt(cpf.charAt(i)) * (10 - i);  
           rev = 11 - (add % 11);  
           if (rev == 10 || rev == 11)     
               rev = 0;    
           if (rev != parseInt(cpf.charAt(9)))     
               return false;       
       // Valida 2o digito 
       add = 0;    
       for (i = 0; i < 10; i ++)        
           add += parseInt(cpf.charAt(i)) * (11 - i);  
       rev = 11 - (add % 11);  
       if (rev == 10 || rev == 11) 
           rev = 0;    
       if (rev != parseInt(cpf.charAt(10)))
           return false;       
       return true;
   }

   $('.cpf').blur(function(){
      var cpfstring  = $('.cpf').val();
      if( TestaCPF(cpfstring) === false ){
         alert('CPF inválido!');
         $(this).val('');
         $(this).focus();
      }else{
         eCPF();
      }
   });

});
//10797454918