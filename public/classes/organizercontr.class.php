<?php
// require_once './organizer.class.php';
// require_once '../helpers/session_helper.php';
include_once './organizer.class.php';
include_once '../helpers/session_helper.php';
// error_reporting(E_ERROR | E_PARSE);
// try {
// }catch (Exception $e){

// }

class OrganizerContr extends Organizer{
    private $organizerModel;

    public function __construct() {
        $this->organizerModel = new Organizer;
    }

    public function showOrganizerEvents($organizerId){
        $result = $this->organizerModel->OrganizerEvents($organizerId);
        return $result;
    }
    public function processFile($postFileType){
        $file = $_FILES['imgFile'];
        // print_r($file);
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        // JPG -> jpg
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1300000){
                    $fileNameNew = uniqid('', true).'.'.$fileActualExt;
                    $fileDestination = '../res/img/Football/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    return '/Dolf-Task-2/public/res/img/'.$postFileType.'/'.$fileNameNew;
                }else{
                    flash('organizer', 'Your file is too big!');
                    return null;
                    // redirect('../pages/organizer/index.php?err=size');    
                }
            }else{
                flash('organizer', 'There was error uploading your file!');
                return null;
                // redirect('../pages/organizer/index.php?err=upload');
            }
        }else{
            flash('organizer', 'you cannot upload files of this type');
            return null;
            // redirect('../pages/organizer/index.php?err=ext');
        }
    }
    public function addEvent(){
        // $this->organizerModel->AddNewEvent();
        $data = [
            'userId' => $_SESSION['usersId'],
            'name' => trim($_POST['eventName']),
            'type' => ucfirst($_POST['typeSelection']),
            'price' => trim($_POST['eventPrice']),
            'available' => trim($_POST['available']),
            'date' => trim($_POST['eventDate']),
            'about' => trim($_POST['eventAbout']),
            'img' => ''
        ];
        $eventIndex = $this->getEventTypeId($data['type']);
        echo $eventIndex . '<br>';
        // $data['img'] = $this->processFile($data['type']);
        // $this->eve();
        print_r($data) . '<br>';
        echo $data['img'] . $data['userId'] ;
        // $this->
    }
}
// addNewEvent
$init = new OrganizerContr;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['addEvent']){
        case 'addNewEvent':
            // require_once './organizer.class.php';
            $init->addEvent();
            break;
    }
}