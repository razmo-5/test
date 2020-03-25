<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pagination</title>
</head>
<body>

  <?php
  $results_per_page = 3;
  $result = $conn->query("SELECT * FROM tasks");
  $number_of_results = $result->rowCount(); 
  $number_of_pages = ceil($number_of_results/$results_per_page);


  if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }

  $this_page_first_result = ($page-1)*$results_per_page;
  $sql = 'SELECT * FROM tasks LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
  $result = $conn->query($sql);

  ?>

  <div class="container" style="margin-top: 40px">
    <table class="table table-hover">

     <thead>
       <tr>
        <th>Firstname</th>
        <th>email</th>
        <th>text</th>

      </tr>
    </thead>

  </tbody>

  <?php 

  foreach($result as $row) {
    ?>

    <tr>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['text'];?></td>
    </tr>

    <?php
  }
  ?>

</tbody>
</table>

</div>

<div class="pagination1">

  <?php 
  for ($page=1;$page<=$number_of_pages;$page++) {
    echo "<a  href=\"index.php?page=$page\"> $page </a>  ";

  }

  ?>

</div>

</body>
</html>