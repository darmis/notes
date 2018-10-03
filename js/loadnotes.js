var startx, starty, noteid, noteContent;

function addNote(noteid, noteContent, startx, starty, startW, startH){
  var startHeight = startH-25;
  var nTempl = '<div class="note hidden" data-noteid="'+noteid+'" style="top: '+starty+'px; left: '+startx+'px;">' +
        '<div class="heading">' + 
        '<a href="javascript:;" class="remove"><img src="./img/trash.png"></a>' +
        '</div>' + 
        '<textarea class="textnote" class="form-control" style="width: '+startW+'px; height: '+startHeight+'px;">'+noteContent+'</textarea>' +
        '</div>';
  $('#notesArea').append(nTempl);
}

function onInput() {
  $('.note').on('input', function() {
    var nid = parseInt($(this).attr('data-noteid'));
    var text = $(this).closest('.note').find('.textnote').val();

    $.ajax({
      method: "POST",
      url: "./script/updatedatabase.php",
      data: { content: text,
      activeID: nid }
    });
  });
}

function deleteNote() {
  $('.remove').on('click', function() {
    var nid = parseInt($(this).closest('.note').attr('data-noteid'));
    $(this).closest('.note').fadeOut(400, function() {
      $(this).remove();
    });
    $.ajax({
      method: "POST",
      url: "./script/updatedatabase.php",
      data: { deleteIt: true,
      activeID: nid }
    });
  });
}

function updateSize(startW, startH) {
  var w = startW;
  var h = startH;
  $('.textnote').mouseup(function(){
    var tempW = $(this).outerWidth();
    var tempH = $(this).outerHeight();
    var tempId = parseInt($(this).closest('.note').attr('data-noteid'));
    if (tempW != w || tempH != h) {
      $.ajax({
        method: "POST",
        url: "./script/updatedatabase.php",
        data: { activeW: tempW,
                activeH: tempH+25,
                activeID: tempId }
      });
    }
  });
}


$(document).ready(function(){

	$.ajax({
        url : './script/getcoordinates.php',
        type : 'POST',
        data : { loaded: true },
        dataType : 'json',
        success : function (result) {
          for (var i = 0; i < result.length; i++) {
            noteid = parseInt(result[i][0]);
            noteContent = result[i][2];
            startx = parseInt(result[i][3]);
            starty = parseInt(result[i][4]);
            startW = parseInt(result[i][5]);
            startH = parseInt(result[i][6]);

            addNote(noteid, noteContent, startx, starty, startW, startH);
            $('.note').removeClass("hidden").draggable({
              containment: "parent",
              stop: function(event, ui) {
                var pos = $(this).position();
                var offsetXPos = parseInt(pos.left);
                var offsetYPos = parseInt(pos.top);

                var nid = parseInt($(this).attr('data-noteid'));
                $.ajax({
                  method: "POST",
                  url: "./script/updatedatabase.php",
                  data: { coordinateX: offsetXPos,
                          coordinateY: offsetYPos,
                          activeID: nid }
                });
              }
            });
            updateSize(startW, startH);
          }
          onInput();
          deleteNote();
        },
        error : function () {
           alert("error loading notes");
        }
  });
});