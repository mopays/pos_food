<?php 
require_once('system.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>food</title>
</head>
<body>
    
<!-- nav bae-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #09eb36;" >
        <div class="container-fluid">
        <a class="navbar-brand" href="#">POS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
            </ul>
            <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        </div>
    </nav>
<!-- end nav-->

<!--header manu -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger" role="alert">
                    ระบบสั่งอาการ / รับออเดอร์
                </div>
            </div>
        </div>
    </div>

  <!--end header manu -->

  <!--Start show product-->
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-8">
            <div class="row">
                
            <?php  $select = $db->prepare("SELECT * FROM `food` ");
                        $select->execute();
                        while($row = $select->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="col-sm-3" style="margin-bottom: 20px;">
                            <form action="" method="post">
                    <center >
                        <input type="hidden" name="name" value="<?php echo $row['name']?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']?>">
                        <?php echo $row['name']?><br>
                       
                        ราคา <?php echo $row['price']?> บาท 
                    </center>
                    <img src="<?php echo $row['image']?>" width="100%" height="200px" alt="">
                    <input style="text-align:center ;" type="number" name="update_quantity" class="form-control" value="1"  min="1" max="99">
                    <button class="btn btn-success" name="buy" style="width:100%;">สั่งซื้อ</button>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>

            <div class="col-md-4" style="background-color: #59a067;">
                <br>
                <h3>รายการสั่งซื้อ <?php echo  date("d F Y") ;?></h3>
                <table class="table" >
                    <form action="" method="post">
                    <thead>
                      <tr>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col" class="text-center">ราคา</th>
                        <th scope="col" class="text-center">จำนวน</th>
                        <th scope="col" class="text-center">ลบ</th>
                      </tr>
                    </thead>
                    <?php   

                        if(isset($_GET['delete'])){
                            $delete_id = $_GET['delete'];
                            $delete = $db->prepare("DELETE  FROM `shop` WHERE id = ? ");
                            $delete->execute([$delete_id]);
                        }

                                $selects = $db->prepare("SELECT * FROM `shop`");
                                $selects->execute();
                                if($selects->rowCount() > 0){
                                while($row = $selects->fetch(PDO::FETCH_ASSOC)){
                                    
                                    $total = $row['price'] * $row['quantity'];
                                    $total_price += $total;
                        ?>
                    <tbody>
                        
                      <tr>
                        <input type="hidden" name="value_id" value="<?php echo $row['id']?>">
                        <td><?php echo $row['name']?></td>
                        <td align="center"><?php echo $total?></td>
                        <td align="center" >
                            <div class="col-sm-4">
                                <input type="hidden" name="qunantity" class="form-control" value="<?php echo $row['id']?>" 
                                min="1" max="99">
                                <input style="text-align:center ;" type="text" class="form-control"  readonly value="<?php echo $row['quantity']?>" 
                                >
                               
                            </div>  
                        </td>
                        <td align="center"><a href="?delete=<?php echo $row['id']?>"  class="btn btn-danger">delete</a></td>
                      </tr>
                      <tr>
                        <td colspan="4" align="center">รวม</td>
                          <td align="right"><?php echo $total_price?></td>
                      </tr>
                     
                      
                    </tbody>
                    <?php 
                    } }
                ?>
                </form>
                </table>

                <p align="right" style="margin-right: 50px;">
                    <form action="" method="post">
                        <button class="btn btn-danger" name="delete_all">ยกเลิก</button>
                        <button class="btn btn-info">สั่งซื้อ</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
  <!--end show product-->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>