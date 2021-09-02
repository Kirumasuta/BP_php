$(document).ready(function(){
    
  $("#submit").click(function(){

    	var login = $("#login").val();
	var password = $("#pwd").val();
	var email = $("#email").val();
  var repwd = $("#retypepwd").val();
    
	
    
    if((email == "") || (password == "") || (login == "") ) {
      
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter all the fields</div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "create_user.php",
        data: "&login="+login+"&email="+email+"&pwd="+password,
        success: function(html){    
          if(html=='true') {
            window.location="/index.php";
          }
          else {
            $("#message").html(html);
          }
        },
        beforeSend:function()
        {
          $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
        }
      });
    }
    return false;
  });
});
$('#retypepwd').on('keyup', function () {
    if ($(this).val() == $('#pwd').val()) {
        document.getElementById("submit").disabled = false;
      $('#message').html('Password is match').css('color', 'green');
    } else{
       document.getElementById("submit").disabled = true;
       $('#message').html('Passwords don\'t match').css('color', 'red');
  }
})
function validLogin(f)
{

};