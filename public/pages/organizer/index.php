<?php 
include_once('../../helpers/session_helper.php');
// error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html lang="en" class='h-full'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Organizer</title>
</head>
<body class='h-full'>
    <?php include('../common/header.php');
        include_once '../../includes/autoload.inc.php';
        $organizerObj = new OrganizerContr;
        $result = $organizerObj->showOrganizerEvents($_SESSION['usersId']);
        $resultCustomers = $organizerObj->getReservedUsers($_SESSION['usersId']);
        $resultTotalRevenue = $organizerObj->GetOrganizerRevenue($_SESSION['usersId']);
        $resultTotalAttendance = $organizerObj->GetAttendentUsers($_SESSION['usersId']);
    ?>
    <div class='flex h-full'>
        <!-- side bar -->
        <section class='hidden h-full w-1/6 bg-blue-800 md:block'>
            <ul class='h-1/2 w-full flex flex-col justify-around items-start p-5 mt-10'>
               <a href="#" id='dashboardIcon' onclick='NavigateSideBar(event)'><li class='text-2xl text-white w-full h-auto sidebar-item sidebar-item hover:text-blue-100'><span class='mr-2'><i class="fas fa-home"></i></span>Dashboard</li></a>
               <a href="#" id='eventIcon' onclick='NavigateSideBar(event)'><li class='text-2xl text-white sidebar-item hover:text-blue-100'><span class='mr-2'><i class="fas fa-star"></i></span>Events</li></a>
            </ul>
        </section>
        <!-- dashboard main -->
        <main id='dashboardContainer' class='w-full h-full bg-gray-200 hidden'>
            <section class='w-full h-auto inline-block p-11'>
                <div>
                    <h1 class='h-20 w-full text-3xl text-gray-600 font-bold'><?php echo $_SESSION['usersName']; ?> Dashboard</h1>
                </div>
                <!-- summary -->
                <div class='w-full h-auto grid grid-cols-3 gap-10 mt-20'>
                    <div class='bg-white shadow-lg h-auto rounded-md p-5 flex justify-between hover:shadow-xl'>
                        <!-- attendance -->
                        <div class='inline-block'><h2 class='text-3xl'><?php if($resultTotalAttendance != false) echo $organizerObj->thousandsCurrencyFormat($resultTotalAttendance); else echo '0'; ?></h2><h2 class='text-xl font-light text-gray-600 mt-3'>Attended your event</h2></div>
                        <div class='inline-block'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="71.216" viewBox="0 0 52 71.216">
                                <g id="attendance-group" data-name="Group 15" transform="translate(-380 -21)">
                                    <path id="Path_123" data-name="Path 123" d="M26,0A26,26,0,0,1,52,26c0,14.359-11.641,45.216-26,45.216S0,40.359,0,26A26,26,0,0,1,26,0Z" transform="translate(380 21)" fill="#33EBCA"/>
                                    <path id="Icon_awesome-user-alt" data-name="Icon awesome-user-alt" d="M13.858,15.59a7.8,7.8,0,1,0-7.8-7.8A7.8,7.8,0,0,0,13.858,15.59Zm6.929,1.732H17.8a9.423,9.423,0,0,1-7.893,0H6.929A6.928,6.928,0,0,0,0,24.251v.866a2.6,2.6,0,0,0,2.6,2.6H25.117a2.6,2.6,0,0,0,2.6-2.6v-.866A6.928,6.928,0,0,0,20.787,17.322Z" transform="translate(392.143 32.642)" fill="#EBFFFB"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class='bg-white shadow-lg h-auto rounded-md p-5 flex justify-between hover:shadow-xl'>
                        <!-- events -->
                        <div class='inline-block'><h2 class='text-3xl'><?php if ($result != false) { echo $organizerObj->thousandsCurrencyFormat(mysqli_num_rows($result)); }else{echo '0'; } ?></h2><h2 class='text-xl font-light text-gray-600 mt-3'>Events</h2></div>
                        <div class='inline-block'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="71.216" viewBox="0 0 52 71.216">
                                <g id="event-group" data-name="Group 16" transform="translate(-374.045 -21)">
                                    <path id="Path_124" data-name="Path 124" d="M26,0A26,26,0,0,1,52,26c0,14.359-11.641,45.216-26,45.216S0,40.359,0,26A26,26,0,0,1,26,0Z" transform="translate(374.045 21)" fill="#ff5ef4"/>
                                    <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(382.045 29)" fill="#ffd6fc"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class='bg-white shadow-lg h-auto rounded-md p-5 flex justify-between hover:shadow-xl'>
                        <!-- attendance -->
                        <div class='inline-block'><h2 class='text-3xl'><?php if($resultTotalRevenue != false) echo $organizerObj->thousandsCurrencyFormat($resultTotalRevenue); else echo '0'; ?></h2><h2 class='text-xl font-light text-gray-600 mt-3'>SAR Revenue</h2></div>
                            <div class='inline-block'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="52" height="71.216" viewBox="0 0 52 71.216">
                                    <g id="followers-group" transform="translate(-390 -21)">
                                        <path id="Path_125" data-name="Path 125" d="M26,0A26,26,0,0,1,52,26c0,14.359-11.641,45.216-26,45.216S0,40.359,0,26A26,26,0,0,1,26,0Z" transform="translate(390 21)" fill="#f98a51"/>
                                        <path id="Icon_awesome-users" data-name="Icon awesome-users" d="M5.751,13.752A3.834,3.834,0,1,0,1.917,9.918,3.837,3.837,0,0,0,5.751,13.752Zm26.837,0a3.834,3.834,0,1,0-3.834-3.834A3.837,3.837,0,0,0,32.588,13.752ZM34.5,15.669H30.671a3.823,3.823,0,0,0-2.7,1.114,8.762,8.762,0,0,1,4.5,6.554h3.954a1.915,1.915,0,0,0,1.917-1.917V19.5A3.837,3.837,0,0,0,34.5,15.669Zm-15.336,0A6.709,6.709,0,1,0,12.46,8.959,6.706,6.706,0,0,0,19.169,15.669Zm4.6,1.917h-.5a9.263,9.263,0,0,1-8.207,0h-.5a6.9,6.9,0,0,0-6.9,6.9v1.725a2.876,2.876,0,0,0,2.875,2.875H27.8a2.876,2.876,0,0,0,2.875-2.875V24.487A6.9,6.9,0,0,0,23.77,17.586Zm-13.4-.8a3.823,3.823,0,0,0-2.7-1.114H3.834A3.837,3.837,0,0,0,0,19.5v1.917a1.915,1.915,0,0,0,1.917,1.917H5.865A8.784,8.784,0,0,1,10.369,16.783Z" transform="translate(396.83 30.831)" fill="#ffdac7"/>
                                    </g>
                                </svg>
                            </div>
                        </div>
                </div>
            </section>

            <!-- events information img -->
            <section class='px-11 hidden'>
                <div class='w-full h-auto grid grid-cols-2 gap-44'>
                    <!-- ongoing events -->
                    <div class='h-auto bg-gray-100 px-4 shadow-md'>
                        <h1 class='text-gray-500 text-2xl p-4 rounded-md'>Ongoing Events <span><i class="fas fa-hourglass-start"></i></span></h1>
                        <div class='w-full h-auto flex flex-wrap flex-row justify-between mb-6'>
                            <div class='card w-5/12'>
                                <img src="../../res/img/ball.jpg" alt="couldn't load image" class='w-full object-cover'>
                                <div class='m-4'>
                                    <h2 class='mb-2 font-medium'>Football</h2>
                                    <h2 class='mb-2 font-medium'>Roberto luis</h2>
                                    <h2 class='mb-2 font-medium'>56 registered</h2>
                                    <h2 class='font-light'>9:00pm - 10:00pm 21/9/2021</h2>
                                </div>
                            </div>
                            <div class='card w-5/12'>
                                <img src="../../res/img/ball.jpg" alt="couldn't load image" class='w-full object-cover'>
                                <div class='m-4'>
                                    <h2 class='mb-2 font-medium'>Football</h2>
                                    <h2 class='mb-2 font-medium'>Roberto luis</h2>
                                    <h2 class='mb-2 font-medium'>56 registered</h2>
                                    <h2 class='font-light'>9:00pm - 10:00pm 21/9/2021</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ended events -->
                    <div class='h-auto bg-gray-100 px-4 shadow-md'>
                        <h1 class='text-gray-500 text-2xl p-4 rounded-md'>Ended Events <span><i class="fas fa-hourglass-end"></i></span></h1>
                        <div class='w-full h-auto flex flex-wrap flex-row justify-between mb-6'>
                            <div class='card w-5/12'>
                                <img src="../../res/img/ball.jpg" alt="couldn't load image" class='w-full object-cover'>
                                <div class='m-4'>
                                    <h2 class='mb-2 font-medium'>Football</h2>
                                    <h2 class='mb-2 font-medium'>Roberto luis</h2>
                                    <h2 class='mb-2 font-medium'>56 registered</h2>
                                    <h2 class='font-light'>9:00pm - 10:00pm 21/9/2021</h2>
                                </div>
                            </div>
                            <div class='card w-5/12'>
                                <img src="../../res/img/ball.jpg" alt="couldn't load image" class='w-full object-cover'>
                                <div class='m-4'>
                                    <h2 class='mb-2 font-medium'>Football</h2>
                                    <h2 class='mb-2 font-medium'>Roberto luis</h2>
                                    <h2 class='mb-2 font-medium'>56 registered</h2>
                                    <h2 class='font-light'>9:00pm - 10:00pm 21/9/2021</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class='h-auto px-11'>
                <div class='w-full bg-white rounded-md p-4 shadow-md'>
                    <div><h1 class='text-3xl text-gray-500 font-bold mb-10'>Registration</h1></div>
                    <!-- list of registration -->
                    <?php while($row = $resultCustomers->fetch_assoc()){?>
                        <div class='grid grid-cols-5 text-center mb-5 border-b-2 border-gray-200'>
                            <h2 class='text-gray-600 font-medium text-2xl'><span><i class="fas fa-user text-gray-500 mr-4"></i></span><?php echo $row['username']; ?></h2>
                            <h2 class='text-green-600 font-medium text-2xl'> <span><i class="fas fa-check-double mr-4"></i></span>Delivered</h2>
                            <h2 class='text-gray-600 font-medium text-2xl'><?php echo $row['dates']; ?></h2>
                            <h2 class='text-gray-600 font-medium text-2xl'><?php echo $row['payment_method']; ?></h2>
                            <h2 class='text-green-600 font-medium text-2xl'>SR: <?php echo $row['price']; ?></h2>
                        </div>
                        <?php }?>
                </div>
            </section>
        </main>
        <!-- Event main -->
        <main id='eventContainer' class='w-full h-full bg-gray-200 px-1 md:px-11'>
            <section class='w-full mt-20 flex justify-around mb-20'>
                <div class='w-5/12 md:w-4/12 lg:w-3/12 flex justify-between'>
                    <div class='w-full bg-white shadow-lg h-auto rounded-md p-5 flex justify-between hover:shadow-xl'>
                        <!-- attendance -->
                        <div class='inline-block'><h2 class='text-3xl'><?php if ($result != false) {echo $organizerObj->thousandsCurrencyFormat(mysqli_num_rows($result));} else{echo '0'; } ?></h2><h2 class='text-xl font-light text-gray-600 mt-3'>Total Events</h2></div>
                        <div class='inline-block'>
                            <svg xmlns="http://www.w3.org/2000/svg" class='w-full' width="52" height="71.216" viewBox="0 0 52 71.216">
                                <g id="event-group" data-name="Group 16" transform="translate(-374.045 -21)">
                                    <path id="Path_124" data-name="Path 124" d="M26,0A26,26,0,0,1,52,26c0,14.359-11.641,45.216-26,45.216S0,40.359,0,26A26,26,0,0,1,26,0Z" transform="translate(374.045 21)" fill="#ff5ef4"/>
                                    <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(382.045 29)" fill="#ffd6fc"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class='rounded-md bg-white p-5 w-5/12 md:w-4/12 lg:w-3/12 flex items-center justify-center cursor-pointer hover:shadow-lg' onclick='ShowAddEventContainer()'>
                    <h2 class='text-2xl inline-block min-w-min mr-4'>Create event</h2>
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24.438" height="25.63" viewBox="0 0 24.438 25.63">
                        <path id="Icon_ionic-md-add" data-name="Icon ionic-md-add" d="M31.188,21.273H20.6V32.38H17.34V21.273H6.75V17.856H17.34V6.75H20.6V17.856h10.59Z" transform="translate(-6.75 -6.75)" fill="#ffb217"/>
                    </svg>
                    </span>
                </div>
            </section>
            <?php include_once './add-event.php';?>
            <!-- table -->
            <section class='w-full h-auto my-20' id='registrationContainer'>
                <?php if($result != false){?>
                <table class='table-auto w-full'>
                    <thead class='bg-gray-100 text-xl text-gray-700'>
                        <tr>
                            <th class='font-normal text-base md:text-lg'>#</th>
                            <th class='font-normal text-base md:text-lg'>Event</th>
                            <th class='font-normal text-base md:text-lg'>Date</th>
                            <th class='font-normal text-base md:text-lg'>Registered</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php $id=0; 
                    while($row = $result->fetch_assoc()){?>
                    <tbody class='bg-white text-center text-xl'>
                        <tr>
                            <td class='p-3 text-gray-500 text-base md:text-lg'><?php echo $id+=1; ?></td>
                            <td class='p-3 text-base md:text-lg'><?php echo $row['name'] ?></td>
                            <td class='p-1 md:p-3 text-base md:text-lg'><?php echo $row['date'] ?></td>
                            <td class='p-3 text-base md:text-lg'><?php echo $row['register'] ?></td>
                            <td class='p-1 w-1/12 md:w-1/12'><a href="../../classes/eventmanagecontr.class.php?id='<?php echo $row['id'] ?>'"><span class='cursor-pointer'><svg xmlns="http://www.w3.org/2000/svg" class='w-full h-2/3 md:w-1/3' viewBox="0 0 43.869 6.75">
                                <path id="Icon_awesome-minus" data-name="Icon awesome-minus" d="M40.736,14.625H3.134C1.4,14.625,0,15.633,0,16.875v2.25c0,1.242,1.4,2.25,3.134,2.25h37.6c1.73,0,3.134-1.008,3.134-2.25v-2.25C43.869,15.633,42.466,14.625,40.736,14.625Z" transform="translate(0 -14.625)" fill="#f64747"/>
                                </svg></span>
                            </td>
                            <td class='p-1 w-1/12 md:w-1/12'><span class='cursor-pointer'><svg xmlns="http://www.w3.org/2000/svg"    class='w-full h-2/3 md:w-1/3' viewBox="0 0 31.001 31">
                                <path id="Icon_awesome-pen" data-name="Icon awesome-pen" d="M17.6,5.646,25.355,13.4,8.523,30.229l-6.911.763a1.453,1.453,0,0,1-1.6-1.605l.769-6.916L17.6,5.646ZM30.149,4.492,26.51.852a2.908,2.908,0,0,0-4.112,0L18.974,4.276l7.751,7.751L30.149,8.6a2.908,2.908,0,0,0,0-4.112Z" transform="translate(0.001 -0.001)" fill="#66bbdb"/>
                                </svg></span></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php }?>
                </table>
                <?php }else{?>
                    <div><h1 class='text-4xl text-gray-400 font-bold text-center mb-5'>You Don't have any events</h1></div>
                    <div class='flex justify-center items-center'>
                        <svg id="undraw_void_3ggu" xmlns="http://www.w3.org/2000/svg" width="359.314" height="375.155" viewBox="0 0 359.314 375.155">
                            <ellipse id="Ellipse_25" data-name="Ellipse 25" cx="138.688" cy="24.501" rx="138.688" ry="24.501" transform="translate(0 326.153)" fill="#cecece"/>
                            <path id="Path_205" data-name="Path 205" d="M135.541,0A135.541,135.541,0,1,1,0,135.541,135.541,135.541,0,0,1,135.541,0Z" transform="translate(88.231)" fill="#2e2b54"/>
                            <circle id="Ellipse_27" data-name="Ellipse 27" cx="111.894" cy="111.894" r="111.894" transform="translate(111.086 23.648)" fill="#2e10ff" opacity="0.05"/>
                            <circle id="Ellipse_28" data-name="Ellipse 28" cx="91.707" cy="91.707" r="91.707" transform="translate(131.273 43.834)" fill="#0e0067" opacity="0.05"/>
                            <circle id="Ellipse_29" data-name="Ellipse 29" cx="65.752" cy="65.752" r="65.752" transform="translate(157.228 69.789)" fill="#09013e" opacity="0.05"/>
                            <path id="Path_194" data-name="Path 194" d="M389.686,361.232s-10.656,30-5.92,40.652A132.323,132.323,0,0,0,396,422.8S393.238,363.206,389.686,361.232Z" transform="translate(-301.047 -213.561)" fill="#a4a4a4"/>
                            <path id="Path_195" data-name="Path 195" d="M389.686,361.232s-10.656,30-5.92,40.652A132.323,132.323,0,0,0,396,422.8S393.238,363.206,389.686,361.232Z" transform="translate(-301.047 -213.561)" fill="#aeaeae" opacity="0.1"/>
                            <path id="Path_196" data-name="Path 196" d="M397.652,514.78s-.789,7.5-1.184,7.894.395,1.184,0,2.368-.789,2.763,0,3.157-4.341,35.126-4.341,35.126-12.63,16.576-7.5,42.625l1.579,26.443s12.235.789,12.235-3.552a72.31,72.31,0,0,1-.789-7.5c0-2.368,1.973-2.368.789-3.552s-1.184-1.973-1.184-1.973,1.973-1.579,1.579-1.973,3.552-28.417,3.552-28.417,4.341-4.341,4.341-6.709V576.35s1.973-5.131,1.973-5.525,10.656-24.47,10.656-24.47L423.7,563.72l4.736,24.865s2.368,22.5,7.1,31.179c0,0,8.288,28.417,8.288,27.627s13.814-2.763,13.419-6.315S448.96,587.8,448.96,587.8l1.973-73.8Z" transform="translate(-301.514 -297.646)" fill="#2f2e41"/>
                            <path id="Path_197" data-name="Path 197" d="M384.058,767.179S373.4,788.1,380.506,788.886s9.867.789,13.024-2.368a52.548,52.548,0,0,1,8.036-5.787,10.392,10.392,0,0,0,4.931-9.882c-.208-1.931-.93-3.522-2.706-3.67-4.736-.395-10.262-4.736-10.262-4.736Z" transform="translate(-298.576 -434.405)" fill="#2f2e41"/>
                            <path id="Path_198" data-name="Path 198" d="M514.869,801.418s-10.656,20.918-3.552,21.707,9.867.789,13.024-2.368a52.553,52.553,0,0,1,8.036-5.787,10.392,10.392,0,0,0,4.931-9.882c-.208-1.931-.93-3.522-2.706-3.67-4.736-.395-10.262-4.736-10.262-4.736Z" transform="translate(-370.58 -453.251)" fill="#2f2e41"/>
                            <circle id="Ellipse_30" data-name="Ellipse 30" cx="16.591" cy="16.591" r="16.591" transform="translate(116.435 80.259)" fill="#f1b2b2"/>
                            <path id="Path_199" data-name="Path 199" d="M457.723,260.308s-11.85,21.805-12.8,21.805,21.331,7.11,21.331,7.11,6.162-20.857,7.11-22.753Z" transform="translate(-335.363 -158.008)" fill="#ffb8b8"/>
                            <path id="Path_200" data-name="Path 200" d="M448.623,297.91s-23.681-13.024-26.049-12.63-27.627,22.5-27.233,31.574,3.552,24.075,3.552,24.075,1.184,41.836,3.552,42.23-.395,7.5.395,7.5,55.255,0,55.649-1.184S448.623,297.91,448.623,297.91Z" transform="translate(-308.084 -171.749)" fill="#aeaeae"/>
                            <path id="Path_201" data-name="Path 201" d="M533.613,521.892s7.5,22.891,1.184,22.1-9.078-19.734-9.078-19.734Z" transform="translate(-379.852 -301.995)" fill="#ffb8b8"/>
                            <path id="Path_202" data-name="Path 202" d="M483.205,310.264s-14.6,3.157-12.235,22.891,6.709,39.468,6.709,39.468l14.6,31.969,1.579,5.92,10.656-2.763-7.894-45.783s-2.763-48.94-6.315-50.518A15.285,15.285,0,0,0,483.205,310.264Z" transform="translate(-349.573 -185.483)" fill="#aeaeae"/>
                            <path id="Path_203" data-name="Path 203" d="M277.5,412.829l18.155,32.363-15.3-34.1Z" transform="translate(-152.748 -226.282)" opacity="0.1"/>
                            <path id="Path_204" data-name="Path 204" d="M488.969,218.832l.055-1.268,2.522.628a2.819,2.819,0,0,0-1.13-2.075l2.686-.15a28.986,28.986,0,0,0-19.387-11.981c-5.811-.842-12.281.377-16.266,4.689a19.6,19.6,0,0,0-4.011,7.466c-1.591,5-1.915,10.957,1.4,15.019,3.372,4.129,9.262,4.938,14.568,5.449a11.5,11.5,0,0,0,5.554-.377,13.362,13.362,0,0,0-.744-5.861,3.9,3.9,0,0,1-.4-1.867c.236-1.579,2.342-1.976,3.924-1.763s3.484.54,4.523-.672c.716-.834.674-2.05.769-3.145C483.3,219.942,488.942,219.457,488.969,218.832Z" transform="translate(-339.426 -126.868)" fill="#2f2e41"/>
                            <circle id="Ellipse_31" data-name="Ellipse 31" cx="19.331" cy="19.331" r="19.331" transform="translate(231.971 315.364)" fill="#f8d5ba"/>
                            <circle id="Ellipse_32" data-name="Ellipse 32" cx="19.331" cy="19.331" r="19.331" transform="translate(4.945 308.621)" fill="#f1d8b9"/>
                            <circle id="Ellipse_33" data-name="Ellipse 33" cx="13.936" cy="13.936" r="13.936" transform="translate(10.34 288.391)" fill="#f6d0a1"/>
                            <circle id="Ellipse_34" data-name="Ellipse 34" cx="9.89" cy="9.89" r="9.89" transform="translate(14.386 270.858)" fill="#efba78"/>
                        </svg>
                    </div>
                <?php }?>
            </section>
        </main>
    </div>
    <script defer src="../../script/organizer/index.js"></script>
</body>
</html>