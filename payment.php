<?php
header('Content-Type: application/json');
require('vendor/autoload.php');  // Adjust the path if installed manually

use Razorpay\Api\Api;

$keyId = 'YOUR_KEY_ID';
$keySecret = 'YOUR_KEY_SECRET';

$api = new Api($keyId, $keySecret);

$orderData = [
    'receipt'         => 'order_rcptid_11',
    'amount'          => 500 * 100,  // 500 INR in paise
    'currency'        => 'INR',
    'payment_capture' => 1           // Auto capture payment
];

try {
    $razorpayOrder = $api->order->create($orderData);
    echo json_encode($razorpayOrder);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>