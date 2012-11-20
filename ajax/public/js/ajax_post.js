$(document).ready(function(){
   $("#login_submit").click(function(){
        var username  = $("#username").val();
        var password  = $("#password").val();

       $.ajax({
           type     : "POST",
           url      : "http://localhost/belajar/ajax/index.php/ajax_post/post_function",
           dataType : "json",
           data     : {
                "username"      : username,
                "password"      : password
           },
           cache    : false,
           success  : function(response){
               $("#form_message").html(response.message).css({
                   'background-color'   : response.bg_color
               }).fadeIn('slow');
           }
       });
       return false;
   });
});