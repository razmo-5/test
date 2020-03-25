
<?php
require_once '../../config/connect_db.php';


if (isset($_GET['id']) ) {
  $id = $_GET['id'];

  if (isset($_POST['update'])) {

    $email  =  trim(htmlspecialchars($_POST['email']) ) ;
    $name =  trim(htmlspecialchars($_POST['name'])) ;
    $text =  trim(htmlspecialchars($_POST['text'])) ;
    if  (empty($email) and empty($name) and empty($text)  ){

      $errors  = ' all field is require';
    }
    else{
     $sql = 'UPDATE tasks SET name = :name, email = :email, text =:text WHERE id = :id';
     $query = $conn->prepare($sql);
     $query->execute(['name' => $name,'email' => $email,'text'=> $text, 'id' => $id]);
     header('Location: index.php?update=sucess');
     

   }

 }

}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<div class="container">
  <h2>Update data</h2>
  
  <form method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input  type="text" name="name"  class="form-control">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email"  class="form-control">
    </div>

    <div class="form-group">
      <label for="comment">text task:</label>
      <textarea class="form-control" rows="5"  name="text"></textarea>
    </div>

    <div class="form-group">
      <button type="submit"  name="update"  class="btn btn-info">Update</button>
    </div>

  </form>

</div>


<?php if (isset($errors)):?>
 <div class="container" style="width: 300px;padding: 10px">
  <p style="padding: 20px;" class="bg-success text-white"><?php echo $errors;?></p>
</div>
<?php endif;?>



