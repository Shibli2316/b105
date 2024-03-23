<?php


$insert = false;
$update = false;
$delete = false;

// Connecting to the database

include "../../_includes/_dbconnect.php";

if (isset($_GET['delete'])) {
    $_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `grinding` where `_id`=$_id ";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['_idEdit'])) {
        // Update the record

        $_id = $_POST['_idEdit'];
        $name = $_POST['nameEdit'];
        $unitSize = $_POST['unitSizeEdit'];
        $input = $_POST['inputEdit'];
        $output = $_POST['outputEdit'];
        $noe = $_POST['noeEdit'];
        $hd = $_POST['hdEdit'];
        $hrs = $_POST['hrsEdit'];
        $nod = $_POST['nodEdit'];
        $eWork = $_POST['eWorkEdit'];
        $eSal = $_POST['eSalEdit'];
        $cost = $_POST['costEdit'];

        // SQL query to be executed

        $sql = "UPDATE `grinding` SET `name`= '$name' , `unit_size`= '$unitSize', `input` = '$input', `output` = '$output', `no_emp` = '$noe', `hrs_day` = '$hd', `hrs` = '$hrs', `no_days` = '$nod', `tot_emp_days` = '$eWork', `sal_day` = '$eSal', `tot_emp_cost` = '$cost' WHERE `grinding`.`_id`=$_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "Failed";
        }
    } else {
        // insert  the record
        $name = $_POST['name'];
        $unitSize = $_POST['unitSize'];
        $input = $_POST['input'];
        $output = $_POST['output'];
        $noe = $_POST['noe'];
        $hd = $_POST['hd'];
        $hrs = $_POST['hrs'];
        $nod = $_POST['nod'];
        $eWork = $_POST['eWork'];
        $eSal = $_POST['eSal'];
        $cost = $_POST['cost'];

        // SQL query to be executed
        // INSERT INTO `grinding` (`_id`, `name`, `unit_size`, `input`, `output`, `no_emp`, `hrs_day`, `hrs`, `no_days`, `tot_emp_days`, `sal_day`, `tot_emp_cost`) VALUES (NULL, 'qwerty', '1', '1', '1', '1', '1', '12', '1', '1', '1', '21');

        $sql = "INSERT INTO `grinding` (`name`, `unit_size`, `input`, `output`, `no_emp`, `hrs_day`, `hrs`, `no_days`, `tot_emp_days`, `sal_day`, `tot_emp_cost`) VALUES ('$name', '$unitSize', '$input', '$output', '$noe', '$hd', '$hrs', '$nod', '$eWork', '$eSal', '$cost')";
        $result = mysqli_query($conn, $sql);

        // Adding a new trip
        if ($result) {
            $insert = true;
        } else {
            echo "The record was not inserted successfully due to ---> " . mysqli_error($conn);
        }
    }
}
?>

<?php include "_sidebar.php"; ?>


<!-- Edit modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
Edit Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="grinding_input.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_idEdit" id="_idEdit">

                    <div class="mb-3">
                        <label for="nameEdit" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameEdit" aria-describedby="emailHelp" name="nameEdit">
                    </div>

                    <div class="mb-3">
                        <label for="unitSizeEdit" class="form-label">Unit Size</label>
                        <input type="text" class="form-control" id="unitSizeEdit" aria-describedby="emailHelp" name="unitSizeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="inputEdit" class="form-label">Raw material input</label>
                        <input type="text" class="form-control" id="inputEdit" aria-describedby="emailHelp" name="inputEdit">
                    </div>

                    <div class="mb-3">
                        <label for="outputEdit" class="form-label">Output of Raw Material</label>
                        <input type="text" class="form-control" id="outputEdit" aria-describedby="emailHelp" name="outputEdit">
                    </div>

                    <div class="mb-3">
                        <label for="noeEdit" class="form-label">Number of Employees</label>
                        <input type="text" class="form-control" id="noeEdit" aria-describedby="emailHelp" name="noeEdit">
                    </div>

                    <div class="mb-3">
                        <label for="hdEdit" class="form-label">Hours per day</label>
                        <input type="text" class="form-control" id="hdEdit" aria-describedby="emailHelp" name="hdEdit">
                    </div>

                    <div class="mb-3">
                        <label for="hrsEdit" class="form-label">Total Hours</label>
                        <input type="text" class="form-control" id="hrsEdit" aria-describedby="emailHelp" name="hrsEdit">
                    </div>

                    <div class="mb-3">
                        <label for="nodEdit" class="form-label">No of Days</label>
                        <input type="text" class="form-control" id="nodEdit" aria-describedby="emailHelp" name="nodEdit">
                    </div>

                    <div class="mb-3">
                        <label for="eWorkEdit" class="form-label">Number of days employee works</label>
                        <input type="text" class="form-control" id="eWorkEdit" aria-describedby="emailHelp" name="eWorkEdit">
                    </div>

                    <div class="mb-3">
                        <label for="eSalEdit" class="form-label">Employee Salary per Day</label>
                        <input type="text" class="form-control" id="eSalEdit" aria-describedby="emailHelp" name="eSalEdit">
                    </div>

                    <div class="mb-3">
                        <label for="costEdit" class="form-label">Total Cost</label>
                        <input type="text" class="form-control" id="costEdit" aria-describedby="emailHelp" name="costEdit">
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



<?php
if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your entry has been saved successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}
?>

<?php
if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> The entry has been deleted successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}
?>

<?php
if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> The entry has been updated successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}
?>
<div class="container my-4">
    <h2>Input for grinding: </h2>
    <form action="grinding_input.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="unitSize" class="form-label">Unit Size</label>
            <input type="text" class="form-control" id="unitSize" aria-describedby="emailHelp" name="unitSize">
        </div>

        <div class="mb-3">
            <label for="input" class="form-label">Raw Material input</label>
            <input type="text" class="form-control" id="input" aria-describedby="emailHelp" name="input">
        </div>

        <div class="mb-3">
            <label for="output" class="form-label">Total Output</label>
            <input type="text" class="form-control" id="output" aria-describedby="emailHelp" name="output">
        </div>

        <div class="mb-3">
            <label for="noe" class="form-label">Number of Employees</label>
            <input type="text" class="form-control" id="noe" aria-describedby="emailHelp" name="noe">
        </div>

        <div class="mb-3">
            <label for="hd" class="form-label">Hours per Day</label>
            <input type="text" class="form-control" id="hd" aria-describedby="emailHelp" name="hd">
        </div>

        <div class="mb-3">
            <label for="hrs" class="form-label">Total Hours</label>
            <input type="text" class="form-control" id="hrs" aria-describedby="emailHelp" name="hrs">
        </div>

        <div class="mb-3">
            <label for="nod" class="form-label">No of Days</label>
            <input type="text" class="form-control" id="nod" aria-describedby="emailHelp" name="nod">
        </div>

        <div class="mb-3">
            <label for="eWork" class="form-label">Number of days employee works</label>
            <input type="text" class="form-control" id="eWork" aria-describedby="emailHelp" name="eWork">
        </div>

        <div class="mb-3">
            <label for="eSal" class="form-label">Employee Salary per Day</label>
            <input type="text" class="form-control" id="eSal" aria-describedby="emailHelp" name="eSal">
        </div>

        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="text" class="form-control" id="cost" aria-describedby="emailHelp" name="cost">
        </div>

        <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
</div>

<div class="container my-4">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">SNo</th>
                <th scope="col">Name</th>
                <th scope="col">Unit Size</th>
                <th scope="col">Input</th>
                <th scope="col">Output</th>
                <th scope="col"># Employees</th>
                <th scope="col"># Hours per Day</th>
                <th scope="col">Total hours</th>
                <th scope="col"># Days</th>
                <th scope="col">Total Employe Days</th>
                <th scope="col">Emp Salary per Day</th>
                <th scope="col">Total Cost</th>
            </tr>
        </thead>
        <tbody>
        <!-- `name`, `unit_size`, `input`, `output`, `no_emp`, `hrs_day`, `hrs`, `no_days`, `tot_emp_days`, `sal_day`, `tot_emp_cost` -->
            <?php
            $sql = "SELECT * FROM `grinding`";
            $result = mysqli_query($conn, $sql);
            $_id = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $_id = $_id + 1;
                echo "<tr>
            <th scope='row'>" . $_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['unit_size'] . "</td>
            <td>" . $row['input'] . "</td>
            <td>" . $row['output'] . "</td>
            <td>" . $row['no_emp'] . "</td>
            <td>" . $row['hrs_day'] . "</td>
            <td>" . $row['hrs'] . "</td>
            <td>" . $row['no_days'] . "</td>
            <td>" . $row['tot_emp_days'] . "</td>
            <td>" . $row['sal_day'] . "</td>
            <td>" . $row['tot_emp_cost'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['_id'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['_id'] . ">Delete</button>  </td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<hr>









<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->


    <!-- $name = $_POST['name'];
        $unitSize = $_POST['unitSize'];
        $noe = $_POST['noe'];
        $nod = $_POST['nod'];
        $eWork = $_POST['eWork'];
        $eSal = $_POST['eSal'];
        $cost = $_POST['cost']; -->


<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            unitSize = tr.getElementsByTagName("td")[1].innerText;
            input = tr.getElementsByTagName("td")[2].innerText;
            output = tr.getElementsByTagName("td")[3].innerText;
            noe = tr.getElementsByTagName("td")[4].innerText;
            hd = tr.getElementsByTagName("td")[5].innerText;
            hrs = tr.getElementsByTagName("td")[6].innerText;
            nod = tr.getElementsByTagName("td")[7].innerText;
            eWork = tr.getElementsByTagName("td")[8].innerText;
            eSal = tr.getElementsByTagName("td")[9].innerText;
            cost = tr.getElementsByTagName("td")[10].innerText;
            // console.log(name, unitSize);
            nameEdit.value = name;
            unitSizeEdit.value = unitSize;
            inputEdit.value = input;
            outputEdit.value = output;
            noeEdit.value = noe;
            hdEdit.value = hd;
            hrsEdit.value = hrs;
            nodEdit.value = nod;
            eWorkEdit.value = eWork;
            eSalEdit.value = eSal;
            costEdit.value = cost;
            _idEdit.value = e.target.id;
            console.log(e.target.id);
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("delete", );
            _id = e.target.id.substr(1, );


            if (confirm("Are you sure")) {
                console.log("yes");
                window.location = `grinding_input.php?delete=${_id}`;
            } else {
                console.log("no");
            }
        })
    })
</script>

<?php include "_sidebar2.php"; ?>