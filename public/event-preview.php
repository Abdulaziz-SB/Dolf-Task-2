<section id='eventOverviewContainer' class='w-2/3 h-2/3 bg-white shadow-lg absolute top-40 right-64 z-30 rounded'>
            <!-- Overview inline-block --> 
            <div class='w-full h-full hidden'>
                <div class='flex w-full'>
                    <img src="./res/img/ba.jpg" alt="couldn't load image" class='w-5/12 h-3/6 object-cover rounded-tl'>
                    <div class='w-full'>
                        <h1 class='text-4xl text-center w-11/12 mt-2 inline-block'><span class='text-primary-500'>Clip</span>aro</h1>
                        <span><i id='closeOverview' class="far fa-times-circle transform scale-150 text-gray-600 hover:text-gray-900 cursor-pointer" onclick='CloseOverview()'></i></span>
                        <div class='w-full h-1 m-auto bg-gray-200 mt-6'></div>
                        <ul class='mt-10 ml-10'>
                            <li class='text-2xl mb-3 text-gray-600'><span class='font-semibold'>Event: </span> Football</li>
                            <li class='text-2xl mb-3 text-gray-600'><span class='font-semibold'>Organizer: </span> Ahmed jaber</li>
                            <li class='text-2xl mb-3 text-gray-600'><span class='font-semibold'>Date: </span> 9:00pm - 11:00pm 21/9/2021</li>
                            <li class='text-2xl text-gray-600'><span class='font-semibold'>Price: </span> 75 SR</li>
                        </ul>
                    </div>
                </div>
                <!-- seperator -->
                <div class='w-full h-1 mt-14 m-auto bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200'></div>
                <!-- register button -->
                <div class='mt-10 w-full text-center'>
                <button id='registerOverviewBtn' class='bg-primary-400 m-auto rounded-full h-14 w-80 text-xl hover:bg-primaryHover-200'>Register</button>
                </div>
            </div>
            <!-- checkout -->
            <div class='w-full h-full inline-block'>
                <div>
                <h1 class='text-5xl text-center w-11/12 mt-2 inline-block'><span class='text-primary-500'>Clip</span>aro</h1>
                <div class='absolute right-5 top-5 h-full inline-block'><i id='closeOverview' class="far fa-times-circle transform scale-150 text-gray-600 hover:text-gray-900 cursor-pointer" onclick='CloseOverview()'></i></div>
                </div>
                <!-- seperator -->
                <div class='w-full h-1 mt-8 m-auto bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200'></div>
                <div class='h-3/4 w-full flex justify-center items-center flex-col'>
                <div class='w-full ml-56'><h2 class='text-2xl text-gray-600'>Payment method</h2></div>
                    <div class='border-2 w-9/12 h-auto max-h-4/5'>
                        <form action="#" class='w-full h-full flex items-start justify-start flex-col'>
                            <div class='pl-4 mt-8'><input type="radio" name='payment'><span class='text-xl'>Credit or Debit Card</span></div>
                            <div class='w-full h-1 my-3 bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200'></div>
                            <div class='pl-4 mb-8'><input type="radio" name='payment'><span class='text-xl'>PayPal</span></div>
                        </form>
                    </div>
                </div>
                <div>
                    <button id='registerOverviewBtn' class='bg-primary-400 m-auto rounded-full h-14 w-80 text-xl hover:bg-primaryHover-200'>Checkout</button>
                </div>
                </div>
            </div>
        </section>