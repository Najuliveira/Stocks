$(document).ready(function(){

    /*clique no objeto EMAIL usando a função anonima para fzr 'desaparacer' 
    um valor quando for clicado*/
       $('#usuario').click(
          function(){
            if($(this).val()=="example@gmail.com"){
                $(this).val('');
            }
        });
    
    /*clique no objeto SENHA usando a função anonima para fzr 'desaparacer' 
    um valor quando for clicado*/
        $('#senha').click(
          function(){
            if($(this).val()=="senha"){
                $(this).val('');
            }
        });
       
    /*clique no olho que possui o nome verSenha para ver a senha*/
        $('.verSenha').click(function(){
            let entrada=document.querySelector('#senha');
             if(entrada.getAttribute('type')=='password') {
                 entrada.setAttribute('type', 'text');
             }else {
                 entrada.setAttribute('type', 'password');
             }
             }); 
             
    /*clique no objeto BOTAO LOGAR para analisar se as informações estão 
    preenchidas corretamente e se sim, 'logar'*/ 
        $('#entrar').click(
            function(){
                if ($('#senha').val()=="senha" && $('#usuario').val()=="example@gmail.com" || $('#usuario').val()=='' && $('#senha').val()=='' ){
                    $('#mensagem').html("Insira usuário e senha!");
                    $('#mensagem').fadeIn(300).delay(2000).fadeOut(400);
                } else if ($('#usuario').val()==''|| $('#usuario').val()=="example@gmail.com"){
                    $('#mensagem').html("Insira um usuário");
                    $('#mensagem').fadeIn(300).delay(2000).fadeOut(400);
                 } else if ($('#senha').val()=='' || $('#senha').val()=="senha"){
                    $('#mensagem').html("Insira uma senha!");
                    $('#mensagem').fadeIn(300).delay(2000).fadeOut(400);
                 }else{
                   $.get("conexao.php", function(retornaConexao){
                     console.log(retornaConexao);
                 }); 

                var dados;
                 dados={u:$('#usuario').val(),
                        s:$('#senha').val()};
    
                $.post('pesquisaUsuario.php',dados,function(retornaUsuario){
                  if(retornaUsuario==""){
                      $('#mensagem').html("Usuário não encontrado.");
                      $('#mensagem').fadeIn(300).delay(2000).fadeOut(400);
                 } else {
                    window.location.replace('principal.php?id='+retornaUsuario);
                 }
                });
                }
            });      
        });

       