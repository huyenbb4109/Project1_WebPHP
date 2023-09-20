$(document).ready(function(){
  $(".search_text").on("keyup",function(){
      $(".list_item").show();
      var val = khong_dau($(this).val());
      if(val!=""){
          for (i = 0; i < $(".list_item").length; i++) {
              var attr_name =  khong_dau($(".list_item").eq(i).attr("data-name"));
              var attr_code =  khong_dau($(".list_item").eq(i).attr("data-code"));
              var result_name = attr_name.indexOf(val);
              var result_code = attr_code.indexOf(val);
              if(result_name >= 0 || result_code >= 0){
                  
              }else{
                  $(".list_item").eq(i).hide();
              }
          }
      }else{
          $(".list_item").show();
      }
     
  });
});


$(document).ready(function(){
    $("a[href='?option=editproduct']").css({"border":"1px solid white"});
});
function ConfirmDelete()
{
var x = confirm("Do you really want to delete?");
if (x)
  return true;
else
return false;
}
