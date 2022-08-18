<?php
  
require('class.pdf2text.php');
require('../config.php');

extract($_POST);
 
if(isset($readpdf)){
     
    if($_FILES['file']['type']=="application/pdf") {
        $a = new PDF2Text();
        $a->setFilename($_FILES['file']['tmp_name']);
        $a->decodePDF();
        // echo $a->output();

        // $sql = "INSERT INTO skripsi(Penulis, File_skripsi, Tahun) VALUES ('ilham', '".$_FILES['file']['name']."', '2022')";
        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        //   } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        //   }
    
    } else {
        echo "<p style='color:red; text-align:center'>File harus berformat PDF</p>";
    }
}
?>

<html>
 
<head>
    <title>Read file</title>
</head>
 
<body>
    <form method="post" enctype="multipart/form-data" action="tes_winnowing.php">
        <textarea cols="86" rows ="20" name="kalimat1"><?php echo $a->output(); ?></textarea>
        <br>
        <input type="submit" />
    </form>
</body>
 
</html>