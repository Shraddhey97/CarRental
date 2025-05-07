<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payment UI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="payment_method.css">
  <style>
  </style>
</head>
<body>

<div class="payment-container">
  <ul class="nav nav-tabs justify-content-between" id="paymentTabs" role="tablist">
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
        <div class="mb-3 row">
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
        <button type="submit" class="btn btn-success pay-btn" style="background-color: #4CAF50;">Pay with eSewa</button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
