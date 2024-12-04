<?php
include('db_connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $fullName = $_POST['fullName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $paymentMethod = $_POST['paymentMethod'];
    $amountDonated = $_POST['amountDonated'];
    $sex = $_POST['sex'];
    $message = $_POST['message'];
    $gcash = "GCash";

    // Debugging: Output form data to check if it's correct
    echo "Full Name: $fullName <br>";
    echo "Mobile Number: $mobileNumber <br>";
    echo "Email: $email <br>";
    echo "Category: $category <br>";
    echo "Payment Method: $paymentMethod <br>";
    echo "Amount Donated: $amountDonated <br>";
    echo "Gender: $sex <br>";
    echo "Message: $message <br>";

    // Prepare SQL query
    $sql = "INSERT INTO donations (full_name, mobile_number, email, category, payment_method, amount_donated, gender, message)
            VALUES ('$fullName', '$mobileNumber', '$email', '$category', '$paymentMethod', '$amountDonated', '$sex', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Donation submitted successfully!";
        echo "
<script>
    const donationAmount = $amountDonated; // Get the donated amount

    // Store the donation amount in localStorage
    localStorage.setItem('donationAmount', donationAmount);

    // Redirect based on payment method selected
    switch ('$paymentMethod'){
    case 'GCash':
      window.location.href = 'gcash-donation.html';
      break;
    
    case 'Bank Transfer':
      window.location.href = 'bank-transfer.html';
      break;
    
    case 'Credit/Debit Card':
      window.location.href = 'credit-debit.html';
      break;
    }
</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
  <?php
  ?>