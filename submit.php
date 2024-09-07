<?php
require_once 'db.php';

class Submission {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function validateAndInsert($data) {

        $amount = filter_var($data['amount'], FILTER_VALIDATE_INT);
        $buyer = preg_match('/^[\w\s]{1,20}$/', $data['buyer']) ? $data['buyer'] : null;
        $receipt_id = $data['receipt_id'];
        $items = $data['items'];
        $buyer_email = filter_var($data['buyer_email'], FILTER_VALIDATE_EMAIL);
        $note = str_word_count($data['note']) <= 30 ? $data['note'] : null;
        $city = preg_match('/^[a-zA-Z\s]+$/', $data['city']) ? $data['city'] : null;
        $phone = preg_match('/^\d+$/', $data['phone']) ? $data['phone'] : null;
        $entry_by = filter_var($data['entry_by'], FILTER_VALIDATE_INT);
        $buyer_ip = $_SERVER['REMOTE_ADDR'];
        $entry_at = date('Y-m-d');

        if ($amount && $buyer && $buyer_email && $note && $city && $phone && $entry_by) {
            $query = "INSERT INTO submissions (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, entry_at, entry_by)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('isssssssssi', $amount, $buyer, $receipt_id, $items, $buyer_email, $buyer_ip, $note, $city, $phone, $entry_at, $entry_by);

            if ($stmt->execute()) {
                echo "<script>
                alert('Data submitted successfully!');
                window.location.href='report.php';
            </script>";
               
            } else {
                echo "Failed to submit data.";
            }
        } else {
            echo "Invalid data. Please try again.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submission = new Submission();
    $submission->validateAndInsert($_POST);
}
?>
