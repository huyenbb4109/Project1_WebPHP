<?php
    require_once("../Than/conndb.php");
    $conn = conn();
    $r = mysqli_query($conn,"select * from product_detail");
    $a= 0;
    while($d = mysqli_fetch_assoc($r)){
        $a++;
        $kq=$d;
    ?>
        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12 list_item" data-name="<?php echo"{$d['name']}"; ?>">
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
                                                        <p class="abc" style="color: aliceblue; margin-top:-10px; margin-left: 20px; "><?php echo "{$d['name']} {$d['pd_code']}"; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            </ul>
                                        </a>
                                    </div>
                                    
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <?php 
                                                $b= mysqli_query($conn, "select * from promotion");
                                                
                                                if($b->num_rows!=0){
                                                    while($c= mysqli_fetch_assoc($b)){
                                                        if($c['pd_code_pm']==$d['pd_code']){

                                               
                                            ?>
                                            
                                            <span style=" margin-top: -60px;color:aliceblue; background-color: red; font-size: 20px;">-<?php echo $c['percent_pm']; ?>%</span>
                                            <?php
                                                    }
                                                }
                                            }else{
                                                $new= mysqli_query($conn, "select * from product_detail order by date desc limit 10");
                                                if($new->num_rows!=0){
                                                    while($newrow= mysqli_fetch_assoc($new)){
                                                        if($newrow['pd_code']==$d['pd_code']&&$newrow['date']==$d['date']){

                                            
                                            ?>
                                            <span style=" margin-top: -60px;color:aliceblue; background-color: red; font-size: 20px;">New</span>
                                            <?php 
                                                        }
                                                    }
                                                }
                                            }
                                            ?>

                                           <li><a href="javascript:void(0)"><i class="icon-heart icons sosanh" title="Compare"
                                            data-id="<?php echo $d["id_product"];?>"
                        data-img="<?php echo "../Than/uploads/".$d["img"];?>"
                        data-name="<?php echo $d["name"];?>"
                                            ></i></a></li>                             
                                            <?php 
                                if($kq['pd_code']==$d['pd_code']){
                                
                             ?>
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
                                            <?php
    }
?>

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
        
    <?php
    }
?>