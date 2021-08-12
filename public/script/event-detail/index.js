
// close overview-checkout section
const CloseOverview =() =>{
    Swal.fire({
        title: 'Are you sure?',
        text: "Cancel checkout!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ade8f4',
        cancelButtonColor: '#d33',
        confirmButtonText: "<span style='color:#fff'>Yes, cancel!</span>",
      }).then((result) => {
        if (result.isConfirmed) {
            let closeIcon = document.getElementById('closeOverview');
            document.getElementById('eventOverviewContainer').style.display = 'none';
            document.getElementById('pageOverlay').style.display = 'none';
        }
      })
}
// register event btn
const RegisterEvent = () => {
    document.getElementById('eventOverviewContainer').style.display = 'block';
    document.getElementById('pageOverlay').style.display = 'block';
    ShowPreviewContainer();
    // PaypalRadio();
    // CreditRadio();
}