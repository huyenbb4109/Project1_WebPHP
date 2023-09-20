
$(document).ready(function(){
    $("a[href='?option=addproduct']").css({"border":"1px solid white"});
    form_ok = 0;
    
    $("#img").change(function () {
        if (this.files && this.files[0]) {
            var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $("#img").val("");
                $(this).next(".check_error").html("Only format allowed : "+fileExtension.join(', '));   
            }else{
                $("#myImg").attr("src",URL.createObjectURL(this.files[0]));
            }                    
        }    
    });
    $("#img").click(function(){
        $(this).next(".check_error").html(""); 
    });

    $("input[name=codepd]").on('blur, keyup', function() {
        if($(this).val()!=""){
            $.ajax({
                url:"check_codepd.php",
                type:'post',
                data:"codepd="+$(this).val(),
                dataType:'json',
                async:true,
                success:function(kq){
                    if(typeof kq.error != "undefined"){
                        form_ok = 1;
                        $("#checkcodepd").html('Sorry, this product code already exists.');
                        $("#cpd").css({
                        "border":"2px solid #dadada",
                        "outline":"none",
                        "border-color":"#ED9E9E",
                        "box-shadow":"0 0 10px #ED9E9E"
                        });   
                    }else{
                        form_ok = 0;
                        $("#checkcodepd").html('');
                    }
                }
            });
        }
    });
    $("input[name=codepd], input[name=img]").on('focus, click, keyup', function() {
        $(this).next(".check_error").html('');
        $("input[name=codepd]").attr({"style":""});
        form_ok = 0;
    });

    
    $("form").submit(function(e){
        if(form_ok!=0){                    
            e.preventDefault();
            $("input[name=codepd]").focus();                     
        }else{
            $(this).unbind('submit').submit();
        }
        
    });

    $("input, textarea").on("keyup",function(){
        if(typeof $(this).attr('maxlength') !== "undefined" && $(this).attr('maxlength') !== false ){
            length = $(this).val().length;
            max = parseInt($(this).attr('maxlength'));
            if(length!=0){
                $(this).next(".editcolor").html("("+length+"/"+max+" characters)");
            }else{
                $(this).next(".editcolor").html("");
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
