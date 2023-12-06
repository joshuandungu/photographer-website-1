<?php include_once('header.php');?>




    <div>
    <h3>Image list</h3>
    <center><h3><a href="index.php">Upload image</a></h3></center>
        <table class="table table-bordered" cellspacing="5px"> 
            <thead>
                <tr>
                    
                    <th>Image</th>
                    <th>Photographer Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date Of Birth</th>
                    <th>Type</th>
                    <th>Description</th>
                    
                    <th>Actions
                        <td><button><a href="update_image.php"> Update</a></button><td/>
                        <td><button><a href="delete_image.php"> Delete</a></button><td>
                    </th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                 $conn = mysqli_connect("localhost","root","","photo");
                 $query="SELECT * FROM `profile`";
                 $result=mysqli_query($conn , $query);
 
                while($fetch=mysqli_fetch_assoc($result)){
                    echo  "<tr>";
                    
                    echo "<td><img src='images/{$fetch['image']}' width='200' height='200'></td>";
                    echo "<td>{$fetch['name']}</td>";
                    echo "<td>{$fetch['email']}</td>";
                    echo "<td>{$fetch['phone_number']}</td>";
                    echo "<td>{$fetch['DOB']}</td>";
                    echo "<td>{$fetch['type']}</td>";
                    echo "<td>{$fetch['description']}</td>";
                    echo " </tr>";
                }
                ?>
                
            </tbody>
        </table>
    </div>
    
</body>
<?php include_once('footer.php');?>