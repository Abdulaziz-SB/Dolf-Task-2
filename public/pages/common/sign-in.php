<?php include_once('../../helpers/session_helper.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Cliparo | Sign-in</title>
</head>
<body>
    <main class='h-screen w-full flex flex-col items-center justify-center'>
        <div class='w-full lg:w-1/2'>
            <!-- title -->
            <div class='mb-10'>
                <a href="../user/index.php"><h1 class='text-7xl h-24 text-center'><span class='text-primary-500'>Clip</span>aro</h1></a>
                <h3 class='text-gray-600 text-center text-xl'>Welcome back</h3>
            </div>
            <!-- form -->
            <div class='w-full flex items-center justify-center'>
                <form action="../../classes/usercontr.class.php" method='POST' class='w-1/2'>
                    <?php flash('login');?>
                    <input type='hidden' name='type' value='login'>
                    <div class='mb-6'>
                        <h3 class='font-body mb-3 text-light text-gray-600'>Username or Email</h3>
                        <input type="text" name='name/email' required autocomplete='off' class='w-full h-14 rounded bg-gray-100 border border-gray-300'>
                    </div>
                    <div class='mb-6'>
                        <h3 class='font-body mb-3 text-light text-gray-600'>Password</h3>
                        <input type="password" name='pwd' required autocomplete='off' class='w-full h-14 rounded bg-gray-100 border border-gray-300'>
                    </div>
                    <!-- submit & sign up -->
                    <div class='w-full mt-9 flex flex-col justify-center items-center'>
                        <input type="submit" value='Sign in' class='w-full h-12 bg-primary-500 uppercase text-xl text-white font-body cursor-pointer mb-5'>
                        <p class='text-gray-500 text-center mt-4'>Don't have an account? <a href="./sign-up.php" class='underline text-gray-500 hover:text-gray-900'>sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>