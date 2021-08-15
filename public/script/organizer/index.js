let listItems = document.getElementsByClassName('sidebar-item');
// eventContainer
// dashboardContainer
// dashboardIcon
// eventIcon

const NavigateSideBar = (event) => {
    ChangeItemColor(event.currentTarget.id);
    switch (event.currentTarget.id){
        case 'dashboardIcon':
            document.getElementById('eventContainer').classList.add('hidden');
            document.getElementById('dashboardContainer').classList.remove('hidden');
            document.getElementById('dashboardContainer').classList.add('block');
            // console.log('dashboardIcon');
            break;
        case 'eventIcon':
            document.getElementById('dashboardContainer').classList.add('hidden');

            document.getElementById('eventContainer').classList.remove('hidden');
            document.getElementById('eventContainer').classList.add('block');
        // console.log('eventIcon');
        break;
    }
}
const ChangeItemColor = (id) => {
    console.log(id);
    // text-blue-300
    for(let i=0; i< listItems.length; i++){
        // listItems[i].classList.replace('text-blue-300','text-white');
        listItems[i].classList.remove('text-white');
        listItems[i].classList.add('text-blue-300');
    }
    document.getElementById(id).childNodes[0].classList.remove('text-blue-300');
    document.getElementById(id).childNodes[0].classList.add('text-white');
}
const ShowAddEventContainer = () =>{
    let newEventContainer = document.getElementById('addEventContainer');
    if(newEventContainer.classList.contains('hidden')){
        newEventContainer.classList.remove('hidden');
        newEventContainer.classList.add('block');
        // registration 
        document.getElementById('registrationContainer').classList.remove('block');
        document.getElementById('registrationContainer').classList.add('hidden');
    }else{
        newEventContainer.classList.remove('block');
        newEventContainer.classList.add('hidden');
        // registration 
        document.getElementById('registrationContainer').classList.remove('hidden');
        document.getElementById('registrationContainer').classList.add('block');
    }
}