<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<!-- header nav -->
<header  class='h-auto bg-white z-50'>
    <nav class='h-20 p-8 flex justify-between items-center'>
        <li class='list-none text-2xl md:ml-10'><span id='menuBarId' class='mr-5 inline-block md:hidden' onclick=ShowMenuBar()><svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
            </span><a href="../user/index.php"><span class='text-primary-500'>Clip</span>aro</a></li>
        <ul class='justify-evenly items-center w-1/3 hidden md:flex'>
            <?php if(isset($_SESSION['usersType'])){ if($_SESSION['usersType'] == '1'):?>
                <li class='text-gray-600'><a href="#" class='hover:text-gray-900 hidden'>Dashboard</a></li>
                <li class='text-gray-600'><a href="#" class='hover:text-gray-900 hidden'>Events</a></li>
            <?php else:?>
                <li class='text-gray-600'><a href="../user/my-event.php" class='hover:text-primary-500'>My events</a></li>
            <?php endif; }?>
            <?php if(isset($_SESSION['usersId'])) :?>
                <li class='text-gray-600 relative user-tab hidden lg:block'><?php echo $_SESSION['usersName']; ?></li>
                <div class='bg-white absolute rounded-md top-14 text-center w-28 p-2 hidden'><h4><a href="">my events</a></h4></div>
                <li class='text-gray-600'><a href="../../classes/usercontr.class.php?q=logout" class='hover:text-primary-500 hidden lg:block'>Logout</a></li>
            <?php else:?>
                <li class='text-gray-600'><a href="../common/sign-in.php" class='hover:text-primary-500'>Sign in</a></li>
                <a href="../common/sign-up.php"><li class='text-gray-600 border-2 rounded p-2 px-4 border-primary-200 hover:border-primary-500
                hover:text-gray-900'>
                Sign up</li></a>
            <?php endif;?>
        </ul>
    </nav>
    <div id='menuContentContainer' class='z-50 w-full h-7 hidden justify-around items-center bg-white absolute md:hidden'>
        <?php if(isset($_SESSION['usersId'])){ if($_SESSION['usersType'] == '0'){?>
        <a href="../user/my-event.php" class='hover:text-primary-500'><h2 class='text-black font-medium'>my events</h2></a>
        <?php }?>
        <h2 class='text-black font-medium'><?php echo $_SESSION['usersName']; ?></h2>
        <a href="../../classes/usercontr.class.php?q=logout"><h2 class='text-black font-medium'>logout</h2></a>
        <?php }else{?>
            <h2 class='text-gray-600 font-medium'><a href="../common/sign-in.php" class='text-gray-600'>Sign in</a></h2>
                <a href="../common/sign-up.php"><h2 class='text-gray-600 font-medium hover:text-gray-900'>Sign up</h2></a>
            <?php }?>
    </div>
</header>
<script defer src="../../script/common/header.js"></script>