<?php 
include '../../includes/autoload.inc.php';
include_once('../../helpers/session_helper.php');

$eventObj = new EventContr;
$eventRow = $eventObj->Event($_GET['e']);
$organizerRow = $eventObj->Organizer($_GET['o']);
// $eventRow = $eventObj->getEvent($_GET['i']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"> -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Event Detail</title>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id='pageOverlay' class='absolute w-full h-full bg-gray-900 opacity-20 z-30 hidden'></div>
    <?php include('../common/header.php')?>
    <!-- event name-img -->
    <div id ='eventUpperContainer' class='h-96 relative overflow-hidden flex mb-20'>
        <div class='bg-primary-100 h-64 absolute w-full'></div>
        <!-- event image left-44 top-6 -->
        <div class='z-20 h-96 w-1/4 mt-10 ml-48'>
            <img src="<?php echo $eventRow['img'];?>" alt="couldn't load image" class='rounded-md'>
        </div>
        <!-- title -->
        <div class='z-20 ml-24 mt-10'>
            <h2 class='font-light text-3xl text-gray-500 mb-5'>Event</h2>
            <h1 class='text-5xl text-primary-500 mb-7'><?php echo $eventRow['name'];?></h1>
            <button id='registerEventBtn' class='bg-primary-400 rounded-full h-14 w-64 text-xl hover:bg-primaryHover-200' onclick='RegisterEvent()'>Register</button>
        </div>
        <!-- blob shape -->
        <div>
            <div class='h-auto w-1/3 absolute opacity-60 -top-80 right-10'>
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class='w-full h-full'>
                    <path fill="#F1E4CD" d="M58.5,-49.9C66.7,-36.4,58,-12.6,50.6,8.3C43.3,29.2,37.3,47.2,23.3,57.3C9.3,67.4,-12.7,69.8,-33.3,62.4C-54,55.1,-73.2,38.1,-78.4,17.3C-83.6,-3.4,-74.7,-28,-59.3,-43.1C-43.9,-58.3,-22,-64.1,1.6,-65.4C25.1,-66.6,50.3,-63.4,58.5,-49.9Z" transform="translate(100 100)" />
                </svg>
            </div>
            <div class='h-52 w-52 absolute top-10 right-1/4 opacity-50 z-10'>
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class='h-full w-full'>
                <path fill="#FEDFA6" d="M41.9,-43.8C54.2,-29.7,64,-14.8,67,3C70.1,20.9,66.4,41.8,54.1,55C41.8,68.2,20.9,73.6,2.5,71.1C-15.8,68.5,-31.7,58,-47.9,44.8C-64.2,31.7,-80.9,15.8,-81.7,-0.8C-82.6,-17.5,-67.6,-35.1,-51.3,-49.2C-35.1,-63.3,-17.5,-74.1,-1.4,-72.7C14.8,-71.4,29.7,-57.9,41.9,-43.8Z" transform="translate(100 100)" />
            </svg>
            </div>
        </div>
    </div>
    <main id = 'mainContainer' class='w-10/12 m-auto'>
        <!-- Event description -->
        <div class='h-20 w-full'>
            <ul class='flex justify-between w-full items-center'>
                <li class='text-gray-600 text-xl'>
                    <svg class='inline-block mr-2' xmlns="http://www.w3.org/2000/svg" width="56.786" height="39.75" viewBox="0 0 56.786 39.75">
                        <path id="Icon_awesome-users" data-name="Icon awesome-users" d="M8.518,19.286a5.679,5.679,0,1,0-5.679-5.679A5.684,5.684,0,0,0,8.518,19.286Zm39.75,0a5.679,5.679,0,1,0-5.679-5.679A5.684,5.684,0,0,0,48.268,19.286Zm2.839,2.839H45.429a5.662,5.662,0,0,0-4,1.65,12.978,12.978,0,0,1,6.663,9.707h5.856a2.836,2.836,0,0,0,2.839-2.839V27.8A5.684,5.684,0,0,0,51.107,22.125Zm-22.714,0a9.938,9.938,0,1,0-9.938-9.938A9.932,9.932,0,0,0,28.393,22.125Zm6.814,2.839h-.736a13.72,13.72,0,0,1-12.156,0h-.736A10.224,10.224,0,0,0,11.357,35.186v2.555A4.26,4.26,0,0,0,15.616,42H41.17a4.26,4.26,0,0,0,4.259-4.259V35.186A10.224,10.224,0,0,0,35.207,24.964ZM15.359,23.775a5.662,5.662,0,0,0-4-1.65H5.679A5.684,5.684,0,0,0,0,27.8v2.839a2.836,2.836,0,0,0,2.839,2.839H8.686A13.011,13.011,0,0,1,15.359,23.775Z" transform="translate(0 -2.25)" fill="gray"/>
                    </svg>
                    <?php echo $eventRow['register'];?> registered
                </li>
                <li class='border-l-2 border-gray-400 text-gray-600 text-xl'>
                    <svg class='inline-block ml-2 mr-2' xmlns="http://www.w3.org/2000/svg" width="56.786" height="39.75" viewBox="0 0 56.786 39.75">
                        <path id="Icon_awesome-users" data-name="Icon awesome-users" d="M8.518,19.286a5.679,5.679,0,1,0-5.679-5.679A5.684,5.684,0,0,0,8.518,19.286Zm39.75,0a5.679,5.679,0,1,0-5.679-5.679A5.684,5.684,0,0,0,48.268,19.286Zm2.839,2.839H45.429a5.662,5.662,0,0,0-4,1.65,12.978,12.978,0,0,1,6.663,9.707h5.856a2.836,2.836,0,0,0,2.839-2.839V27.8A5.684,5.684,0,0,0,51.107,22.125Zm-22.714,0a9.938,9.938,0,1,0-9.938-9.938A9.932,9.932,0,0,0,28.393,22.125Zm6.814,2.839h-.736a13.72,13.72,0,0,1-12.156,0h-.736A10.224,10.224,0,0,0,11.357,35.186v2.555A4.26,4.26,0,0,0,15.616,42H41.17a4.26,4.26,0,0,0,4.259-4.259V35.186A10.224,10.224,0,0,0,35.207,24.964ZM15.359,23.775a5.662,5.662,0,0,0-4-1.65H5.679A5.684,5.684,0,0,0,0,27.8v2.839a2.836,2.836,0,0,0,2.839,2.839H8.686A13.011,13.011,0,0,1,15.359,23.775Z" transform="translate(0 -2.25)" fill="gray"/>
                    </svg>
                    <?php echo $eventRow['available'];?> available
                </li>
                <li class='border-l-2 border-gray-400 text-gray-600 text-xl'>
                <svg class='inline-block ml-2 mr-2' xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                    <path id="Icon_awesome-user-alt" data-name="Icon awesome-user-alt" d="M18,20.25A10.125,10.125,0,1,0,7.875,10.125,10.128,10.128,0,0,0,18,20.25Zm9,2.25H23.126a12.24,12.24,0,0,1-10.252,0H9a9,9,0,0,0-9,9v1.125A3.376,3.376,0,0,0,3.375,36h29.25A3.376,3.376,0,0,0,36,32.625V31.5A9,9,0,0,0,27,22.5Z" fill="gray"/>
                </svg>
                    <?php echo $organizerRow['username'];?>
                </li>
                <li class='border-l-2 border-gray-400 text-gray-600 text-xl'>
                <svg class='inline-block ml-2 mr-2' xmlns="http://www.w3.org/2000/svg" width="45.001" height="31.5" viewBox="0 0 45.001 31.5">
                    <path id="Icon_awesome-money-bill-wave" data-name="Icon awesome-money-bill-wave" d="M43.675,3.829A20.822,20.822,0,0,0,35.49,2.25c-8.66,0-17.32,4.383-25.98,4.383A21.333,21.333,0,0,1,3,5.669a2.4,2.4,0,0,0-.728-.114A2.237,2.237,0,0,0,0,7.791V30.1A2.236,2.236,0,0,0,1.325,32.17,20.81,20.81,0,0,0,9.51,33.75c8.66,0,17.321-4.384,25.981-4.384a21.333,21.333,0,0,1,6.514.965,2.4,2.4,0,0,0,.728.114A2.237,2.237,0,0,0,45,28.208V5.9a2.239,2.239,0,0,0-1.325-2.072ZM3.375,9.3a24.469,24.469,0,0,0,4.41.628,4.505,4.505,0,0,1-4.41,3.624Zm0,20.039v-3.36a4.5,4.5,0,0,1,4.48,4.317A16.986,16.986,0,0,1,3.375,29.336ZM22.5,24.75c-3.107,0-5.625-3.023-5.625-6.75s2.519-6.75,5.625-6.75,5.625,3.022,5.625,6.75S25.606,24.75,22.5,24.75ZM41.625,26.7a24.175,24.175,0,0,0-3.819-.593,4.491,4.491,0,0,1,3.819-3.465Zm0-16.6A4.491,4.491,0,0,1,37.7,5.774a16.9,16.9,0,0,1,3.924.89Z" transform="translate(0 -2.25)" fill="gray"/>
                </svg>
                <?php echo $eventRow['price'];?> SR
                </li>
                <li class='border-l-2 border-gray-400 text-gray-600 text-xl'>
                <svg class='inline-block ml-2 mr-2' xmlns="http://www.w3.org/2000/svg" width="39.488" height="43.875" viewBox="0 0 39.488 43.875">
                    <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M17.663,22.744H13.275v4.387h4.388Zm8.775,0H22.05v4.387h4.387Zm8.775,0H30.825v4.387h4.388ZM39.6,7.388H37.406V3H33.019V7.388H15.469V3H11.081V7.388H8.888a4.368,4.368,0,0,0-4.366,4.387L4.5,42.488a4.386,4.386,0,0,0,4.388,4.387H39.6a4.4,4.4,0,0,0,4.388-4.387V11.775A4.4,4.4,0,0,0,39.6,7.388Zm0,35.1H8.888V18.356H39.6Z" transform="translate(-4.5 -3)" fill="gray"/>
                </svg>
                <?php echo $eventRow['date'];?>
                </li>
            </ul>
        </div>
        <!-- seperator -->
        <div class='w-full h-2 mb-20 m-auto bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200'></div>
        <!-- About event -->
        <section>
            <div>
                <h1 class='text-gray-600 text-4xl mb-10'>About this event</h1>
            </div>
            <div class='mb-20'>
                <p class='w-1/2 text-justify'><?php echo $eventRow['about'];?></p>
            </div>
        </section>
        <!-- Google Map -->
        <section></section>
    </main>
    <!-- Event Preview -->
    <?php include('./event-preview.php')?>
    <script defer src="../../script/event-detail/index.js"></script>
    <script defer src="../../script/event-detail/checkout-preview.js"></script>
    <?php include('../common/footer.php')?>
</body>
</html>