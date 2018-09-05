var h = $(document).height();
h=h-70;

$('#note').bind('input propertychange', function() {
  $.ajax({
    method: "POST",
    url: "./script/updatedatabase.php",
    data: { content: $("#note").val() }
  });
});

$("#notesArea").height(h);

$(".note").draggable({
  containment: "parent"
});

$(".toggleForms").click(function() {
  $("#signUpForm").toggle();
  $("#logInForm").toggle();
});