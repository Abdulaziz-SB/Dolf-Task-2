<?php 
include '../../includes/autoload.inc.php';
$eventObj = new EventContr;
$result = $eventObj->ShowAllEvents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/custom.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <title>Cliparo</title>
</head>
<body class='h-full font-body bg-gray-100'>
    <?php include('../common/header.php');
    if (!(session_status() == PHP_SESSION_NONE)) {
        $reserved = array();
        if(isset($_SESSION['usersId'])){
            $reservedResult = $eventObj->ReservedEvents($_SESSION['usersId']);
            if($reservedResult != false){
                while($rows = $reservedResult->fetch_assoc()){
                    array_push($reserved, $rows['event_id']);
                }
            }
        }
    }?>
    <main class='h-full w-full bg-gray-100 mb-24'>
        <!-- img -->
        <div class='bask bg-gray-700'>
            <!-- img 656px -->
            <div class='h-full w-full'>
                <img src="../../res/img/basket.jpg" alt="couldn't load image" class='h-full w-full object-cover'>
            </div>
        </div>
        <!-- event section -->
        <section class='h-full p-4 md:p-28'>
            <div class='mt-16 mb-10'>
                <h1 class='text-4xl text-gray-700 font-light'>Events</h1>
            </div>
            <!-- Cards -->
            <div class='grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-10 mb-6'>
                <?php while($row = $result->fetch_assoc()){?>
                    <a href="./event-detail.php?o=<?php echo $row['user_id']?>&e=<?php echo $row['id']?>" class='<?php if(in_array($row['id'], $reserved) || $row['available'] == '0'){ ?> pointer-events-none <?php }else{?> pointer-events-auto <?php }?>'>
                    <div class='card w-full h-auto hover:shadow-lg cursor-pointer relative'>
                            <?php if(in_array($row['id'], $reserved) && isset($_SESSION['usersId'])){ ?><div class='w-full h-full absolute opacity-40 bg-green-500'></div><?php 
                            }elseif($row['available'] == 0){ ?><div class='w-full h-full absolute opacity-40 bg-red-500'></div><?php }?>
                            <img src="<?php echo $row['img'] ?>" alt="couldn't load image" class='w-full object-cover'>
                            <div class='m-4'>
                                <h2 class='mb-2 font-medium'><?php echo $row['name'];?></h2>
                                <h2 class='mb-2 font-medium'><?php if(in_array($row['id'], $reserved) && isset($_SESSION['usersId'])){ ?>Registered<?php }else{ echo $row['available'];?> available<?php }?></h2>
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
        </section>
        <!-- <div class='w-full h-80'>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FBC8BA" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,122.7C384,139,480,181,576,192C672,203,768,181,864,165.3C960,149,1056,139,1152,133.3C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div> -->
        <!-- view all events section -->
        <section class='h-80 p-4 md:pl-28 md:pt-10 bg-primary-100 flex justify-around items-center'>
            <div>
                <h1 class='text-3xl font-medium mb-7'>View all Events</h1>
                <p class='text-2xl text-gray-600 font-light mb-6'>Search your favourite event</p>
                <a href="./view-all-events.php"><button class='bg-primary-400 rounded-full h-14 w-64 text-xl hover:bg-primaryHover-200'>View</button></a>
            </div>
            <!-- seperater svg holder -->
            <div class='mr-32 hidden md:block'>
            <svg xmlns="http://www.w3.org/2000/svg" width="376.514" height="316.321" viewBox="0 0 376.514 316.321">
                <g id="basket-illustration" transform="translate(68.982 48.348)">
                    <path id="blob" d="M322.54,40.427c18.7,32.773-8.544,91.007-41.4,134.011-32.561,43-70.736,70.773-112.378,73.326-41.942,2.554-87.648-20.4-123.064-64.83S-14.548,72.606,8.69,37.279C31.927,2.246,102.927-1.919,170.9-.493S303.536,7.949,322.54,40.427Z" transform="translate(-12.854 -47.557) rotate(13)" fill="rgba(188,92,65,0.21)"/>
                    <path id="Path_90" data-name="Path 90" d="M946.424,777.613v.241c0,.063,0,.129-.005.193a14.893,14.893,0,0,1-3.266,9.034c-.1.134-.213.264-.325.393-.167.2-.34.388-.518.576-.015.015-.031.033-.048.048l-.008.008-.061.063q-.468.483-.982.926c-.068.058-.14.119-.213.178a14.919,14.919,0,0,1-9.422,3.441c-.025,0-.053,0-.079,0h-.089a.754.754,0,0,1-.076,0c-.089,0-.175,0-.264-.005a14.9,14.9,0,0,1-9.366-3.6c-.071-.058-.142-.119-.211-.183-.272-.239-.533-.49-.784-.749l-.061-.063-.008-.008c-.018-.015-.033-.033-.048-.048-.213-.223-.419-.454-.617-.69q-.164-.194-.32-.4a14.874,14.874,0,0,1-3.18-8.925c-.005-.061-.005-.124-.005-.188v-.236c0-.028,0-.056,0-.084a14.893,14.893,0,0,1,3.124-8.963q.156-.2.32-.4c.2-.244.411-.48.627-.711.015-.018.03-.033.048-.051,0,0,0-.005.005-.008.02-.02.041-.043.063-.063q.423-.438.881-.843c.069-.063.14-.124.211-.183a14.916,14.916,0,0,1,9.567-3.56c.025,0,.053,0,.079,0h.165a14.922,14.922,0,0,1,9.389,3.4l.213.18c.37.315.726.65,1.063,1l.061.063.005.005c.018.015.036.036.051.051.188.2.368.4.543.612.112.129.218.259.325.393a14.893,14.893,0,0,1,3.21,9.075.7.7,0,0,1,0,.074Z" transform="translate(-736.178 -598.46)" fill="#e28215" stroke="#707070" stroke-width="1"/>
                    <rect id="Rectangle_48" data-name="Rectangle 48" width="0.508" height="29.944" transform="translate(195.389 164.356)" fill="#fff"/>
                    <rect id="Rectangle_49" data-name="Rectangle 49" width="30.073" height="0.508" transform="translate(180.175 179.77)" fill="#fff"/>
                    <path id="Path_91" data-name="Path 91" d="M934.167,793.479a11.655,11.655,0,0,0-5.057-9.359q-.164.194-.32.4a11.156,11.156,0,0,1,4.872,8.963c0,.084,0,.167,0,.254s0,.17,0,.254a11.167,11.167,0,0,1-4.814,8.925q.156.2.32.4a11.663,11.663,0,0,0,5-9.321c.005-.084.005-.17.005-.254S934.172,793.563,934.167,793.479Z" transform="translate(-744.257 -614.134)" fill="#fff"/>
                    <path id="Path_92" data-name="Path 92" d="M1000.51,793.665c0-.084,0-.167,0-.254s0-.17,0-.254a11.165,11.165,0,0,1,5.035-9.075c-.107-.134-.213-.264-.325-.393a11.664,11.664,0,0,0-5.215,9.468c-.005.084-.005.17-.005.254s0,.17.005.254a11.66,11.66,0,0,0,5.156,9.427c.112-.129.221-.259.325-.393A11.161,11.161,0,0,1,1000.51,793.665Z" transform="translate(-798.791 -613.818)" fill="#fff"/>
                    <path id="Path_93" data-name="Path 93" d="M320.449,79.738a62.76,62.76,0,0,1-17.3,43.381c-.076.08-.153.161-.23.241a62.98,62.98,0,0,1-90.867.035c-.077-.08-.154-.16-.23-.241a62.979,62.979,0,0,1-.2-86.568c.074-.082.151-.162.229-.242a62.98,62.98,0,0,1,91.209-.035c.077.08.154.16.229.242A62.754,62.754,0,0,1,320.449,79.738Z" transform="translate(-110.191 -14.92)" fill="rgba(243,199,131,0.43)"/>
                    <rect id="Rectangle_51" data-name="Rectangle 51" width="125.96" height="0.303" transform="translate(84.298 53.853)" fill="#8a8080"/>
                    <rect id="Rectangle_52" data-name="Rectangle 52" width="0.303" height="125.96" transform="translate(148.193 1.862)" fill="#645d5d"/>
                    <path id="Path_94" data-name="Path 94" d="M325.942,168.649a54.068,54.068,0,0,0-18.074-22.661c-.077.08-.154.161-.229.242a53.394,53.394,0,0,1,.2,86.568c.076.08.153.16.23.241a53.833,53.833,0,0,0,17.87-64.39Z" transform="translate(-202.512 -128.438)" fill="#8a8080"/>
                    <path id="Path_95" data-name="Path 95" d="M764.907,189.354A53.4,53.4,0,0,1,787.106,146c-.074-.082-.151-.162-.229-.242a53.792,53.792,0,0,0-.138,87.051c.077-.08.154-.161.23-.241A53.406,53.406,0,0,1,764.907,189.354Z" transform="translate(-595.853 -124.915)" fill="#8a8080"/>
                    <path id="Path_96" data-name="Path 96" d="M388.887,704.422l-.7,14.063,7.383,1.406,2.11-13.36Z" transform="translate(-302.74 -548.514)" fill="#9d616a"/>
                    <path id="Path_97" data-name="Path 97" d="M535.046,720.366l1.758,11.6h6.68l-1.406-12.305Z" transform="translate(-415.18 -560.058)" fill="#9d616a"/>
                    <path id="Path_98" data-name="Path 98" d="M506.476,614.521l-1.406,16.173-1.406,13.712a11.982,11.982,0,0,1,10.2,1.055s3.164-.7,2.461-14.415l3.164-14.415Z" transform="translate(-419.077 -483.933)" fill="#efefef"/>
                    <path id="Path_99" data-name="Path 99" d="M626.972,629.1s2.11,12.657,3.164,13.712c0,0,1.741,11.319,2.587,14.18a2.551,2.551,0,0,0,.226.587c.7,1.055,8.438,3.516,8.79-.7s1.406-11.251-2.11-16.525l-2.109-13.36Z" transform="translate(-513.534 -493.663)" fill="#efefef"/>
                    <path id="Path_100" data-name="Path 100" d="M543.246,498.279c-.352,3.867-19.689,3.164-23.2,3.164a3.022,3.022,0,0,1-3.249-2.092,50.263,50.263,0,0,1-2.11-9.946,18.33,18.33,0,0,1-2.9,8.635c-1.22,1.645-3.238,1.318-5.457.942-3.685-.626-11.008-2.9-13.009-2.461-3.164.7-6.972.773-7.032,0a9.058,9.058,0,0,1,.007-1.269c.464-7.271,7.2-26.981,7.2-28.44,0-1.758,3.164-9.141,3.164-9.141l32.346-3.868s12.812,34.561,14.573,43.069C543.731,497.607,543.274,497.973,543.246,498.279Z" transform="translate(-407.269 -360.616)" fill="#e53131"/>
                    <path id="Path_101" data-name="Path 101" d="M512.8,770.069l-9.141-1.758.879,14.591,7.208,5.1S511.046,773.937,512.8,770.069Z" transform="translate(-418.856 -601.965)" fill="#efefef"/>
                    <path id="Path_102" data-name="Path 102" d="M661.734,771.082s-4.571,2.813-8.438,0l3.164,13.009,5.274-.7S664.2,775.653,661.734,771.082Z" transform="translate(-533.474 -603.617)" fill="#efefef"/>
                    <path id="Path_103" data-name="Path 103" d="M668.993,814.032s-7.383.352-7.383,1.055v11.6c0,1.055,1.406,2.461,1.055,3.164s2.11,2.461,7.735,1.406,3.516-4.571,3.516-4.571S668.29,816.845,668.993,814.032Z" transform="translate(-539.97 -637.105)" fill="#2f2e41"/>
                    <path id="Path_104" data-name="Path 104" d="M490.458,814.725s8.438.176,8.438.879v11.6c0,1.055-1.406,2.461-1.055,3.164s-2.11,2.461-7.735,1.406-3.516-4.571-3.516-4.571S491.161,817.538,490.458,814.725Z" transform="translate(-405.597 -637.626)" fill="#2f2e41"/>
                    <path id="Path_105" data-name="Path 105" d="M633.531,624.14c-.352,3.867-20.744,4.219-24.259,4.219-1.111,0-2.011-1.4-2.721-3.322,3.773-.749,20-3.8,26.788-2.479A6.455,6.455,0,0,1,633.531,624.14Z" transform="translate(-498.357 -488.346)" fill="#e7e5fb"/>
                    <path id="Path_106" data-name="Path 106" d="M511.785,619.735a5.092,5.092,0,0,1-5.105,2.349c-3.685-.626-11.36-2.2-13.36-1.758-3.164.7-6.972-1.336-7.032-2.11a9.052,9.052,0,0,1,.007-1.269C493.7,616.746,506.8,616.834,511.785,619.735Z" transform="translate(-406.075 -484.173)" fill="#e7e5fb"/>
                    <path id="Path_107" data-name="Path 107" d="M330.8,285.165s-6.329-2.11-11.954,4.219l-1.055,2.11s-8.086,2.461-10.548,4.219a43.329,43.329,0,0,0-16.525,0l-9.141-2.109s-17.579-12.305-19.337-4.571,16.525,10.548,16.525,10.548L293.88,303.8s11.6,2.813,16.173.7c0,0,13.009-.7,15.47-5.625l5.274,2.461Z" transform="translate(-235.302 -228.654)" fill="#9d616a"/>
                    <path id="Path_108" data-name="Path 108" d="M599.015,260.709s13.009-1.406,17.931,5.274l10.2,2.813s11.251-2.11,15.47-1.055l9.141-2.461s8.79-14.063,13.712-10.2-11.6,16.173-11.6,16.173l-22.15,7.383s-17.228,1.406-20.744-4.922l-3.867,8.79-14.767-3.516Z" transform="translate(-489.624 -205.428)" fill="#9d616a"/>
                    <circle id="Ellipse_15" data-name="Ellipse 15" cx="9.493" cy="9.493" r="9.493" transform="translate(91.276 36.325)" fill="#9d616a"/>
                    <path id="Path_109" data-name="Path 109" d="M550.77,249.883v7.735l3.516,12.306,10.548-12.306s-2.813-8.438-2.813-9.844S550.77,249.883,550.77,249.883Z" transform="translate(-455.108 -199.85)" fill="#9d616a"/>
                    <path id="Path_110" data-name="Path 110" d="M555.024,322a1.755,1.755,0,0,1-1.772,1.385c-3.2.236-8.6.78-12.116,1.955-5.274,1.758-21.1,1.758-21.1,1.758l-1.027-31.847.5-2.433c-.352-2.813,2.461-14.063,2.461-14.063l2.053-1.515,1.923-.415.594.524c0,4.683,4.571,9.141,4.571,9.141a17.6,17.6,0,0,0,3.515-2.244,21.641,21.641,0,0,0,5.978-7.952l1.979-.292,2.071.232,1.874.211-.651.552-.352.7c-.021.042.017-.042,0,0-5.119,10.861,1.062,15.772,4.922,17.931,1.6.9,1.758,1.758,1.758,1.758s.039-.35,0,1.137c-.116,4.813.415,15.6,1.758,18.552C555.727,320.946,555.024,322,555.024,322Z" transform="translate(-431.529 -220.692)" fill="#e53131"/>
                    <path id="Path_111" data-name="Path 111" d="M530.68,186.6a23.653,23.653,0,0,1,.8-2.3c.4-.92,0-3.681.4-3.681h1.6l2-1.84,1.2.92,1.6-.92,2,.92,2-.92,3.206,2.3.8-.46.8,1.38h.4l1.6,2.3h.8v2.3h.8v5.981l-1.055,4.128-.352-2.025a.128.128,0,0,0-.235-.069l-.763,1.187-.49-1.873a12.521,12.521,0,0,0-4.682-7c-2.966-2.152-7.254-3.177-11.663,2.9Z" transform="translate(-439.927 -146.691)" fill="#2f2e41"/>
                    <path id="Path_112" data-name="Path 112" d="M523.844,280.88c-.668,4.061-2.686,15.29-5.014,18.012l-.028-.851c-.352-2.813,2.109-16.525,2.109-16.525Z" transform="translate(-430.291 -225.518)" fill="#cacaca"/>
                    <path id="Path_113" data-name="Path 113" d="M562.974,275.186c-1.765,3.333-6.821,11.936-11.648,11.367-4.659-.548-5.045-7.5-4.989-10.544l1.122-.243c0,4.683,4.219,8.677,4.219,8.677a17.857,17.857,0,0,0,8.807-9.535Z" transform="translate(-451.8 -220.691)" fill="#cacaca"/>
                    <path id="Path_114" data-name="Path 114" d="M625.942,296.841s-.04.942-.08,2.429a15.572,15.572,0,0,1-2.992-.45c-11.216-2.865-7.937-17.615-6.725-21.9l1.935.211h0l.171.155c-5.287,10.861.744,16.141,4.731,18.3A15.426,15.426,0,0,0,625.942,296.841Z" transform="translate(-504.001 -222.612)" fill="#e7e5fb"/>
                    <path id="Path_115" data-name="Path 115" d="M650.019,373.475s-1.051.031-2.651.126a57.1,57.1,0,0,1-1.919-7.262c-.464-2.638-.316-9.126-.162-13.236.042-1.076.081-1.992.112-2.629a16.594,16.594,0,0,0,2.862,1.022s-.039.765-.077,1.972c-.116,3.908-.211,12.471,1.132,14.869C651.074,371.477,650.019,373.475,650.019,373.475Z" transform="translate(-526.699 -276.126)" fill="#e6e2e3"/>
                    <path id="Path_117" data-name="Path 117" d="M525.489,466.588a77.914,77.914,0,0,1,11.419.508c8.12.761,21.57-4.314,21.57-4.314" transform="translate(-436.424 -365.308)" fill="#cacaca"/>
                    <path id="Path_118" data-name="Path 118" d="M262.424,210.613v.241c0,.063,0,.129-.005.193a14.893,14.893,0,0,1-3.266,9.034c-.1.135-.213.264-.325.393-.168.2-.34.388-.518.576-.015.015-.031.033-.048.048l-.008.008-.061.063q-.468.483-.982.926c-.069.058-.14.119-.213.178a14.919,14.919,0,0,1-9.422,3.441c-.025,0-.053,0-.079,0h-.089c-.025,0-.051,0-.076,0-.089,0-.175,0-.264-.005a14.9,14.9,0,0,1-9.366-3.6c-.071-.058-.142-.119-.211-.183-.272-.239-.533-.49-.784-.749l-.061-.063-.008-.008c-.018-.015-.033-.033-.048-.048-.213-.223-.419-.454-.617-.69q-.164-.194-.32-.4a14.874,14.874,0,0,1-3.18-8.925c-.005-.061-.005-.124-.005-.188v-.236c0-.028,0-.056,0-.084a14.894,14.894,0,0,1,3.124-8.963q.156-.2.32-.4c.2-.244.411-.48.627-.711.015-.018.03-.033.048-.051,0,0,0-.005.005-.008.02-.02.041-.043.063-.063q.423-.438.881-.842c.069-.063.14-.124.211-.183a14.916,14.916,0,0,1,9.567-3.56c.025,0,.053,0,.079,0h.165a14.922,14.922,0,0,1,9.389,3.4l.213.18c.371.315.726.65,1.063,1l.061.063.005.005c.018.015.036.036.051.051.188.2.368.4.543.612.112.129.218.259.325.393a14.893,14.893,0,0,1,3.21,9.075A.714.714,0,0,1,262.424,210.613Z" transform="translate(-211.574 -160.156)" fill="#e28215"/>
                    <rect id="Rectangle_53" data-name="Rectangle 53" width="0.508" height="29.944" transform="translate(34.972 35.659)" fill="#fff"/>
                    <rect id="Rectangle_54" data-name="Rectangle 54" width="30.073" height="0.508" transform="translate(20.784 49.787)" fill="#fff"/>
                    <path id="Path_119" data-name="Path 119" d="M250.167,226.479a11.655,11.655,0,0,0-5.057-9.359q-.164.194-.32.4a11.156,11.156,0,0,1,4.872,8.963c0,.084,0,.167,0,.254s0,.17,0,.254a11.167,11.167,0,0,1-4.814,8.925q.156.2.32.4a11.663,11.663,0,0,0,5-9.321c.005-.084.005-.17.005-.254S250.172,226.563,250.167,226.479Z" transform="translate(-220.515 -176.327)" fill="#fff"/>
                    <path id="Path_120" data-name="Path 120" d="M316.51,226.665c0-.084,0-.167,0-.254s0-.17,0-.254a11.165,11.165,0,0,1,5.035-9.075c-.107-.134-.213-.264-.325-.393a11.664,11.664,0,0,0-5.215,9.468c-.005.084-.005.17-.005.254s0,.17.005.254a11.66,11.66,0,0,0,5.156,9.427c.112-.129.221-.259.325-.393A11.161,11.161,0,0,1,316.51,226.665Z" transform="translate(-275.044 -176.002)" fill="#fff"/>
                    <text id="clip" transform="translate(102.403 80.91) rotate(-11)" fill="#fff" font-size="10" font-family="SnapITC-Regular, Snap ITC"><tspan x="-10.212" y="0">clip</tspan></text>
                </g>
            </svg>
            </div>
        </section>
        <!-- more events -->
        <section class='h-full p-28'>
            <div class='mt-5 mb-10'>
                <h1 class='text-4xl text-gray-700 font-light'>More events</h1>
            </div>
            <!-- Cards -->
            <div class='grid grid-cols-4 gap-10 mb-6'>
                <div class='card w-full h-auto hover:shadow-lg cursor-pointer'>
                    <img src="../../res/img/ball.jpg" alt="couldn't load image" class='w-full object-cover'>
                    <div class='m-4'>
                        <h2 class='mb-2 font-medium'>Football</h2>
                        <h2 class='mb-2 font-medium'>Roberto luis</h2>
                        <h2 class='mb-2 font-medium'>56 registered</h2>
                        <h2 class='font-light'>9:00pm - 10:00pm 21/9/2021</h2>
                    </div>
                    <div class='bg-primary-300 text-gray-700 text-xs uppercase font-bold rounded-full p-2 absolute top-0 ml-2 mt-2'>
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span>75 SR</span>
                    </div>
                </div>
                <div class='card w-full h-auto hover:shadow-lg cursor-pointer'>
                    <img src="../../res/img/basket.jpg" alt="couldn't load image" class='w-full object-cover'>
                    <div class='m-4'>
                        <h2 class='mb-2 font-medium'>Basketball</h2>
                        <h2 class='mb-2 font-medium'>Luis</h2>
                        <h2 class='mb-2 font-medium'>36 registered</h2>
                        <h2 class='font-light'>10:00pm - 12:00pm 21/9/2021</h2>
                    </div>
                    <div class='bg-primary-300 text-gray-700 text-xs uppercase font-bold rounded-full p-2 absolute top-0 ml-2 mt-2'>
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span>50 SR</span>
                    </div>
                </div>
                <div class='card w-full h-auto hover:shadow-lg cursor-pointer'>
                    <img src="../../res/img/ba.jpg" alt="couldn't load image" class='w-full object-cover'>
                    <div class='m-4'>
                        <h2 class='mb-2 font-medium'>Football</h2>
                        <h2 class='mb-2 font-medium'>Roberto sanchez</h2>
                        <h2 class='mb-2 font-medium'>46 registered</h2>
                        <h2 class='font-light'>9:00pm - 10:00pm 27/9/2021</h2>
                    </div>
                    <div class='bg-primary-300 text-gray-700 text-xs uppercase font-bold rounded-full p-2 absolute top-0 ml-2 mt-2'>
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span>125 SR</span>
                    </div>
                </div>
                <div class='card w-full h-auto hover:shadow-lg cursor-pointer'>
                    <img src="../../res/img/football-cover.jpg" alt="couldn't load image" class='w-full object-cover'>
                    <div class='m-4'>
                        <h2 class='mb-2 font-medium'>Football</h2>
                        <h2 class='mb-2 font-medium'>luis silva</h2>
                        <h2 class='mb-2 font-medium'>90 registered</h2>
                        <h2 class='font-light'>7:00pm - 9:00pm 12/9/2021</h2>
                    </div>
                    <div class='bg-primary-300 text-gray-700 text-xs uppercase font-bold rounded-full p-2 absolute top-0 ml-2 mt-2'>
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span>25 SR</span>
                    </div>
                </div>
            </div>
        </section>
        <?php if(!isset($_SESSION['usersId'])):?>
        <div class='h-72 w-full bg-primary-300 flex flex-col items-center justify-center mb-20'>
            <h1 class='text-gray-600 text-2xl font-normal p-4 mb-10 md:p-0'>Want to stay athletic, healthy, join our events that are monitored by professional trainers</h1>
            <a href="../common/sign-in.php" class='inline-block h-auto w-5/6 text-center md:w-full'><button class='bg-white tracking-wider rounded-full h-14 w-full md:w-2/6 text-3xl font-medium hover:border-gray-400 text-gray-400 border-2 border-primary-400'>Get Started</button></a>
        </div>
        <?php endif; ?>
    </main>
    <?php include_once('../common/footer.php')?>
</body>
</html>