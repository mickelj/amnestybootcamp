<?php

    $servername = "localhost";
    $username = "mickelj_bootcamp";
    $password = "XXXXXXXXXXXX";
    $dbname = "mickelj_bootcamp";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT * FROM people";
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>First PHP Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#ajax').on('click', function(e) {
                    e.preventDefault();
                    $.post(
                        'process.php',
                        {
                            yourname: $("#yourajaxname").val(),
                            youremail: $("#yourajaxemail").val()
                        }
                    )
                    .done( function(data) {
                        $('#results').html(data);
                    }); 
                });
            });
        </script>
    </head>
    <body>
        <h1>This is a PHP Page</h1>
        <?php
            echo "<h2>Hello from PHP!</h2>";
            
        ?>
        <ul>
            <?php
                for ($i = 0; $i < 10; $i++) {
                    echo "<li>$i</li>";
                }
            ?>
        </ul>
        <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Phone</th>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"]. "</td>";
                    echo "<td>" . $row["name"]. "</td>";
                    echo "<td>" . $row["address"] . "<br>" . $row["city"] . ", " . $row["state"] . " " . $row["zip"] . "</td>" ;
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No results available";
            }
        ?>
        <hr>
        <h2>Traditional Form</h2>
        <form action="process.php" method="post">
            <div>
                <label for="yourname">Your Name:</label>
                <input type="text" name="yourname" id="yourname">
            </div>
            <div>
                <label for="youremail">Your Email</label>
                <input type="email" name="youremail" id="youremail">
            </div>
            <div>
                <button name="submit">Submit</button>
            </div>
        </form>
        <hr>
        <h2>AJAX Form</h2>
        <form action="process.php" method="post">
            <div>
                <label for="yourajaxname">Your Name:</label>
                <input type="text" name="yourname" id="yourajaxname">
            </div>
            <div>
                <label for="yourajaxemail">Your Email</label>
                <input type="email" name="youremail" id="yourajaxemail">
            </div>
            <div>
                <button name="submit" id="ajax">Submit</button>
            </div>
        </form>
        <div id="results"></div>
    </body>
</html>

<?php
    $conn->close();
?>