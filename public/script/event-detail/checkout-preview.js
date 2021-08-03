let creditContainer = document.getElementById('creditInputContainer');
let paypalContainer = document.getElementById('paypalInputContainer');

console.log('this is it');
const CreditRadio = () => {
    if(creditInputContainer.classList.contains('hidden')){
        creditInputContainer.classList.remove('hidden');
        creditInputContainer.classList.add('block');
    }else{
        creditInputContainer.classList.remove('block');
        creditInputContainer.classList.add('hidden');
    }
    // console.log('credit');
}
const PaypalRadio = () => {
    if(paypalContainer.classList.contains('hidden')){
        paypalContainer.classList.remove('hidden');
        paypalContainer.classList.add('block');
    }else{
        paypalContainer.classList.remove('block');
        paypalContainer.classList.add('hidden');
    }
    // add and remove mb-8 in paypal container
    // console.log('paypal');
}
const ShowCheckoutContainer = () => {
    // hide 
    document.getElementById('previewContainer').classList.remove('inline-block');
    document.getElementById('previewContainer').classList.add('hidden');
    // show
    document.getElementById('checkoutContainer').classList.remove('hidden');
    document.getElementById('checkoutContainer').classList.add('inline-block');
}
const ShowPreviewContainer = () => {    
    document.getElementById('previewContainer').classList.remove('hidden');
    document.getElementById('previewContainer').classList.add('inline-block');

    document.getElementById('checkoutContainer').classList.remove('inline-block');
    document.getElementById('checkoutContainer').classList.add('hidden');
}