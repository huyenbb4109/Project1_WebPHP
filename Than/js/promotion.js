$(document).ready(function(){
    $("a[href='?option=promotion']").css({"border":"1px solid white"});

    form_ok = 0;
    $("input[name=codepd]").on('blur, keyup', function() {
        if($(this).val()!=""){
            $.ajax({
                url:"check_pm.php",
                type:'post',
                data:"codepd="+$(this).val(),
                dataType:'json',
                async:true,
                success:function(kq){
                    if(typeof kq.error != "undefined"){
                        form_ok = 1;
                        $("#checkcodepd_pm").html(kq.error);
                        $("#cpd").css({
                            "border":"2px solid #dadada",
                            "outline":"none",
                            "border-color":"#ED9E9E",
                            "box-shadow":"0 0 10px #ED9E9E"
                            });                                                                               
                    }else{
                        form_ok = 0;
                        $("#checkcodepd_pm").html('');
                        $("input[name=codepd]").attr({"style":""});  
                    }
                }
            });
            
        }
        
    });
    
           

    $("input[name=codepd]").on('focus, click', function() {            
        $(this).next(".check_error").html('');
        $(this).attr({"style":""});  
        form_ok = 0;
    });
    $("input[name=percent]").on('focus, click, keyup', function() {
        value = $(this).val();
        if(value!=""){
            validation_pattern = new RegExp('^[0-9]*$');
            if(!validation_pattern.test(value)){
                $("#check_percent").html("Please enter the number!");
                $(this).css({
                    "border":"2px solid #dadada",
                    "outline":"none",
                    "border-color":"#ED9E9E",
                    "box-shadow":"0 0 10px #ED9E9E"
                });
            }else{
                $("#check_percent").html("");
                $(this).attr({"style":""});
            }
        }else{
            $("#check_percent").html("");
            $(this).attr({"style":""});
        }
    });

    $("form").submit(function(e){
       
         
        if(form_ok!=0){  
            e.preventDefault();              
            $("input[name=codepd]").focus();
        }else{
            
            $(this).unbind('submit').submit();
        }
        
    });

    $("input").on("keyup",function(){
            if(typeof $(this).attr('maxlength') !== "undefined" && $(this).attr('maxlength') !== false ){
                length = $(this).val().length;
                max = parseInt($(this).attr('maxlength'));
                if(length!=0){
                    $(this).next(".maxlengthpm").html("("+length+"/"+max+" characters)");
                }else{
                    $(this).next(".maxlengthpm").html("");
                }                   
            }
        });

});

$(document).ready(function(){
    $(".text_code, .text_percent").on("keyup",function(){
        $(".list_item2").show();
        code = khong_dau($(".text_code").val());
        if($(".text_percent").val()!=""){                
            percent = parseInt($(".text_percent").val());
        }else{                
            percent = "";
        }
        if(code=="" && percent==""){
            $(".list_item2").show();
        }else{
            for (i = 0; i < $(".list_item2").length; i++) {
                result_code = -1;
                result_percent = -1;
                if(code!=""){
                    attr_code =  khong_dau($(".list_item2").eq(i).attr("data-code"));
                    if(attr_code.indexOf(code) >=0){
                        result_code = 1;
                    };
                }
                if(percent!=""){
                    attr_percent =  parseInt($(".list_item2").eq(i).attr("data-percent"));
                    if(attr_percent == percent){
                        result_percent = 1;
                    }
                }
                if(result_code >= 0 || result_percent >= 0){
                    
                }else{
                    $(".list_item2").eq(i).hide();
                }
            }
            
        }
        
    });
});

function exit_home(){
    location.assign('index.php');
}
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}