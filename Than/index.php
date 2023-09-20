<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin PINNACLE</title>
    <link rel="stylesheet" href="cssthan/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="cssthan.css"> -->
    <!-- boxicons CDN LINK -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <?php
    //  session_start();cx
    include_once 'Phan_Quyen_Nhan_Vien.php';
    include_once 'Connect.php';
    ?>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class= "bx bxl-sketch"></i>
            <span class="logo_name"></span>    
        </div>
        <ul class="nav-links">
            <li>
                <a href="?option=Staff">
                    <i class='bx bxs-user'></i>
                    <span class="link_name">Profile Staffs</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="?option=Staff">Profile Staffs</a></li>
                </ul>
            </li>
            <li>
                <a href="?option=AddStaff">
                    <i class='bx bx-user-plus' ></i>
                    <span class="link_name">Add Staff</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="?option=AddStaff">Add Staff</a></li>
                </ul>
            </li>
            <li>
                <a href="?option=Customer">
                    <i class='bx bxs-user-account'></i>
                    <span class="link_name">Profile Customer</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="?option=Customer">Profile Customer</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bxl-product-hunt'></i>
                        <span class="link_name">Product</span>
                    </a>
                    <i class="bx bx-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Product</a></li>
                    <li><a href="?option=addproduct">Add</a></li>
                    <li><a href="?option=editproduct">Edit</a></li>
                    <li><a href="?option=promotion">Promotion</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="?option=message">
                    <i class='bx bxs-user-account'></i>
                    <span class="link_name">Message</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="?option=Customer">Message</a></li>
                </ul>
            </li>
            <!-- <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class="bx bx-book-bookmark"></i>
                        <span class="link_name">Postcast</span>
                    </a>
                    <i class="bx bx-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Postcast</a></li>
                    <li><a href="#">Trang 5</a></li>
                    <li><a href="#">Trang 6</a></li>
                </ul>
            </li> -->
            <li>
                <a href="?option=contact">
                    <i class='bx bxs-contact'></i>
                    <span class="link_name">Contact Us</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Contact Us</a></li>
                </ul>
            </li>
            <li>
                <a href="LogOut.php">
                    <i class="bx bx-log-out"></i>
                    <span class="link_name">Log Out</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="LogOut.php">Log Out</a></li>
                </ul>
            </li>
        <li>
        <div class="profile-details">
            <div class="profile-content">
                <a href="../giaodien/trangchu.php" style="width: 60px;">   <img src="imagesthan/trove4.png" alt="profile"></a>
            </div>
            <div class="name-job">
            <a href="?option=PerInfo"><div class="profile_name" style="margin-left: 30px;"><?php echo $_SESSION["HoTen"];?></div></a>
                <!-- <div class="profile_name"><?php echo $_SESSION["HoTen"];?></div> -->
                <!-- <div class="job"><?php echo $_SESSION["IdNhom"];?></div> -->
            </div>
            <!-- <a href="LogOut.php"><i class="bx bx-log-out"></i></a> -->
        </div>
        </li>
    </ul>
    </div>
 

    <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu"></i>
            <span class="text">Menu</span>
        </div>
        <article style="width:100%" >
    <!-- <div> -->
      <!-- <div class="row"> -->
        <?php
            if(isset($_GET['option'])){
                switch($_GET['option']){
                    case'Staff':
                        include "InfoStaff.php";
                        break;
                    case'AddStaff':
                        include "AddStaff.php";
                        break;
                    case'Customer':
                        include "InfoCustomer.php";
                        break;
                    case'updateStaff':
                        include "UpdateMemberInfo.php";
                        break;
                    case'updateCustomer':
                        include "UpdateMemberInfo.php";
                        break;
                    case'contact':
                        include "Chinh-sua-ContactUs.php";
                        break;
                    case'addproduct':
                        include "addsp.php";
                        break;
                    case'editproduct':
                        include "displaypd.php";
                        break;
                    case'fix':
                        include "update_addpd.php";
                        break;
                    case'promotion':
                        include "promotion.php";
                        break;
                    case'PerInfo':
                        include "PersonalInfo.php";
                        break;
                    case'message':
                        include "message.php";
                        break;
                }
            } else{
        echo '<div><p style="margin: auto; text-align: center; color: Blue; font-size: large;" >
                If you need technical support, please contact:</br>
                1. Send to email: vungocanhqwe@gmail.com </br>
                2. Hotline: 0123456789  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                               </br></p></div>';

    }
        ?>
      <!-- </div> -->
    <!-- </div> -->
</article>
    </section>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++){
            arrow[i].addEventListener("click", (e)=>{
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("close");
        });
    </script>
</body>
</html>