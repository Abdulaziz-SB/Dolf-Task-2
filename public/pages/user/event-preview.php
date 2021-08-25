<section id='eventOverviewContainer' class='w-full md:w-2/3 h-2/3 bg-white shadow-lg absolute top-40 right-0 md:right-64 z-30 rounded hidden'>
    <!-- Overview inline-block --> 
    <div id='previewContainer' class='w-full h-full inline-block'>
        <div class='flex-col-reverse md:flex-row flex w-full'>
            <img src="<?php echo $eventRow['img'];?>" class='ml-11 md:m-0 w-5/12 h-3/6 object-cover rounded-tl'>
            <div class='w-full'>
                <h1 class='text-4xl text-center w-11/12 mt-2 inline-block'><span class='text-primary-500'>Clip</span>aro</h1>
                <span class='absolute right-4 top-4 md:inline md:right-0 md:top-0'><i id='closeOverview' class="far fa-times-circle transform scale-150 text-gray-600 hover:text-gray-900 cursor-pointer" onclick='CloseOverview()'></i></span>
                <div class='w-full h-1 m-auto bg-gray-200 mt-6'></div>
                <ul class='mt-10 ml-10'>
                    <li class='text-2xl mb-3 text-gray-600'><span class='font-semibold'>Event: </span> <?php echo $eventRow['name'];?></li>
                    <li class='text-2xl mb-3 text-gray-600'><span class='font-semibold'>Organizer: </span> <?php echo $organizerRow['username'];?></li>
                    <li class='text-2xl mb-3 text-gray-600'><span class='font-semibold'>Date: </span> <?php echo $eventRow['date'];?></li>
                    <li class='text-2xl text-gray-600'><span class='font-semibold'>Price: </span> <?php echo $eventRow['price'];?> SR</li>
                </ul>
            </div>
        </div>
        <!-- seperator -->
        <div class='w-full h-1 mt-4 md:mt-14 m-auto bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200'></div>
        <!-- register button -->
        <div class='mt-10 w-full text-center'>
        <button id='registerOverviewBtn' class='bg-primary-400 m-auto rounded-full h-14 w-80 text-xl hover:bg-primaryHover-200' onclick='ShowCheckoutContainer()'>Proceed to checkout</button>
        </div>
    </div>
    <!-- checkout -->
    <div id='checkoutContainer' class='w-full h-full hidden'>
        <div>
        <h1 class='text-5xl text-center w-11/12 mt-2 inline-block'><span class='text-primary-500'>Clip</span>aro</h1>
        <div class='absolute right-5 top-5 h-full inline-block'><i id='closeOverview' class="far fa-times-circle transform scale-150 text-gray-600 hover:text-gray-900 cursor-pointer" onclick='CloseOverview()'></i></div>
        </div>
        <!-- seperator -->
        <div class='w-full h-1 mt-3 md:mt-8 m-auto bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200'></div>
        <!-- checkout container -->
        <div class='h-auto mt-4 md:mt-12 w-full flex justify-center items-center flex-col'>
            <div class='w-full text-center'><h2 class='text-2xl text-gray-600'>Payment method</h2></div>
            <div class='border-2 w-9/12 h-auto max-h-4/5 mt-5'>
                <form action="../../classes/checkoutcontr.class.php" class='w-full h-full flex items-start justify-start flex-col' id='checkoutForm' method='post'>
                    <input type='hidden' name='checkoutType' value='checkout'>
                    <input type='hidden' name='eventId' value='<?php echo $eventRow['id']?>'>
                    <input type='hidden' name='priceInput' value='<?php echo $eventRow['price']?>'>
                    <!-- credit radio -->
                    <div class='pl-4 mt-8'><input id='creditRadio' type="radio" name='payment' onclick='CreditRadio()' required value='credit'><span class='text-xl ml-2'>Credit or Debit Card</span><span class='text-gray-600 ml-4'><i class="fas fa-credit-card"></i></span></div>
                    <!-- credit inputs -->
                    <div id='creditInputContainer' class='w-full h-auto p-3 px-11 hidden'>
                        <?php flash('payment');?>
                        <div>please fill all data</div>
                        <input name='cardNum' type="text" placeholder='****-****-****-****' class='border-2 w-full h-11 text-gray-600' min='0' id="ccn" onkeyup='addHyphens()' maxlength="19">

                        <div class='grid grid-cols-4 gap-5 mt-5'>
                            <input name='cardDate' type="text" placeholder="expire date" class='col-span-2 border-2 h-11 text-gray-600' id='tbNum' onkeyup='addSlash()' maxlength="5">
                            <input name='cardCSC' type="number" placeholder="CSC" class='border-2 h-11 text-gray-600' min='0' maxlength='4'>
                            <input name='cardZip' type="number" placeholder="Zip/Postal" class='border-2 h-11 text-gray-600' min='0' maxlength='5'>
                        </div>
                    </div>
                    <div class='w-full h-1 my-3 bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200'></div>
                    <!-- credit radio -->
                    <div class='pl-4 mt-2 mb-6'><input id='paypalRadio' type="radio" name='payment' onclick='PaypalRadio()' value='paypal'><span class='text-xl ml-2'>PayPal</span><span class='text-gray-600 ml-4'><i class="fab fa-paypal"></i></span></div>
                    <!-- paypal inputs -->
                    <div id='paypalInputContainer' class='w-full h-auto p-1 px-11 hidden'>
                        <p class='text-gray-800 text-xl mb-4 '>Sign into your paypal account to complete purchase.</p>
                        <div class='text-center'><a href='https://www.paypal.com/sa/signin' target='_blank'><div class='bg-blue-600 m-auto rounded-full h-8 w-full md:w-64 hover:bg-blue-800 text-white mb-4 p-1'>PayPal</div></a></div>
                    </div>
                </form>
            </div>
            <div class='text-center mt-7'>
                <button form='checkoutForm' id='registerOverviewBtn' type='submit' class='bg-primary-400 m-auto rounded-full h-14 w-80 text-xl hover:bg-primaryHover-200' onclick=CheckoutBtn()>Checkout</button>
            </div>
        </div>
        </div>
    </div>
</section>