<?php 
    require_once("../Than/conndb.php");
    $conn = conn();

    $myid= 0;
    if(isset($_GET['id_product'])){
        $myid= $_GET['id_product'];
    }

?>
<!-- ----------------------------------------------------------------------------------------------------------------------   -->
            
            <section class="htc__category__area ptb--100">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section__title--2 text-center">
                                <div class="anh2">
                                    <!-- <a href="trangchu.php"><img src="images/anhprojech/logo.jpg" alt="logo images"></a> -->
                               </div>
                               <h2 class="wrapperxx"><a href="trangchu.php">Home</a> > Product Details</h2>
                                <!-- <p>But I must explain to you how all this mistaken idea</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<!-- --------------------------------------------------------------------------------------------------------- -->
<?php
    
    
    $r = mysqli_query($conn,"select * from product_detail where id_product= '$myid'");
    while($d = mysqli_fetch_assoc($r)){
    ?>            <br><br><br>
            <table border="0" style="margin-top: -150px;">
                <tr>
                    <td>
                        <div class="chitiet" style="margin-bottom: 160px;">
                            <img src="<?php echo "../Than/uploads/".$d["img"]; ?>" alt="" style="width: 500px; height: auto; margin-left: 50px">
                        </div>
                    </td>  
                    
                
                    <td>
                        <div class="chitiet1">
                            <p style="color: black;"><b><?php echo "{$d['name']}";?><br><br> Code Product:<?php echo "{$d['pd_code']}";?></b></p><br>
                            
                           
                        
                                    <div class="star1">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked "></span>
                                        <span class="fa fa-star"></span>&nbsp;&nbsp;&nbsp;  
                                        <a><b>Evaluate (0)</b></a>
                                    </div>
                            <br><p>Color: <?php echo "{$d['color']}"; ?></p><br>
                            <p>Main Stone: <?php echo "{$d['main_stone']}"; ?></p><br>
                            <p>MainMaterial: <?php echo "{$d['material']}"; ?></p><br>
                            <p>MainStone Size: <?php echo "{$d['stone_size']}"; ?></p><br>
                            <p>MainWeight:  <?php echo "{$d['weight']}"; ?></p><br>
                            <p>MainState: <?php echo "{$d['state']}"; ?></p>
                        </div>

                               

                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <p><span>Amount:</span> 
                                <select id="qty">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </div>


                        </div><br>

                        <a class="fr__btn" href="#">Add To Favorites</a>&nbsp;&nbsp;&nbsp;
                        <a class="fr__btn" href="#">Contact</a>
                       
                    </td> 
                    
                </tr>    
                
            </table><hr>
            <div class="danhgia">
                <h2><b>Evaluate (0)</b></h2><br>
                <h3>There are no reviews yet.</h3>
            </div><br><br>

            <table border="2" class="danhgia1">
                <tr>
                    <td>
                        <p class="danhgia2"><b>Be the first to comment "<?php echo $d['name'].$d['pd_code']; ?>"</b></p><br>
                        <p class="danhgia3"><b>Your review:</b></p>
                        

                            <div class="contentt">
 

                                <div class="wrapperr">
                                  <input name="ratingRadio" type="radio" id="st1" value="1" />
                                  <label for="st1"></label>
                                  <input name="ratingRadio" type="radio" id="st2" value="2" />
                                  <label for="st2"></label>
                                  <input name="ratingRadio" type="radio" id="st3" value="3" />
                                  <label for="st3"></label>
                                  <input name="ratingRadio" type="radio" id="st4" value="4" />
                                  <label for="st4"></label>
                                  <input name="ratingRadio" type="radio" id="st5" value="5" />
                                  <label for="st5"></label>
                                </div>
                          </div>
                          
                          <!-- <p class="danhgia4"><b>Nhận xét của bạn:<sup>*</sup></b></p>
                          <input class="danhgia5" type="text" >

                          <p class="danhgia6"><b>Tên:<sup>*</sup></b></p>
                          <input class="danhgia7" type="text">

                          <p class="danhgia8"><b>Email:<sup>*</sup></b></p>
                          <input class="danhgia9" type="text"> -->

                          <a class="danhgia10" href="#">Submit</a>
                    </td>
                </tr>
            </table>
        </div><br><hr>
<?php
    }
?>       


       