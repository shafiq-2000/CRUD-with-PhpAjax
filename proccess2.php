<?php

use LDAP\Result;

include "connect.php";
$call = $_POST['call'];
$call();

function insert()
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    //validation by jquery--
    if ($name === "") {
        echo '<div class="alert alert-danger"> <strong>Error:</strong> Name is required </div>';
    } else if ($email === "") {
        echo '<div class="alert alert-danger"> <strong>Error:</strong> email is required </div>';
    } else if ($phone === "") {
        echo '<div class="alert alert-danger"> <strong>Error:</strong> phone is required </div>';
    } else if ($status === "") {
        echo '<div class="alert alert-danger"> <strong>Error:</strong> status is required </div>';
        //-----
    } else {
        //data insert code----
        global $con;
        $sql = "INSERT INTO users(`name`, `email`, `phone`, `status`) VALUES ('$name','$email','$phone','$status')";
        $result = $con->query("$sql");

        if ($result) {
            echo '<div class="alert alert-success"> <strong>Success:</strong>Data added successfully</div>';
        } else {
            echo '<div class="alert alert-danger"> <strong>Error:</strong> Data added failed</div>';
        }
    }
    //-----
}



function show()
{
    global $con;
    $sql = "SELECT * FROM users";
    $result = $con->query("$sql");

    if ($result->num_rows > 0) {

        while ($data = $result->fetch_assoc()) {
            //active----
            if ($data['status'] == 1) {
                $status = '<button value="' . $data['id'] . '" class="inactive btn btn-sm btn-info " >In-Active</button>';
            } else {
                $status = '<button  value="' . $data['id'] . '" class="active btn btn-sm btn-danger" >Active</button>';
            }
            //----

            //table a data show-----
            echo '    <tr>
                  <td>' . $data['id'] . '</td>
                    <td>' . $data['name'] . '</td>
                    <td>' . $data['email'] . '</td>
                    <td>' . $data['phone'] . '</td>
                    <td>' . $status . '</td>
                    <td>
                    <button type="button" value="' . $data['id'] . '" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="fa-solid fa-trash"></i> </button>

                    <button value="' . $data['id'] . '" class="update btn btn-outline-success btn-sm"> <i class="fa-solid fa-edit"></i> </button>

                    <button value="' . $data['id'] . '" class="updateModal btn btn-outline-info btn-sm"> <i class="fa-solid fa-edit"></i> </button>
                    </td>
                  </tr>';
        }
        //-----
    } else {
        echo ' <tr> <td class="text-center bg-warning" colspan="6">Data Not Found!</td></tr>';
    }
}


//active----
function active()
{
    global $con;
    $id = $_POST['id'];
    $con->query("UPDATE users SET status='2' WHERE id='$id' ");
}


function inactive()
{
    global $con;
    $id = $_POST['id'];
    $con->query("UPDATE users SET status='1' WHERE id='$id' ");
}
//-----

//delete-----
function delete()
{
    global $con;
    $id = $_POST['id'];
    $con->query("DELETE FROM users WHERE id='$id' ");
}
//-----

//update er jnno mane ai method update field a database theke data tule anbe-----
function find()
{
    global $con;
    $id = $_POST['id'];
    $result =  $con->query("SELECT * FROM users WHERE id='$id' ");
    $result = $result->fetch_assoc();
    echo json_encode($result);
}

//ai method database  a update korbe
function update()
{
    global $con;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    $sql = "UPDATE users SET `name`='$name',`email`='$email',`phone`='$phone',`status`='$status' WHERE id='$id' ";
    $result = $con->query("$sql");

    if ($result) {
        echo '<div class="alert alert-success"> <strong>Success:</strong>Data added successfully</div>';
    } else {
        echo '<div class="alert alert-danger"> <strong>Error:</strong> Data added failed</div>';
    }
}
//-----