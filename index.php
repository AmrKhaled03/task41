<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Students Project</title>
</head>

<body>
<?php
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Database connection
    $host = "localhost";
    $user = "root";
    $pass = ""; // Removed the space
    $db = "Students";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from database
    $res = mysqli_query($conn, "SELECT * FROM student");

    // Variables
    $id = '';
    $name = '';
    $address = '';

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }

    if (isset($_POST['add'])) {
        $sqls = "INSERT INTO student VALUES($id,'$name','$address')";
        $q = mysqli_query($conn, $sqls);
        if ($q) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['delete'])) {
        $sqls = "DELETE FROM student WHERE name='$name'" ;
        $q = mysqli_query($conn, $sqls);
        if ($q) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
    <!-- start navbar -->
    <section class="nav">
        <button type="button" onclick="openAside()" id="btnOp">
            OPEN
        </button>
        <h1>
            STUDENT DASHBOARD
        </h1>
    </section>
    <!-- end navbar -->

    <!-- start aside -->
    <aside class="aside" id="aside">
        <div class="container">
            <img src="./imgs/Dashboard with user interface elements Illustration.jpg" alt="logo" loading="lazy">
            <h3>
                Manager Dashboard
            </h3>
            <form method="post">
                <div class="input-field">
                    <label>Student Id :</label>
                    <input type="number" name="id" id="id">
                </div>
                <div class="input-field">
                    <label>Student Name :</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="input-field">
                    <label>Student Address :</label>
                    <input type="text" name="address" id="address">
                </div>
                <button name="add" class="btn-add">Add Student</button>
                <button name="delete" class="btn-delete">Delete Student</button>
            </form>
        </div>
    </aside>
    <!-- end aside -->

    <!-- start main -->
    <section class="main">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ADDRESS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
    <!-- end main -->

    <script src="script.js"></script>
</body>

</html>
