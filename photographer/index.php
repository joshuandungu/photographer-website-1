 <?php include_once('header.php');?>

 <body>
    <center>

<form class="" action="insert.php" method="POST"  enctype="multipart/form-data"> 
    <div class=" col-4 p-2 border m-2">
    <h1>Fill in the form below</h1>
    <h2>Photographer Full Name</h2>
    <input type="text" name="name" class="form-control" placeholder="Photographer full name"  rquired ><br><br>
    <h2>EMAIL</h2>
    <input type="email" name="email" class="form-control" placeholder="Email"  required><br><br>
    <h2>PHONE NUMBER</h2>
    <input type="phonenumber" name="phone_number" class="form-control" placeholder="Phone number" required  ><br><br>
    <h2>DATE OF BIRTH</h2>
    <input type="DATE" name="DOB" class="form-control" placeholder="Date Of Birth" required ><br><br>
    <h2>TYPE OF PHOTOGRAPHER</h2>
    <input type="text" name="type" class="form-control" placeholder="Indicate what kind of photographer you are"  required><br>
    <h2>MORE DETAILS</h2>
    <input type="textarea" name="description" class="form-control" placeholder="Give more information about yourself" required ><br><br>
    <h2>upload your image</h2>
    <input type="file" name="image_upload"  accept="image/*" class="form-control"  required value="" /> <br>
    <button class="btn btn-primary w-100">Upload</button>
    </div>
</form>
<a href="display.php"> See the uploaded images</a>
</center> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

<?php include_once('footer.php');?>
