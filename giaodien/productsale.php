<!-- -------------------------------------------------------------------------------------------------------- -->
<?php  
    require_once("../Than/conndb.php");
    $conn = conn();
?>
<section class="htc__category__area ptb--100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="section__title--2 text-center">
                                    <div class="anh2">
                                        
                                </div>
                                <h2 class="wrapperxx"><a href="?option=home">Home</a> > Product Sale</h2>
                                  
                                </div>
                            </div>
                        </div>
                   
<!-- ----------------------------------------------------------------------------------------- -->

                        <div class="slideshow-container">

                            <div class="mySlides ">
                            <img class="slideshow" src="images/anhprojech/sale-off.jpg"  >
                            </div>                                               
                            <div class="mySlides">                         
                            <img class="slideshow" src="images/anhprojech/sale1.jpg" >                        
                            </div>                                              
                                                    
                            <a class="prev" style="margin-top: 0px;" onclick="plusSlides(-5)">&#10094;</a>
                            <a class="next" style="margin-top: 0px;" onclick="plusSlides(1)">&#10095;</a>
                            <script type="text/javascript" src="js/demo.js"></script> 
                        </div>
                        <div style="text-align:center;">
                            <span class="dot" onclick="currentSlide(1)"></span> 
                            <span class="dot" onclick="currentSlide(2)"></span>  
                        </div>
                        <script src="js/demo.js"></script>
<!-- ------------------------------------------------------------------------------------------------- -->

        <br><hr>

        <div class="sale">
            <h2><u><b>Crystals Sale</b></u></h2><hr>
        
           
                    <div class="countdown">
                        <span id="days">00</span>
                        <span id="hours">00</span>
                            <span id="minutes">00</span>
                            <span id="seconds">00</span>
                    
                     <script src="js/countdown.js"></script>
                    </div>
                        <script language="javascript">
                            countdown('08/22/2021',['days','hours', 'minutes', 'seconds'], function(){
console.log('done');
                            })
                            </script>
        </div>
        <!-- <div class="htc__grid__top" > -->
            
            <!-- </div> -->
<!-- ----------------------------------------------------------------------------------------------- -->
<!-- <section class="htc__category__area ptb--100"> -->


<div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30" style="margin-top: -50px;">
                        
                            <br>
                            <div class="htc__grid__top">
                            <div class="htc__select__option">
                                <?php  
                                    $sql= "select *  from product_group";
                                    $kq= $conn->query($sql);
                                    if($kq->num_rows>0){
                                       
                                            echo "<select class='ht__select' id='sort_product_id' name= 'selectcat'>";
                                            echo "<option value='1' selected> All product </option>";
                                                while($row= $kq->fetch_assoc()){
                                                    
                                                    echo "<option value='".$row['id_pd_group']."'> ".$row['name_pd_group']." </option>";
                                                }
                                            echo "</select>";                        
                                         
                                    }
                                ?>
                                
                                    <!-- <option value="">All products</option>
                                    <option value="">Ring</option>
                                    <option value="" >Necklace</option>
                                    <option value="">Bracelet</option>
                                     <option value="">Bông tai</option> -->
                                
                                 <!-- <div class="dlbtn1">
                                     <a href="images/anhprojech/kimcuong.docx" class="dlbtn">Download chi tiết<span class="details">.word<span class="size">11.5 MB</span></span></a>
                                </div> -->
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $("#sort_product_id").change(function(){
                                        $(".product_item").show();
                                        value= $(this).val();
                                        if(value==1){
                                            $(".product_item").show();
                                        }else{
for (i = 0; i < $(".product_item").length; i++) {
                                                value_item = $(".product_item").eq(i).attr("data-group");
                                                if(value!=value_item){
                                                    $(".product_item").eq(i).hide();
                                                }else{
                                                    $(".product_item").eq(i).fadeIn();
                                                }
                                            }
                                        }
                                        
                                    });
                                });

                            </script>
                           
                            </div>
<!-------------------------------------------- Bắt đầu 1 sản phẩm------------------------------------------------------------ -->
<?php 
    require_once("../Than/conndb.php");
    $conn = conn();
    $a=0;
    $r = mysqli_query($conn,"select * from product_detail pd inner join promotion p on pd.pd_code = p.pd_code_pm");
    while($d = mysqli_fetch_assoc($r)){
        $a++;
        $kq=$d;
?>
            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12 product_item" data-group='<?php echo $d["id_pd_group"];?>'>
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.html">
                                            <ul class="caption-style-3">
                                            <li>
                                            <a href="?option=demochitietSP&id_product=<?php echo"{$d['id_product']}"; ?>">
                                                <img style="background-color: white" src="<?php echo "../Than/uploads/{$d['img']}"; ?>" alt=""></a>
                                                <div class="caption">
                                                    <div class="blur"></div>
                                                    <div class="caption-text">
                                                        <!-- <h1 style="color: aliceblue; margin-left: 80px;">Bông tai 1</h1> -->
                                                        <p style="color: aliceblue; margin-top:-10px; margin-left: 20px; "><?php echo "{$d['name']} {$d['pd_code']}" ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            </ul>
                                        </a>
                                    </div>
                                    
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <span style=" margin-top: -60px;color:aliceblue; background-color: red; font-size: 20px;">-<?php echo $d['percent_pm']; ?>%</span>
                                            <li><a href="javascript:void(0)"><i class="icon-heart icons sosanh" title="Compare"
                                            data-id="<?php echo $d["id_product"];?>"
                        data-img="<?php echo "../Than/uploads/".$d["img"];?>"
                        data-name="<?php echo $d["name"];?>"
                                            ></i></a></li>                             
                                            
                             
                                                <div class="row">
                                                   
                                                    <div class="col-md-3">
                                                       <li> <a href="cart.html" data-toggle="modal" data-target="#modalDelete<?php echo $a; ?>" title="Preview"><i class="icon-magnifier icons"></i></a></li>
                                                    </div>   
                                                    <div class="modal fade" id="modalDelete<?php echo $a; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" style="text-align: center; margin-top: 10px;"><b> <?php echo "{$d['name']} {$d['pd_code']}" ?></b>
                                                                        <div class="star1">
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked "></span>
                                                                            <span class="fa fa-star"></span>
                                                                        </div>
                                                                    </h4>
                                                                    <!-- <button type="button" class="close" data-dismiss="modal" style="margin-top: -20px;"><span aria-hidden="true">&times;</span></button> -->
                                                                </div>
                                                            <table>
<tr>
                                                                    <td>
                                                                        <img class="anhsp" src="<?php echo "../Than/uploads/{$d['img']}"; ?>" alt="anh">
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="anhsp1">
                                                                        <div class="modal-body">
                                                                    <b>Color:</b> <?php echo "{$kq['color']}"; ?>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <b>Main Stone:</b> <?php echo "{$kq['main_stone']}"; ?>
                                                                </div>
            
                                                                <div class="modal-body">
                                                                    <b>Material:</b> <?php echo "{$kq['material']}"; ?>
                                                                </div>
            
                                                                <div class="modal-body">
                                                                    <b>Stone Size:</b> <?php echo "{$kq['stone_size']}"; ?>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <b>Weight:</b>  <?php echo "{$kq['weight']}"; ?>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <b>State:</b> <?php echo "{$kq['state']}"; ?>
                                                                </div>

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div style="margin-left: 50px; width: 510px;"><b>Mô tả:</b> 
                                                                        <p><?php echo "{$kq['description']}"; ?></p>
                                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                    
                                                                </div>
                                                            </div>
</div>
                                                    </div>       
                                                </div>
                                            <!-- </div> -->

                                            <!-- <li><a href="#"><i class="icon-shuffle icons"></i></a></li> -->
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="?option=contactus2" style="margin-top: 20px;">Click to contact</a></h4>
                                        <ul class="fr__pro__prize">
                                            <!-- <li class="old__prize">$30.3></li>
                                            <li>$25.9</li> -->
                                            
                                                <div class="star1">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked "></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                             
                                        </ul>
                                       
                                    </div>
                                </div>                              
                            </div>

<?php  } ?>
<!-------------------------------------------- kết thúc 1 sản phẩm------------------------------------------------------------ -->
                            <!-- End Single Category -->
                            
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
                </div>
                </section>
<br><br><br>
<!-- </section> -->
<!-- --------------------------------------------------------------------------------------------------------- -->