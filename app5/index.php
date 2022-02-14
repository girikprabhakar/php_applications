<!-- Database Settings and connection -->
<?php
ini_set('display_errors', '0');

$insert = false;
$update = false;
$delete = false;

// Connect to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_STRICT);

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `sno` = '$sno'";
    $result = mysqli_query($conn, $sql);
}
// fetching the post variables and inserting/updating them into database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['snoedit']))
    {
        // Update the record
        $sno = $_POST['snoedit'];
        $title = $_POST['titleedit'];
        $description = $_POST['descedit'];

        // SQL query for updating
        $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`sno` = $sno";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $update = true;
        }
        else {
            echo "No records were updated";
        }
    }
    else {
        $title = $_POST['title'];
        $description = $_POST['desc'];

        // SQL query for inserting
        $sql = "INSERT INTO `notes` (`title`, `description`, `tstamp`) VALUES ('$title', '$description', '2022-02-09 11:58:47')";
        $result = mysqli_query($conn, $sql);

        if ($result){
            // echo "Record Inserted";
            $insert = true;
        }
        else {
            echo "Record not inserted ". mysqli_error($conn);;
            
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


    <title>Notes</title>

</head>

<body>
    <!-- Edit Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodalLabel">Edit Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/app5/index.php" method="post">
                    <div class="modal-body">

                        <input type="hidden" name="snoedit" id="snoedit">
                        <div class="mb-3">
                            <label for="title" class="form-label">Note Title</label>
                            <input type="text" class="form-control" id="titleedit" name="titleedit"
                                placeholder="Note Title" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Note Description</label>
                            <textarea class="form-control" id="descedit" name="descedit"
                                placeholder="Note Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/app5/php.jpg" alt="" height="28px"/></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
            </li> -->
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Php and insert Alert -->
    <?php
        if($insert)
        {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> You note has been inserted successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    ?>

    <!-- Php and delete Alert -->
    <?php
        if($delete)
        {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> You note has been deleted successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    ?>

    <!-- Php and update Alert -->
    <?php
        if($update)
        {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> You note has been updated successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    ?>


    <!-- main form -->
    <div class="container my-4">
        <h2>Add a Note</h2>
        <form action="/app5/index.php" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Note Title"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Note Description</label>
                <textarea class="form-control" id="desc" name="desc" placeholder="Note Description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>

    <!-- PHP and select Table -->
    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `notes`";
                $result = mysqli_query( $conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result))
                {
                    $sno = $sno + 1;
                    echo "<tr>
                    <th scope='row'>".$sno."</th>
                    <td>".$row['title']."</td>
                    <td>".$row['description']."</td>
                    <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button></td>
                </tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    <hr>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        edits = document.getElementsByClassName('edit')
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                // console.log("edit",);
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                // console.log(title, description);
                titleedit.value = title;
                descedit.value = description;
                snoedit.value = e.target.id;
                console.log(e.target.id);
                var myModalEl = document.getElementById('editmodal')
                var modal = bootstrap.Modal.getOrCreateInstance(myModalEl)
                modal.toggle();
            })
        })


        deletes = document.getElementsByClassName('delete')
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                sno = e.target.id.substr(1);

                if (confirm("Press a button")) {
                    console.log("yes");
                    window.location = `/app5/index.php?delete=${sno}`;
                }
                else {
                    console.log("no");
                }
            })
        })
    </script>

</body>

</html>