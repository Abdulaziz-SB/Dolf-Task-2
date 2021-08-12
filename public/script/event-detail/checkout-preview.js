let creditContainer = document.getElementById('creditInputContainer');
let paypalContainer = document.getElementById('paypalInputContainer');

// clicking credit card radio button show credit container
const CreditRadio = () => {
        creditInputContainer.classList.remove('hidden');
        creditInputContainer.classList.add('block');
        paypalContainer.classList.remove('block');
        paypalContainer.classList.add('hidden');
}
// clicking paypal radio button show paypal container
const PaypalRadio = () => {
    paypalContainer.classList.remove('hidden');
    paypalContainer.classList.add('block');
    creditInputContainer.classList.remove('block');
    creditInputContainer.classList.add('hidden');
}
// display checkout container
const ShowCheckoutContainer = () => {
    // hide 
    document.getElementById('previewContainer').classList.remove('inline-block');
    document.getElementById('previewContainer').classList.add('hidden');
    // show
    document.getElementById('checkoutContainer').classList.remove('hidden');
    document.getElementById('checkoutContainer').classList.add('inline-block');
}
// display paypal container
const ShowPreviewContainer = () => {    
    document.getElementById('previewContainer').classList.remove('hidden');
    document.getElementById('previewContainer').classList.add('inline-block');

    document.getElementById('checkoutContainer').classList.remove('inline-block');
    document.getElementById('checkoutContainer').classList.add('hidden');
}
const CheckoutBtn = () => {
    Swal.fire("Successfull", "You have been successfully registered", "success", {button: 'Done'}).then((value) => {
        if(value.isConfirmed){
            window.location.href = '../../pages/user/index.php?v=hello';
        }else{
            window.location.href = '../../pages/user/index.php?v=hello';
        }
        // swal(`The returned value is: ${value}`);
    });
}