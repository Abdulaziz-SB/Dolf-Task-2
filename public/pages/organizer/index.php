<!DOCTYPE html>
<html lang="en">
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
<body>
    <?php include('../../header.php'); ?>
    <div class='flex h-screen'>
        <!-- side bar -->
        <section class='hidden h-screen w-1/6 bg-blue-800 md:block'>
            <ul class='h-1/2 w-full flex flex-col justify-around items-start p-5 mt-10'>
               <a href="#" id='dashboardIcon' onclick='NavigateSideBar(event)'><li class='text-2xl text-blue-300 w-full h-auto p-2'><span class='mr-2'><i class="fas fa-home"></i></span>Dashboard</li></a>
               <a href="#" id='eventIcon' onclick='NavigateSideBar(event)'><li class='text-2xl text-white'><span class='mr-2'><i class="fas fa-star"></i></span>Events</li></a>
               <a href="#"><li class='text-2xl text-white'><span class='mr-2'><i class="fas fa-chart-line"></i></span>Activity</li></a>
               <a href="#"><li class='text-2xl text-white'><span class='mr-2'><i class="fas fa-user"></i></span>Profile</li></a>
            </ul>
        </section>
        <!-- main -->
        <main id='dashboardContainer' class='w-full h-full bg-gray-200 hidden'>
            <section class='w-full h-auto inline-block p-11'>
                <div>
                    <h1 class='h-20 w-full text-3xl text-gray-600 font-medium'>Aziiz Dashboard</h1>
                </div>
                <!-- summary -->
                <div class='w-full h-auto grid grid-cols-3 gap-10 mt-20'>
                    <div class='bg-white shadow-lg h-auto rounded-md p-5 flex justify-between hover:shadow-xl'>
                        <!-- attendance -->
                        <div class='inline-block'><h2 class='text-3xl'>72K</h2><h2 class='text-xl font-light text-gray-600 mt-3'>Attended your event</h2></div>
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
                        <div class='inline-block'><h2 class='text-3xl'>23</h2><h2 class='text-xl font-light text-gray-600 mt-3'>Events</h2></div>
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
                        <div class='inline-block'><h2 class='text-3xl'>122K</h2><h2 class='text-xl font-light text-gray-600 mt-3'>Followers</h2></div>
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

            <!-- events information -->
            <section class='px-11'>
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
        </main>
        <!-- Event container -->
        <main id='eventContainer' class='w-full h-full bg-gray-200 px-11'>
            <section class='w-full mt-20 flex justify-around'>
                <div class='w-4/12 md:w-2/12 flex justify-between'>
                    <div class='w-full bg-white shadow-lg h-auto rounded-md p-5 flex justify-between hover:shadow-xl'>
                        <!-- attendance -->
                        <div class='inline-block'><h2 class='text-3xl'>64</h2><h2 class='text-xl font-light text-gray-600 mt-3'>Total Events</h2></div>
                        <div class='inline-block'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="71.216" viewBox="0 0 52 71.216">
                                <g id="event-group" data-name="Group 16" transform="translate(-374.045 -21)">
                                    <path id="Path_124" data-name="Path 124" d="M26,0A26,26,0,0,1,52,26c0,14.359-11.641,45.216-26,45.216S0,40.359,0,26A26,26,0,0,1,26,0Z" transform="translate(374.045 21)" fill="#ff5ef4"/>
                                    <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(382.045 29)" fill="#ffd6fc"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class='rounded-md bg-white p-5 w-4/12 flex items-center justify-center md:w-2/12 cursor-pointer hover:shadow-lg'>
                    <h2 class='text-2xl inline-block min-w-min mr-4'>Create event</h2>
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24.438" height="25.63" viewBox="0 0 24.438 25.63">
                        <path id="Icon_ionic-md-add" data-name="Icon ionic-md-add" d="M31.188,21.273H20.6V32.38H17.34V21.273H6.75V17.856H17.34V6.75H20.6V17.856h10.59Z" transform="translate(-6.75 -6.75)" fill="#ffb217"/>
                    </svg>
                    </span>
                </div>
            </section>
            <!-- table -->
            <section class='w-full h-auto mt-20'>
                <table class='table-auto w-full'>
                    <thead class='bg-gray-100 text-xl text-gray-700'>
                        <tr>
                            <th class='font-normal'>#</th>
                            <th class='font-normal'>Event</th>
                            <th class='font-normal'>Date</th>
                            <th class='font-normal'>Registered</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class='bg-white text-center text-xl'>
                        <tr>
                            <td class='p-3 text-gray-500'>1</td>
                            <td class='p-3'>Basketball</td>
                            <td class='p-3'>9:00pm - 11:00pm 21/9/2021 </td>
                            <td class='p-3'>123</td>
                            <td class='p-3'><span class='cursor-pointer'><svg xmlns="http://www.w3.org/2000/svg" width="43.869" height="6.75" viewBox="0 0 43.869 6.75">
                                <path id="Icon_awesome-minus" data-name="Icon awesome-minus" d="M40.736,14.625H3.134C1.4,14.625,0,15.633,0,16.875v2.25c0,1.242,1.4,2.25,3.134,2.25h37.6c1.73,0,3.134-1.008,3.134-2.25v-2.25C43.869,15.633,42.466,14.625,40.736,14.625Z" transform="translate(0 -14.625)" fill="#f64747"/>
                                </svg></span>
                            </td>
                            <td class='p-3'><span class='cursor-pointer'><svg xmlns="http://www.w3.org/2000/svg" width="31.001" height="31" viewBox="0 0 31.001 31">
                                <path id="Icon_awesome-pen" data-name="Icon awesome-pen" d="M17.6,5.646,25.355,13.4,8.523,30.229l-6.911.763a1.453,1.453,0,0,1-1.6-1.605l.769-6.916L17.6,5.646ZM30.149,4.492,26.51.852a2.908,2.908,0,0,0-4.112,0L18.974,4.276l7.751,7.751L30.149,8.6a2.908,2.908,0,0,0,0-4.112Z" transform="translate(0.001 -0.001)" fill="#66bbdb"/>
                                </svg></span>
                            </td>
                        </tr>
                    </tbody>
                    <tbody class='bg-white text-center text-xl'>
                        <tr>
                            <td class='p-3 text-gray-500'>2</td>
                            <td class='p-3'>Football</td>
                            <td class='p-3'>9:00pm - 11:00pm 21/9/2021 </td>
                            <td class='p-3'>123</td>
                            <td class='p-3'><span class='cursor-pointer'><svg xmlns="http://www.w3.org/2000/svg" width="43.869" height="6.75" viewBox="0 0 43.869 6.75">
                                <path id="Icon_awesome-minus" data-name="Icon awesome-minus" d="M40.736,14.625H3.134C1.4,14.625,0,15.633,0,16.875v2.25c0,1.242,1.4,2.25,3.134,2.25h37.6c1.73,0,3.134-1.008,3.134-2.25v-2.25C43.869,15.633,42.466,14.625,40.736,14.625Z" transform="translate(0 -14.625)" fill="#f64747"/>
                                </svg></span>
                            </td>
                            <td class='p-3'><span class='cursor-pointer'><svg xmlns="http://www.w3.org/2000/svg" width="31.001" height="31" viewBox="0 0 31.001 31">
                                <path id="Icon_awesome-pen" data-name="Icon awesome-pen" d="M17.6,5.646,25.355,13.4,8.523,30.229l-6.911.763a1.453,1.453,0,0,1-1.6-1.605l.769-6.916L17.6,5.646ZM30.149,4.492,26.51.852a2.908,2.908,0,0,0-4.112,0L18.974,4.276l7.751,7.751L30.149,8.6a2.908,2.908,0,0,0,0-4.112Z" transform="translate(0.001 -0.001)" fill="#66bbdb"/>
                                </svg></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script defer src="../../script/organizer/index.js"></script>
</body>
</html>