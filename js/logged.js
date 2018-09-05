var h = $(document).height();
h=h-70;
var startx, starty;


$(document).ready(function(){
	$.ajax({
        url : './script/getcoordinates.php',
        type : 'POST',
        data : { loaded: true },
        dataType : 'json',
        success : function (result) {
            startx = parseInt(result.x);
            starty = parseInt(result.y);
            $('.note').css({'top': starty, 'left' : startx}).removeClass("hidden");
        },
        error : function () {
           alert("oh boy, error!!!");
        }
    });
});

$('#note').bind('input propertychange', function() {
  $.ajax({
    method: "POST",
    url: "./script/updatedatabase.php",
    data: { content: $("#note").val() }
  });

});

$("#notesArea").height(h);

$(".note").draggable({
  containment: "parent",
  stop: function(event, ui) {
    var offsetXPos = parseInt( ui.offset.left ) -12;
    var offsetYPos = parseInt( ui.offset.top ) -57;
    $.ajax({
      method: "POST",
      url: "./script/updatedatabase.php",
      data: { coordinateX: offsetXPos,
              coordinateY: offsetYPos }
    });
  }
});