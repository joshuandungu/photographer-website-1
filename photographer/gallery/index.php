 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post your recent work here</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="style.css">
</head>
<body>
    <center>

<form class="" action="insert.php" method="POST"  enctype="multipart/form-data"> 
    <div class=" col-4 p-2 border m-2">
    <h1>Fill in the form below</h1>
    
        <h3>Indicate type of photographer or professionalism</h2>
    
     <input type="text" cols="55" name="category" placeholder="category" class="form-control">
        
        <p class="form-control"><h3>Upload Your Image</h3> </p>
    <input type="file" name="image_upload"  accept="image/*" class="form-control"  multiple /> <br>
    <h3>Indicate Photographer Name</h2>
    <input type="text" cols="55" name="name" placeholder="Photographer Name" class="form-control">
    
    <br>
   <p><h3>More Details</h3><textarea cols="55" name="description" placeholder="More Details" class="form-control">
        </textarea></p>
    <button class="btn btn-primary w-100"  name= "submit">Upload</button>
    </div>
</form>
<a href="display.php"> See the uploaded images</a>
</center> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>

