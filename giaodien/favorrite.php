
<!-- ------------------------------------------------------------------------------------------------ -->

<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <div class="anh2">
                        <!-- <a href="demo.html" style="margin-top: -50px;"><img src="images/anhprojech/logo.jpg" alt="logo images"></a> -->
                </div>
                <h2 class="wrapperxx"><a href="?option=home">Home</a> > Favorite</h2>
                  
                </div>
            </div>
        </div>
    </div>
    <form action="#">
        
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image products</th>
                                    <th class="product-name">Name of products</th>
                                    <th class="product-name">Main stone</th>
                                    <th class="product-name">Stone size</th>
                                    <th class="product-name">Material</th>
                                    <th class="product-name">Weight</th>
                                    <th class="product-name">Remove</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   require("../Than/conndb.php");
                                   $conn = conn();
                                   print_r($_SESSION, TRUE);
                                   $id = implode(",",array_keys($_SESSION["checkout"]));
                                    //bat dau xoa sp  
                                    // $xoa= "0";
                                    $xoaid= 0;
                                    // if(isset($_GET['xoa'])){

                                        // $xoa= $_GET['xoa'];
                                        
                                        if(isset($_GET['wishlist_id'])){
                                            $xoaid= $_GET['wishlist_id'];
                                            echo "id sẽ được xoa là: $xoaid";
                                            //hãy viết câu lệnh xoa sp theo id vào đây
                                        }
                                       
                                            
                                            // 
                                        
                                    // }

                                   $r = mysqli_query($conn,"select * from product_detail where id_product in ($id)");
                                   $i= 0;
                                   while($d = mysqli_fetch_assoc($r)){ 
                                       $i++;
                                ?>
                                    <tr id="tr0<?php echo $i; ?>">
                                        <td><img style="height: 70px; width: 70px" src="<?php echo "../Than/uploads/".$d["img"];?>"></td>
                                        <td><?php echo $d["name"]; ?></td>
                                        <td><?php echo $d["main_stone"]; ?></td>
                                        <td><?php echo $d["stone_size"]; ?></td>
                                        <td><?php echo $d["material"]; ?></td>
                                        <td><?php echo $d["weight"]; ?></td>
                                        
                                        <td onclick="xoasosanh('tr0'+ <?php echo $i; ?>  )" class="product-remove">
                                        <i class="icon-trash icons"></i></td>

                                    </tr>
                                <?php
                                   }
                                ?>
                            </tbody>
                        </table>
                        <script>
                            function xoasosanh(a){
                                var mp= document.getElementById(a);
                                mp.style.display="none";

                            }
                        </script>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="?option=home">Continue Shopping</a>
                                </div>
                                <!-- <div class="buttons-cart checkout--btn">
                                    <a href="<?php //echo SITE_PATH;?>checkout.php">checkout</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </form> 
</section>
<!-- ----------------------------------------------------------------------------------------- -->
<!-- <div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"> -->
                
            <!-- </div>
        </div>
    </div>
</div> -->
<!-- ----------------------------------------------------------------------------------------------------- -->
