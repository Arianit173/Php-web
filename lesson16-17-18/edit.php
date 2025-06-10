<?php 

include_once('config.php');

$id = $_GET["id"];

$sql = "SELECT * FROM movies WHERE id=:id";

$selectUsers = $conn -> prepare($sql);
$selectUsers -> bindParam(':id', $id);
$selectUsers -> execute();
$user_data =$selectUsers -> fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit User's Details</h2>
    <div class="table-responsive">
        <form action="uptadeUsers.php" method="post">
            <div class="form-floating">
                <input type="number" class="form-control" id="floatingInput" placeholder="id" name="id" value="<?php echo $user_data['id']?>">
                 <label for="id">ID</label>
            </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name" value="<?php echo $user_data['name']?>">
                 <label for="name">Emri</label>
            </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" value="<?php echo $user_data['username']?>">
                 <label for="username">Username</label>
            </div>
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="email" name="email" value="<?php echo $user_data['email']?>">
                 <label for="email">Email</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Change</button>
        </form>
    </div>
</body>
</html>