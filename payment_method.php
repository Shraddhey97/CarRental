<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0) { 
  header('location:index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payment UI</title>
  
  <!-- Use ONLY Bootstrap 5 from CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Your custom styles -->
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="payment_method.css">

  </style>
</head>
<body>

<div class="container py-4">
  <div class="payment-container">
    <ul class="nav nav-tabs mb-4" id="paymentTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="card-tab" data-bs-toggle="tab" data-bs-target="#card" type="button" role="tab">Card</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="khalti-tab" data-bs-toggle="tab" data-bs-target="#khalti" type="button" role="tab">Khalti</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="esewa-tab" data-bs-toggle="tab" data-bs-target="#esewa" type="button" role="tab">eSewa</button>
      </li>
    </ul>

    <div class="tab-content" id="paymentTabsContent">
      <!-- Card Payment -->
      <div class="tab-pane fade show active" id="card" role="tabpanel">
        <form>
          <div class="mb-3">
            <label for="cardNumber" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="expiry" class="form-label">Expiry</label>
              <input type="text" class="form-control" id="expiry" placeholder="MM/YY">
            </div>
            <div class="col">
              <label for="cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cvv" placeholder="123">
            </div>
          </div>
          <div class="mb-3">
            <label for="cardName" class="form-label">Card Holder Name</label>
            <input type="text" class="form-control" id="cardName" placeholder="Full name on card">
          </div>
          <button type="submit" class="btn btn-primary pay-btn">Pay</button>
        </form>
      </div>

      <!-- Khalti -->
      <div class="tab-pane fade" id="khalti" role="tabpanel">
        <form>
          <div class="mb-3">
            <label for="khaltiID" class="form-label">Khalti ID</label>
            <input type="text" class="form-control" id="khaltiID" placeholder="Khalti account number">
          </div>
          <div class="mb-3">
            <label for="khaltiAmount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="khaltiAmount" placeholder="Enter amount">
          </div>
          <button type="submit" class="btn btn-success pay-btn">Pay with Khalti</button>
        </form>
      </div>

      <!-- eSewa -->
      <div class="tab-pane fade" id="esewa" role="tabpanel">
        <form>
          <div class="mb-3">
            <label for="esewaID" class="form-label">eSewa ID</label>
            <input type="text" class="form-control" id="esewaID" placeholder="eSewa account number">
          </div>
          <div class="mb-3">
            <label for="esewaAmount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="esewaAmount" placeholder="Enter amount">
          </div>
          <button type="submit" class="btn btn-success pay-btn">Pay with eSewa</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Your other scripts -->
<script src="assets/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
  // Ensure tabs work properly
  $('button[data-bs-toggle="tab"]').on('click', function() {
    var target = $(this).data('bs-target');
    $('.tab-pane').removeClass('show active');
    $(target).addClass('show active');
  });
});
</script>
</body>
</html>
