<?php
    session_start();
?>
<!-- header nav -->
<header  class='h-auto'>
    <nav class='h-20 p-8 flex justify-between items-center'>
        <li class='list-none text-2xl ml-10'><a href="../user/index.php"><span class='text-primary-500'>Clip</span>aro</a></li>
        <ul class='flex justify-evenly items-center w-1/3'>
            <li class='text-gray-600'><a href="#" class='hover:text-gray-900'>Contact</a></li>
            <?php if(isset($_SESSION['usersId'])) :?>
                <li class='text-gray-600 relative user-tab'><?php echo $_SESSION['usersName']; ?></li>
                <div class='bg-white absolute rounded-md top-14 text-center w-28 p-2 hidden'><h4><a href="">my events</a></h4></div>
                <li class='text-gray-600'><a href="../../classes/usercontr.class.php?q=logout" class='hover:text-gray-900'>Logout</a></li>
            <?php else:?>
                <li class='text-gray-600'><a href="../common/sign-in.php" class='hover:text-gray-900'>Sign in</a></li>
                <a href="../common/sign-up.php"><li class='text-gray-600 border-2 rounded p-2 px-4 border-primary-200 hover:border-primary-500
                hover:text-gray-900'>
                Sign up</li></a>
            <?php endif;?>
        </ul>
    </nav>
</header>