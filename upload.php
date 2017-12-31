<!DOCTYPE html>
<html>
<body>
    <?php

        require_once 'functions.php';


        $target_dir = "uploads/";
        $utl = "";


         
            if (isset($_POST['submit'])) {
            $uploadOk = processImage($_POST , $_FILES , $target_dir , 4000000);
            $target_file = getFileName($_FILES , $target_dir);
            if (!$uploadOk) {
                echo "Sorry, your file was not uploaded.<br>";
            } else {
                $url = moveFile($_FILES , $target_file);
                echo "url : $url";
            }
        }
       

        //var_dump($uploadOk);
        //var_dump($target_file);

       
    ?>

    <form action="api.php" method="post">
        <label for="Key">API key</label>
        <input type="text" name="key" id="key" value="a1ff8c8b69d248808f32eb99d4d18787"><br>
        <label for="image">Image link</label>
        <input type="text" name="image" id="image" value="<?php $url ?>"><br>
        <input type="submit" value="submit" name="submit">
    </form>

</body>
</html>
