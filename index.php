<?php

  // Connect to Database
  $conn = mysqli_connect('localhost', 'Alex', 'Test1234', 'personal project');

  if(!$conn){
    echo "Connection Error" . mysqli_connect_error();
  }

  $sql = 'SELECT * FROM student ORDER BY created_at';
  $result = mysqli_query($conn, $sql);
  $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>

  <h4 class="center grey-text">Wazzup</h4>

  <div class="container">
    <div class="row">

      <?php foreach($students as $student) { ?>
        <div class="col s6 md3">
          <div class="card z-depth-0">
            <div class="card-content center">
              <h6><?php echo htmlspecialchars($student['Name']); ?></h6>
              <div><?php echo htmlspecialchars($student['Major']); ?></div>
            </div>
            <div class="card-action right-align">
              <a class="brand-text" href="#">More Info</a>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>

  <?php include('templates/footer.php'); ?>
</html>
