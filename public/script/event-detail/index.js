
// close overview-checkout section
const CloseOverview =() =>{
    let closeIcon = document.getElementById('closeOverview');
    document.getElementById('eventOverviewContainer').style.display = 'none';
    document.getElementById('pageOverlay').style.display = 'none';
}
// register event btn
const RegisterEvent = () => {
    document.getElementById('eventOverviewContainer').style.display = 'block';
    document.getElementById('pageOverlay').style.display = 'block';
    ShowPreviewContainer();
    // PaypalRadio();
    // CreditRadio();
}