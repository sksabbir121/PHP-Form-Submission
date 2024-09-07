<?php
include 'db.php';

$amountErr = $buyerErr = $receiptErr = $itemsErr = $emailErr = $noteErr = $cityErr = $phoneErr = $entryByErr = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $amount = $_POST['amount'];
    $buyer = $_POST['buyer'];
    $receipt_id = $_POST['receipt_id'];
    $items = $_POST['items'];
    $buyer_email = $_POST['buyer_email'];
    $buyer_ip = $_SERVER['REMOTE_ADDR']; 
    $note = $_POST['note'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $entry_by = $_POST['entry_by'];
    $entry_at = date('Y-m-d'); 

    $isValid = true;

    if (!is_numeric($amount)) {
        $amountErr = "The amount must be a valid number.";
        $isValid = false;
    }

    if (!preg_match("/^[a-zA-Z\s]{1,20}$/", $buyer)) {
        $buyerErr = "The buyer name can only contain letters, numbers, and spaces, and must not exceed 20 characters.";
        $isValid = false;
    }

    
    if (!preg_match("/^[a-zA-Z0-9]+$/", $receipt_id)) {
        $receiptErr = "The receipt ID can only contain letters and numbers.";
        $isValid = false;
    }

  
    if (!preg_match("/^[a-zA-Z0-9\s]+$/", $items)) {
        $itemsErr = "The items field can only contain letters, numbers, and spaces.";
        $isValid = false;
    }

  
    if (!filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please enter a valid email address.";
        $isValid = false;
    }

    
    if (str_word_count($note) > 30) {
        $noteErr = "The note cannot exceed 30 words.";
        $isValid = false;
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $city)) {
        $cityErr = "The city name can only contain letters and spaces.";
        $isValid = false;
    }

    if (!preg_match("/^[0-9]{1,20}$/", $phone)) {
        $phoneErr = "The phone number must contain only numbers and cannot exceed 20 characters.";
        $isValid = false;
    }

   
    if (!is_numeric($entry_by)) {
        $entryByErr = "The entry_by field must be a number.";
        $isValid = false;
    }

    if ($isValid) {
      $sql = "INSERT INTO submissions (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, entry_at, entry_by) 
              VALUES ('$amount', '$buyer', '$receipt_id', '$items', '$buyer_email', '$buyer_ip', '$note', '$city', '$phone', '$entry_at', '$entry_by')";

      if ($conn->query($sql) === TRUE) {
          $success = "Form submitted successfully!";
      } 
      
  }

}
?>






<!DOCTYPE html>
<html>
<head>
    <title>Submission Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
    .error {
        color: red;        
        font-size: 14px;   
        margin-left: 10px; 
        font-weight: bold; 
    }


    input {
        padding: 8px;
        width: 300px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input.error-border {
        border-color: red;   /* Highlight the input field with red border when there's an error */
    }

    label {
        display: inline-block;
        width: 100px;       /* Align labels nicely */
        font-weight: bold;
    }
</style>


</head>
<body>

<h2>Submission Form :</h2>
<br>
<div class="container mt-1">
    <form method="POST" action="submit.php">
      <div class="mb-1">
        <label  for="defaultInput" class="form-label">Amount:</label>
        <input type="Number" class="form-control" id="EnterAmount" placeholder="Enter Amount" name="amount" pattern="[0-9]{1,10}" required>
        <span class="error">*<?php echo $amountErr; ?></span><br>
     </div> 


     <div class="mb-1">
        <label for="defaultInput" class="form-label">Buyer:</label>
        <input type="text" class="form-control" id="BuyerName" placeholder="Buyer Name" name="buyer" pattern="[a-zA-Z\s]{1,20}" title="Twenty letters only " required>
        <span class="error">*<?php echo $buyerErr; ?></span><br>
     </div>

        
    <div class="mb-1">
    <label for="defaultInput" class="form-label">Receipt ID:</label>
    <input type="text" class="form-control" id="ReceiptId" placeholder="Receipt Id" name="receipt_id" pattern="[a-zA-Z0-9\s]{1,20}" title="only text" required>
    <span class="error">*<?php echo $receiptErr; ?></span><br>
    </div>

    <div class="mb-1">
    <label for="defaultInput" class="form-label">Items:</label>
    <input type="text" class="form-control" id="Items" placeholder="Items" name="items" title="only text" required>
    <span class="error">*<?php echo $itemsErr; ?></span><br>
    </div>
        

    <div class="mb-1">
    <label for="defaultInput" class="form-label">Buyer Email:</label>
    <input type="email" class="form-control" id="Buyer_email" placeholder="Buyer_email" name="buyer_email" title=" must be a valid email" required>
    <span class="error">*<?php echo $emailErr; ?></span><br>
    </div>

    <div class="mb-1">
    <label for="defaultInput" class="form-label">Note:</label>
    <textarea type="Note" class="form-control" id="Note" placeholder="Note" name="note" title="max 30 words" required></textarea>
    <span class="error">*<?php echo $noteErr; ?></span><br>
    </div>

    <div class="mb-1">
    <label for="defaultInput" class="form-label">City:</label>
    <input type="text" class="form-control" id="City" placeholder="City" name="city" title="only text and spaces" pattern="[a-zA-Z\s]{1,20}" title="Twenty letters only" required>
    <span class="error">*<?php echo $cityErr; ?></span><br>
    </div>
    
    <div class="mb-1">
    <label for="defaultInput" class="form-label">Phone:</label>
    <input type="text" class="form-control" id="Phone" placeholder="Phone"name="phone" pattern="[0-9]{1,20}" title="must be numeric and 20 characters max" required>
    <span class="error">*<?php echo $phoneErr; ?></span><br>
    </div>

    <div class="mb-1">
    <label for="defaultInput" class="form-label">Entry By:</label>
    <input type="number" class="form-control" id="EntryBy" placeholder="Entry By" name="entry_by" title="must be numeric" pattern="[0-9]{1,10}" required><br>
    <span class="error">*<?php echo $entryByErr; ?></span><br>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
</body>
</html>
