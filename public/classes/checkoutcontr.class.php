<?php
require_once './checkout.class.php';
require_once '../helpers/session_helper.php';

class CheckoutContr extends Checkout{
    private $checkModel;

    public function __construct() {
        $this->checkoutModel = new Checkout;
    }

    public function payment() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'cardDate' => trim($_POST['cardDate']),
            'usersId' => trim($_SESSION['usersId']),
            'eventId' => trim($_POST['eventId']), // event
            'price' => trim($_POST['priceInput']), // price
            'paymentMethod' => trim($_POST['payment'])
        ];
        if($_POST['payment'] == 'credit'){
            if(empty($_POST['cardNum']) || empty($_POST['cardCSC']) || empty($_POST['cardZip']) || empty($_POST['cardDate'])){
                echo 'inside empty if';
                flash('payment', 'Please fill all fields');
                redirect('../pages/user/index.php?t=empty');
            }
        }elseif($_POST['payment'] == 'paypal'){
            $year = substr(date('Y'), -2);
            $data['cardDate'] = date("m/").$year;
        }
        if($this->checkoutModel->InsertCheckoutData($data)){
            echo 'success';
            redirect('../pages/user/index.php?t=added');
        }else{
            echo 'failed';
            redirect('../pages/user/index.php?t=wrong');
            die('something went wrong');
        }
    }
}

$init = new CheckoutContr;

echo 'hii';
// Ensure that user is sending a post request
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($_POST['checkoutType']){
        case 'checkout':
            $init->payment();
            break;
        default:
        redirect('../pages/user/index.php?t=default');
        }
}
?>