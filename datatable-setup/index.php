<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=data_db", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>Data Table</title>
</head>
<body>
    
    <div class="container">
        <div class="d-flex align-items-center p-4 my-4 text-white bg-dark rounded shadow-sm">
            <div class="lh-1">
                <h1 class="h5 mb-0 text-white lh-1">Data Table</h1>
            </div>
        </div>
        <table id="myTable">
            <thead>
                <th>ID</th>
                <th>Fullname</th>
                <th>Phone</th>
                <th>Address</th>
            </thead>
            <tbody>
    <?php 
        $stmt = $conn->query("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll();
        foreach($users as $user) {
    ?>
                <tr>
                    <td><?php echo $user["id"] ?></td>
                    <td><?php echo $user["fullname"] ?></td>
                    <td><?php echo $user["phone"] ?></td>
                    <td><?php echo $user["address"] ?></td>
                </tr>
    <?php         
        }
    ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
    </script>
</body>
</html>