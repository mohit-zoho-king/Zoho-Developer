<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    .area{
        
        margin:30px auto;
        border-radius:10px;
        background:red;
        height:400px;
        width:300px;
        color:white;
        padding:20px;
    }
    label{
        text-align:left;
        font-size:20px;
        
    }
    input{
        margin:10px auto;
        height:30px;
        width:100%;
    }
</style>
<body>
<div class="area">
    <form  method="get" action="<?php $_SERVER['PHP_SELF']?>">
        
    <label for="Name">  First Name</label>
    <input type="text" name="first"><br>
    <label for="Name">  Last Name</label>
    <input type="text"name="last">
    <input type="submit" value="New Record">
        
</form>

</div>
</body>

</html>