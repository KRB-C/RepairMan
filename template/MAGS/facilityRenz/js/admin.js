$(document).ready(function() {
  $("name=restBtn").click(function() {
    var x = $(this).val();
    var empID = $("#EmpID").val();
    $.ajax({
      url: "template/test.php",
      type: "POST",
      data: { empIDJQ: empID },
      success: function(data) {
        console.log(data);
        console.log(x);
        console.log(empID);
      }
    });
  });
});
