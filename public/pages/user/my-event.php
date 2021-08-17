<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usersId'])){
        // header('./index.php');
        header('Location: ./index.php');
}
include_once '../../includes/autoload.inc.php';
?>
<!DOCTYPE html>
<html lang="en" class='h-full'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/custom.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <title>Cliparo | My Events</title>
</head>
<body class='bg-gray-200 h-full'>
    <?php include('../common/header.php');  $eventContrObj = new EventContr;
     $result = $eventContrObj->ShowMyEvents();?>
    <main class='w-full h-full px-11 mt-20'>
        <div class='w-full h-auto text-4xl text-gray-400 font-bold mb-10'><?php echo mysqli_num_rows($result) ?> Total <span class='text-primary-500 font-semibold'>registered</span> events</div>
        <section class='w-full h-full'>
            <?php while($row = $result->fetch_assoc()){?>
                <div class='flex items-center'>
                    <div class='w-full h-1/6 flex justify-around items-center bg-white rounded-md p-4 shadow-md mb-5'>
                        <div class='h-auto w-2/12 rounded-full'><img src="<?php echo $row['img'] ?>" alt="couldn't load image" class='rounded-full object-cover h-auto w-8/12'></div>
                        <h2 class='text-gray-500 text-2xl'>Luis sanchez</h2>
                        <h2 class='text-gray-500 text-2xl'><?php echo $row['event_name'] ?></h2>
                        <h2 class='text-gray-500 text-2xl'><?php echo $row['sport_name'] ?></h2>
                        <h2 class='text-gray-500 text-2xl'><?php echo $row['price'] ?> SAR</h2>
                        <h2 class='text-gray-500 text-2xl'><?php echo $row['payment_method'] ?></h2>
                        <h2 class='text-gray-500 text-2xl'><?php echo $row['date'] ?></h2>
                    </div>
                    <div class='w-1/12 h-full text-center'><a href="../../classes/eventmanagecontr.class.php?id=delete"><i class="fas fa-times transform text-gray-600 scale-150 -translate-y-3 hover:text-red-500"></i></a></div>
                </div>
            <?php }?>
        </section>

    </main>
</body>
</html>