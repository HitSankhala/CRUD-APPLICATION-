<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      include 'config.php'; // 1)Connection
      $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";
      //2) Run sql query
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  { 
        // mysqli_num_rows($result) this give result us howmany row comes from database
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)){
              // mysqli_fetch_assoc($result) this function save database row in $row associative array
          ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['saddress']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['sphone']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['sid']; ?>'>Delete</a>
                </td>
            </tr>
          <?php } // while loop close here ?>
        </tbody>
    </table>
  <?php  }   // if loop close here
  else{
    echo "<h2>No Record Found</h2>";
  }
  //3) close connection
  mysqli_close($conn);
  ?>
</div>
</div>
</body>
</html>
<!-- PHP & MySQL programming method
    1) MySQLi Procedural (We use currently this)
    2) MySQLi object-oriented 
    3) PDO  -->
