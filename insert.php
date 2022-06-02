<?php 
    require_once('config.php');
    if(isset($_POST['insert'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        
        $image = $_POST['image'];

        $select_product = $db->prepare("SELECT * FROM `food` WHERE name = ?");
        $select_product->execute([$name]);

        if($select_product->rowCount() > 0){
            $message[]  = 'product name already exits';
        }else{
            $insert = $db->prepare("INSERT INTO `food` (name, image, price) VALUES(?,?,?)");
            $insert->execute([$name, $image, $price]);
            $message[] = 'add new produce success';

        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
    <?php 
        if(isset($message)){
            foreach($message as $message){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $message?>
    </div>
    <?php } } ?>
<body>
    <div class="container">
        <div class="row">
            <form method="post">
                <div class="mb-3">
                    <label  class="form-label">ชื่อสินค้า</label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label  class="form-label">รูป</label>
                    <input type="text" class="form-control" name="image" accept="image/jepg, image/png,image/jpg, image/webp" >
                </div>
                <div class="mb-3">
                    <label class="form-label">ราคา</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" name="insert" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>