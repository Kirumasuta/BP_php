$(document).ready(function(){

  $("#submit").click(function(){

    var login = $("#login").val();
    var password = $("#pwd").val();

    if((login == "") || (password == "")) {
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Enter username and password</div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "check_user.php",
        data: "&login="+login+"&pwd="+password,

        success: function(html){
          if(html.valueOf() == '')
          {
            $("#html").html("Неправильные данные")
          }


        },
      });
    }
    return false;
  });
});