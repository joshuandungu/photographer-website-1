<?php 
    include 'includes/header.php';
    include 'includes/navbar.php';
?>

<body>
    
    <table class="table-responsive"  width="100%" >
        <center><h1>Update Account</h1>

              <?php

                include'includes/connection.php';

                 if(isset($_POST['edit_btn']))
                    {
                        $id = $_POST['edit_btn'];

                        $query = "SELECT * FROM admin WHERE id='$id'";
                                    $query_run = mysqli_query($con,  $query);

                                    foreach($query_run as $row)
                                    {
                                    ?>
                                    <?php

                                    
                             <form action="register_edit.php" method="POST  
                                        <input type="hiden" name="edit_id" value="<?php echo $row['id'] ?>">

                                    <div class="form-group">
                                        <label> FIRST NAME</label>
                                        <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" class="form-control" placeholder="Enter First Name">
                                    </div>
                                    <div class="form-group">
                                        <label> LAST NAME</label>
                                        <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" class="form-control" placeholder="Enter Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label> EMAIL</label>
                                        <input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <label> USERNAME</label>
                                        <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
                                    </div>
                                    <div class="form-group">
                                        <label> PASSWORD</label>
                                        <input type="text" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
                                    </div>
                                </form>
                                 
                            ?>
                                
                                    }

                                }
                            ?>
                    }

    </table>
</body>




<?php include 'includes/footer.php';?>
