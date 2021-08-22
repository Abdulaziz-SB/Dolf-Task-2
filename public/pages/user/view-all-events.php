<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usersId'])){
        header('Location: ../common/sign-in.php');
}
include '../../includes/autoload.inc.php';
$eventObj = new EventContr;
$result = $eventObj->ShowAllEvents();
?>
<!DOCTYPE html>
<html lang="en" class='h-full'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/custom.css">
    <title>Cliparo | all events</title>
</head>
<body class='h-full bg-gray-100'>
    <?php include('../common/header.php');
    if (!(session_status() == PHP_SESSION_NONE)) {
        $reservedResult = $eventObj->ReservedEvents($_SESSION['usersId']);
        $reserved = array();
        if($reservedResult != false){
            while($rows = $reservedResult->fetch_assoc()){
                array_push($reserved, $rows['event_id']);
            }
        }
    }
    ?>
    
    <main class='w-full h-full bg-gray-100 px-11'>
        <h1 class='text-5xl text-gray-600 font-light my-20'>All Events</h1>
        <div class='grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-10 mb-6 lg:grid-cols-6'>
            <?php while($row = $result->fetch_assoc()){?>
                <a href="./event-detail.php?o=<?php echo $row['user_id']?>&e=<?php echo $row['id']?>" class='<?php if(in_array($row['id'], $reserved)){ ?> pointer-events-none <?php }else{?> pointer-events-auto <?php }?>'>
                <div class='card w-full h-auto hover:shadow-lg cursor-pointer relative'>
                        <?php if(in_array($row['id'], $reserved)){ ?><div class='w-full h-full absolute opacity-40 bg-green-500'></div><?php }?>
                        <img src="<?php echo $row['img'] ?>" alt="couldn't load image" class='w-full object-cover'>
                        <div class='m-4'>
                            <h2 class='mb-2 font-medium'><?php echo $row['name'];?></h2>
                            <h2 class='mb-2 font-medium'><?php if(in_array($row['id'], $reserved)){ ?>Registered<?php }else{ echo $row['available'];?> available<?php }?></h2>
                            <h2 class='font-light'><?php echo $row['date'] ?></h2>
                        </div>
                        <div class='bg-primary-300 text-gray-700 text-xs uppercase font-bold rounded-full p-2 absolute top-0 ml-2 mt-2'>
                            <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <span><?php echo $row['price'] ?> SR</span>
                        </div>
                    </div>
                </a>
                <?php }?>
            </div>
    </main>
    <?php include_once('../common/footer.php');?>
</body>
</html>