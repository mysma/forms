$(document).ready( function(){
  $("#submit1").click(function(){
    $("#naglowek").toggle(1000,'linear');
  });
  $("#prace").click(function(){
    $("#ShowPrace").toggle(1000,'linear');
  });
  $("#popraw").click(function(){

    var temat = $("#temat").val().trim();
    var comment = $("#comment").val().trim();
    $.ajax({
      url: 'update_naglowek.php',
      type: 'POST',
      data: {temat:temat, comment:comment},
      success: function(response){
        if(response == 0){
          alert("error");
        }
        else{
          alert("Poprawione!");
          location.reload();
        }
      }
    });
  });
  $("button[id='poprawa']").click(function(){

    var link = $("#link").val().trim();
    var title = $("#title").val().trim();
    var opis = $("#opis").val().trim();
    var id = $("#id").val().trim();

    $.ajax({
      url: 'update_prace.php',
      type: 'POST',
      data: {link:link, title:title, opis:opis, id:id},
      success: function(response){
        if(response == 0){
          alert("error");
        }
        else{
          alert("Poprawione!");
          location.reload();
        }
      }
    });


  });
  });
