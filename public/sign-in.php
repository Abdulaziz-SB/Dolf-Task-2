<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Cliparo</title>
</head>
<body>
    <main class='h-screen w-full flex flex-col items-center justify-center'>
        <div class='w-full lg:w-1/2'>
            <!-- title -->
            <div class='mb-10'>
                <h1 class='text-7xl h-24 text-center'><span class='text-primary-500'>Clip</span>aro</h1>
                <h3 class='text-gray-600 text-center text-xl'>Welcome back</h3>
            </div>
            <!-- form -->
            <div class='w-full flex items-center justify-center'>
                <form action="#" class='w-1/2'>
                    <div class='mb-6'>
                        <h3 class='font-body mb-3 text-light text-gray-600'>Email</h3>
                        <input type="text" name='email' class='w-full h-14 rounded bg-gray-100 border border-gray-300'>
                    </div>
                    <div class='mb-6'>
                        <h3 class='font-body mb-3 text-light text-gray-600'>Password</h3>
                        <input type="text" name='pwd' class='w-full h-14 rounded bg-gray-100 border border-gray-300'>
                    </div>
                </form>
            </div>
            <!-- submit & sign up -->
            <div class='w-full mt-9 flex flex-col justify-center items-center'>
                <input type="submit" value='Sign in' class='w-1/2 h-12 bg-primary-500 uppercase text-xl text-white font-body cursor-pointer mb-5'>
                <p class='text-gray-500 text-center mt-4'>Don't have an account? <a href="./sign-up.php" class='underline text-gray-500 hover:text-gray-900'>sign up</a></p>
            </div>
        </div>
    </main>
    <!-- <div class='mt-8 grid lg:grid-cols-3 gap-10 mb-12'>
            Cards go here
            <div class='card hover:shadow-lg'>
                <img src="./res/img/ball.jpg" alt="" class='h-32 w-full sm:h-48 object-cover'>
                <div class='m-4'>
                    <span class='font-bold'>5 Bean chilli</span>
                    <span class='block text-gray-500 text-sm'>Recipe by mario</span>
                </div>
                <div class='text-gray-500 text-xs uppercase font-bold rounded-full p-2 absolute top-0 ml-2 mt-2'>
                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>25 min</span>
                </div>
        </div> -->
</body>
</html>