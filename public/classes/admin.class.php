<?php
include_once './dbh.class.php';

class Admin extends Dbh{
    public function a(){
        echo 'hello';
    }
}

// if($_POST['addEvent']){
//     $file = $_FILES['imgFile'];
//     // print_r($file);
//     $fileName = $file['name'];
//     $fileTmpName = $file['tmp_name'];
//     $fileSize = $file['size'];
//     $fileError = $file['error'];
//     $fileType = $file['type'];

//     $fileExt = explode('.', $fileName);
//     // JPG -> jpg
//     $fileActualExt = strtolower(end($fileExt));

//     $allowed = array('jpg', 'jpeg', 'png');

//     if(in_array($fileActualExt, $allowed)){
//         if($fileError === 0){
//             if($fileSize < 1300000){
//                 $fileNameNew = uniqid('', true).'.'.$fileActualExt;
//                 $fileDestination = '../res/img/Football/'.$fileNameNew;
//                 move_uploaded_file($fileTmpName, $fileDestination);
//                 header('location: ../pages/organizer/index.php?s=success');
//             }else{
//                 flash('organizer', 'Your file is too big!');
//                 redirect('../pages/organizer/index.php');    
//             }
//         }else{
//             flash('organizer', 'There was error uploading your file!');
//             redirect('../pages/organizer/index.php');
//         }
//     }else{
//         flash('organizer', 'you cannot upload files of this type');
//         redirect('../pages/organizer/index.php');
//     }
//     // $init = new Admin;
//     // $init->a();
// }