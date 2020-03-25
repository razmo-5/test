   
<?php 
session_start();
require_once '../../config/connect_db.php';
$error = '';

if (isset($_SESSION["logged_in"])) {

$sql = 'SELECT * FROM tasks';
$statement = $conn->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);

 ?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="../index.php">Logo</a>
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>

  </ul>
</nav>
<div class="container">
  <h2><?php echo " welcome admin panel";?></h2>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
      <table class="table table-hover">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>text</th>
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->text; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id; ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you really want to delete ?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>


<?php 

}

else{

  if (isset($_POST['admin'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ( empty($username)  and empty($password) ){
      $error = 'all fields are required';
    }

    else{

      $query = $conn->prepare("SELECT * FROM `admin` WHERE  username = :username and  password = :password");
      $query->execute(['username'=>$username,'password'=>$password ]);
      //var_dump($query->rowCount());
      $num = $query->rowCount();

      if ($num == 1) {
        
        $_SESSION["logged_in"] = true;
        header('location: index.php');
        exit();
      }
      else{
        $error = 'incorrect  username or password';

      }
  
    }
    
  }

  ?>

  <html>
  <head>
    <title>admin  authorization</title>

  </head>
  <body>

    <div class="container">
      <a href="../../index.php"  id="logo">return main page</a>
      <br><br>
      <h2>authorization</h2>
      <form action="index.php" method="post">
        <input type="text"  name="username" placeholder="username">
        <input type="text"  name="password" placeholder="password">
        <input type="submit"  name="admin" value="log in">
      </form>
    </div>

  </body>
  </html>

<?php

  }

  ?>

  <div style="color:red;"><?php echo $error ;?> </div>


  






  






