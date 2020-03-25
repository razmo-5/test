
<?php
if (isset($_GET['add'])) {

  if($_GET['add'] == 'empty'){?>

    <div class="container" style="width: 300px;padding: 10px">
      <p style="padding: 20px;" class="bg-warning text-black">all field is require</p>
    </div>
    <?php

  }
  
}
?>

<?php

if (isset($_GET['add'])) {
  if($_GET['add'] == 'success'){?>
    <div class="container" style="width: 300px;padding: 10px">
      <p style="padding: 20px;" class="bg-success text-white">data were  successfully inserted</p>
    </div>

    <?php
  }
  
}

?>



<div class="container" style='margin-top: 30px'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


  <form  action="model/admin/create.php" method="post"   style="width: 300px">

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="pwd">name:</label>
      <input type="text" class="form-control" placeholder="Enter name" name="name">
    </div>

    <div class="form-group">
      <label for="comment">text task:</label>
      <textarea class="form-control" rows="5"  name="text"></textarea>
    </div>

    <button type="submit" name="add"  class="btn btn-primary">add task</button>
  </form>
</div>
