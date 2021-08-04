console.log('helllos')
// eventContainer
// dashboardContainer
// dashboardIcon
// eventIcon

const NavigateSideBar = (event) => {
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
