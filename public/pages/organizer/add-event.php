<section class='w-full h-auto rounded-md hidden transition delay-150 duration-300 ease-in-out' id='addEventContainer'>
    <div class='w-4/6 h-full m-auto bg-white p-3'>
        <form action="#" method='post' class='w-auto h-full'>
            <input type="hidden" name='addEvent' value='addNewEvent'>
            <div class='w-full h-full flex flex-col'>
                <div class="flex w-full gap-10">
                    <div class='w-1/2'>
                    <!-- name type price registration date about img -->
                        <h2 class='text-gray-500 font-light text-xl'>Event name</h2>
                        <input type="text" name='eventName' class='input-fields mb-2'>
                    </div>
                    <div class='w-5/12'>
                        <h2 class='text-gray-500 font-light text-xl'>Number of registration</h2>
                        <input type="number" name='eventName' class='input-fields'>
                    </div>
                </div>
                <div class='w-full flex gap-10 mt-8'>
                    <div class='w-1/2'>
                        <h2 class='text-gray-500 font-light text-xl'>Date</h2>
                        <input type="datetime-local" name='eventName' class='input-fields'>
                    </div>
                    <div class='w-3/12'>
                        <h2 class='text-gray-500 font-light text-xl'>Type</h2>
                        <select name='typeSelection' class='mt-3 text-xl text-gray-600 border-2 border-gray-400'>
                            <option value="football">Football</option>
                            <option value="ftball">basketball</option>
                            <option value="foball">Baseball</option>
                        </select>
                    </div>
                    <div class='w-3/12'>
                        <h2 class='text-gray-500 font-light text-xl'>Price</h2>
                        <input type="number" name='eventName' class='input-fields' maxlength='4' placeholder='SAR'>
                    </div>
                    <div class='w-3/12'>
                        <h2 class='text-gray-500 font-light text-xl'>Upload image</h2>
                        <input type="file" name='imgFile' class='h-auto mt-3 text-gray-600'>
                    </div>
                </div>
                <div class='w-full mt-8'>
                    <h2 class='text-gray-500 font-light text-xl'>About</h2>
                    <textarea id="aboutText" name="about" rows="4" cols="50" class='w-full border-2 border-gray-200 text-gray-500'></textarea>
                </div>
            </div>
            <div class='w-full mt-7 mb-2 text-center'>
                <button type='submit' class='w-3/12 h-12 shadow-md rounded-md bg-blue-600 text-white text-xl hover:bg-blue-800'>Add event</button>
            </div>
        </form>
    </div>
</section>