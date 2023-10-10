<?php
// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Get the weight, freight option, and state from the request
  $weight = isset($_GET['weight']) ? intval($_GET['weight']) : 0;
  $selectedOption = isset($_GET['freightOption']) ? $_GET['freightOption'] : 'air';
  $selectedState = isset($_GET['state']) ? $_GET['state'] : 'Lagos';

  // Set the unit price, handling charge, and state value
  $unitPrice = 4.95;
  $handlingCharge = 15.0;
  $stateValue = 10;

  // Initialize status variable
  $weightStatus = false;

  // Validate weight
  if ($weight <= 0) {
    $weightError = 'Please provide a valid weight.';
  } else {
    $weightError = '';
    $weightStatus = true;
  }

  // Check if weight is valid
  if ($weightStatus) {
    // Process the data
    $bmi = ($weight * $unitPrice * $stateValue) + $handlingCharge;
    $weightFigure = $weight . ' kg';
    $chargeableWeight = $weight . ' kg';
    $unitPriceDisplay = '₦' . ($unitPrice * $stateValue);
    $handlingChargeDisplay = '₦' . $handlingCharge;
    $freightOption = $selectedOption === 'ocean' ? 'Ocean freight' : 'Air freight';
    $output = '₦' . $bmi;

    // Prepare the response data
    $responseData = [
      'weightFigure' => $weightFigure,
      'chargeableWeight' => $chargeableWeight,
      'unitPrice' => $unitPriceDisplay,
      'handlingCharge' => $handlingChargeDisplay,
      'freightOption' => $freightOption,
      'state' => $selectedState,
      'output' => $output
    ];

    // Set the response headers
    header('Content-Type: application/json');

    // Return the response as JSON
    echo json_encode($responseData);
  } else {
    // Prepare the error response data
    $errorMessage = 'Please provide a valid weight.';

    // Set the response headers
    header('Content-Type: application/json');

    // Return the error response as JSON
    echo json_encode(['error' => $errorMessage]);
  }
}
?>
