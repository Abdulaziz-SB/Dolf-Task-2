const ShowMenuBar = () => {
    console.log('clicked');
    // let menuBar = document.getElementById('menuBarId');
    let menuContent = document.getElementById('menuContentContainer');
    if(menuContent.classList.contains('hidden')){
        menuContent.classList.remove('hidden');
        menuContent.classList.add('flex');
    }else{
        menuContent.classList.remove('flex');
        menuContent.classList.add('hidden');
    }
}