<?php
if(!isset($_SESSION['usersId'])){
    session_start();
}
include_once './eventManage.class.php';

class EventManageContr extends EventManage{
    private $eventManage;

    public function __construct() {
        $this->eventManage = new EventManage;
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
                    $fileDestination = '../res/img/'.$postFileType.'/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    return '/Dolf-Task-2/public/res/img/'.$postFileType.'/'.$fileNameNew;
                }else{
                    flash('organizer', 'Your file is too big!');
                    redirect('../pages/organizer/index.php?err=size');    
                }
            }else{
                flash('organizer', 'There was error uploading your file!');
                redirect('../pages/organizer/index.php?err=upload');
            }
        }else{
            flash('organizer', 'you cannot upload files of this type');
            redirect('../pages/organizer/index.php?err=ext');
        }
    }
    public function addEvent(){
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
        // pass the type name
        $data['img'] = $this->processFile($data['type']);
        // convert type name to id(index)
        $eventIndex = $this->eventManage->getEventTypeId($data['type']);
        $data['type'] = $eventIndex['id'];

        if($this->eventManage->AddNewEvent($data)){
            redirect('../pages/organizer/index.php?st=added');
        }else{
            redirect('../pages/organizer/index.php?st=failed');
        }
    }
    public function DeleteEventById($id){
        if($this->eventManage->DeleteEvent($id)){
            redirect('../pages/organizer/index.php?st=deleted');
        }else{
            redirect('../pages/organizer/index.php?st=failed');
        }
    }
    public function DeleteCustomerEvent($eventId){
        if($this->eventManage->DeleteUserEvent($_SESSION['usersId'], $eventId)){
            redirect('../pages/user/my-event.php?st=deleted');
        }else{
            redirect('../pages/user/my-event.php?st=failed');
        }
    }
}
$init = new EventManageContr;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['addEvent']){
        case 'addNewEvent':
            $init->addEvent();
            break;
    }
}else{
    if(isset($_GET['id'])){
        if($_GET['id'] == 'delete'){
            // e -> event id
            $init->DeleteCustomerEvent($_GET['e']);
        }else{
            $init->DeleteEventById($_GET['id']);
        }
    }
}