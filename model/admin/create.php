
<?php 

//require_once 'config/connect_db.php';
require_once '../../config/connect_db.php';


if (isset($_POST['add'])) {

  $email  =  trim(htmlspecialchars($_POST['email']));
  $name =  trim(htmlspecialchars($_POST['name']));
  $text =  trim(htmlspecialchars($_POST['text']));

  if  (empty($email) and empty($name)  and empty($text) ){
    //header('Location: index.php?add=empty');
    header('Location: ../../index.php?add=empty');
  }
  else{
    $sql =  "INSERT INTO `tasks`(`name`, `email`, `text`) VALUES (:name, :email, :text)";
    $query = $conn->prepare($sql);
    $query->execute(['name' => $name,'email' => $email,'text' => $text]);
    //header('Location: index.php?add=success');
    header('Location: ../../index.php?add=success');
    
    
  }

}
?>








