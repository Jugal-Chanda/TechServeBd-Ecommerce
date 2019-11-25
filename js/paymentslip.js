function printData()
{
   var divToPrint=document.getElementById("print_area");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   //newWin.close();
}
$(document).ready(function(){
  $('#print_slip').click(function(){
    printData();
  });
});
