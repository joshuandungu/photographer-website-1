<?php include_once('header.php');?>



<?php
    include 'connection.php';
    
?>


<body>
    <center font-size="50px" font="bold"><h1> View the current booking history</h1></center>
    <br>
    <div class="container table-responsive-md">
        <table class="table table-bordered table-hover table-striped"  class="table-responsive" id="dataTable" width="100%" cellspacing="0">
  
        <tbody>
            

            <?php

            if(mysqli_num_rows($query_run) > 0)
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    
                
            
            
            ?>
            <tr>
                <td><?php echo $row['clientname']; ?></td>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['EventName']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['photographer_booked']; ?></td>
                <td><?php echo $row['appointment_number']; ?></td>
                <td>

                    <form action="#" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-success"> EDIT</button>
                </td>
                <td>
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </td>

                
            </tr>
        

            <?php
        }
    }
    else {
                echo "No record found";
            }





              ?>
        </tbody>
    </table>
        
                </div>
        </tbody>
    </table>
</div>
</body>

            






<?php include_once("footer.php");?>


