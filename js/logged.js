var h = $(document).height();
h=h-70;

function newNote(noteid, noteContent, startx, starty){
  var nTempl = '<div class="note hidden" data-noteid="'+noteid+'" style="top: '+starty+'px; left: '+startx+'px;">' +
        '<a href="javascript:;" class="button remove">X</a>' +
        '<textarea class="textnote" class="form-control">'+noteContent+'</textarea>' +
        '</div>';
  $('#notesArea').append(nTempl);
  $.ajax({
    method: "POST",
    url: "./script/updatedatabase.php",
    data: { new: true,
     		coordinateX: startx,
            coordinateY: starty
          }

  });
}

function updateID() {
	$.ajax({
    method: "POST",
    url: "./script/updatedatabase.php",
    data: { update: true },
    dataType : 'json',
        success : function (result) {
        	$('.note').last().attr("data-noteid", parseInt(result['note_id']));
        }
    });
}


$("#notesArea").height(h);

$('#add_new').on('click', function() {
	newNote(0, "", 70, 70);
	updateID();
    
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
    onInput();
    deleteNote();
});