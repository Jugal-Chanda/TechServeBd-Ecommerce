

$(document).ready(function(){

  $(".quantity_increase").click(function(){
    var cart_id =$(this).attr("value");
    $.ajax({
      url: "page_action/ajax_change_quantity.php",
      method: "POST",
      data:{
        cart_id: cart_id,
        action: "inc",
        password:"ajax1234"

      },
      success: function(data){
        //alert(data);
        location.reload(true);
      }
    });

  });

  $(".quantity_deccrease").click(function(){
    var cart_id =$(this).attr("value");
    $.ajax({
      url: "page_action/ajax_change_quantity.php",
      method: "POST",
      data:{
        cart_id: cart_id,
        action: "dec",
        password:"ajax1234"

      },
      success: function(data){
        //alert(data);
        location.reload(true);
      }
    });

  });

});
