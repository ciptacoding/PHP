$(document).ready(function () {
  // event ketika keyword ditulis
  $("#search").on("keyup", function () {
    $("#tableContainer").load("ajax/book.php?keyword=" + $("#search").val());
  });
});
