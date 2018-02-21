$(document).ready(function(){
  $("#submit").click(function(){

    var name = $("#name").val().trim();
    var paw = $("#paw").val().trim();
    $.ajax({
      url: 'check.php',
      type: 'POST',
      data: {name:name, paw:paw},
      success: function(response){
        if(response == 1){
          window.location= "home.php";
        }
        else{
          alert("error");
        }
      }
    });


  });
});
