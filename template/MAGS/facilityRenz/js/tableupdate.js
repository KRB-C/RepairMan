function show(nr) {
  document.getElementById("table1").style.display = "none";
  document.getElementById("table2").style.display = "none";
  document.getElementById("table3").style.display = "none";
  document.getElementById("table4").style.display = "none";
  document.getElementById("table" + nr).style.display = "block";
}
