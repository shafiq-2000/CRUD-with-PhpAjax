<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax||Operation</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boothstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- css link -->
    <link rel="stylesheet" href="css/style.css">
</head>


<body class="container">


    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-3 bg-primary text-light text-center py-2">AJAX CRUD OPERATION</h1>
            </div>
        </div>
        <div class="mt-4 row">

            <div class="col-lg-4 shadow">

                <h1 class=" text-center text-primary py-5">User Info</h1>
                <div class="form_group ">
                    <!-- <div class="alert alert-success"> <strong>Success:</strong> This is message</div>
                    <div class="alert alert-danger"> <strong>Success:</strong> This is message</div> -->

                    <div class="msg form-group mb-4"></div>
                    <div class="form-group mb-4">
                        <input type="text" name="myname" class="form-control myname " placeholder="Enter Your name">

                    </div>
                    <div class="form-group mb-4">
                        <input type="email" name="myemail" class="form-control myemail " placeholder="Enter Your email">

                    </div>
                    <div class="form-group mb-4">
                        <input type="phone" name="myphone" class="form-control myphone" placeholder="Enter Your phone">

                    </div>
                    <div class="form-group mb-4">
                        <select class="form-control status" id="">
                            <option value="">--select status--</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>

                    <div class=" form-group m-5 d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary btn-sm save">ADD USER</button>
                        <button style="display: none;" type="submit" name="update" class="btn btn-info btn-sm updateinfo">Update</button>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
            <div class="col-lg-8 border border-success">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="fa-solid fa-plus"></i></button>
                <!-- data fetch -->
                <h1 class="text-danger text-center">Fetch data</h1> <br>

                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="tableData">


                    </tbody>


                </table>
            </div>
        </div>
    </div>






    <!--insert modal -->
    <section>


        <div class="modal" tabindex="-1" id="insertModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new user</h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <div class=" ">

                            <h1 class=" text-center text-primary ">User Info</h1>
                            <div class="form_group ">
                                <!-- <div class="alert alert-success"> <strong>Success:</strong> This is message</div>
                    <div class="alert alert-danger"> <strong>Success:</strong> This is message</div> -->

                                <!-- <div class="msg form-group mb-4"></div> -->
                                <div class="form-group mb-4">
                                    <input type="text" name="myname" class="form-control  " id="myname" placeholder="Enter Your name">

                                </div>
                                <div class="form-group mb-4">
                                    <input type="email" name="myemail" class="form-control  " id="myemail" placeholder="Enter Your email">

                                </div>
                                <div class="form-group mb-4">
                                    <input type="phone" name="myphone" class="form-control " id="myphone" placeholder="Enter Your phone">

                                </div>
                                <div class="form-group mb-4">
                                    <select class="form-control " id="status">
                                        <option value="">--select status--</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm " id="save">ADD USER</button>
                        <!-- update er jnno button -->
                        <button style="display: none;" type="button" class="btn btn-info btn-sm " id="updateinfo">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--insert modal end -->

    <!-- Delete Modal start-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Confirmation Message</h1>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure? want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger btn-sm mdelete" data-bs-dismiss="modal">OK</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal end-->

    <!-- Boothstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <!-- font-awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="js/jquery-3.7.1.min.js"></script> -->
    <!-- main js -->
    <script src="js/main.js"></script>
    <script src="ajax.js"></script>
</body>

</html>