<?php
require_once 'db.php';

class Report {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getSubmissions($userId = null) {
        $query = "SELECT * FROM submissions";

        if ($userId) {
            $query .= " WHERE id = ? OR entry_by = ?";
        }

        $stmt = $this->db->prepare($query);

        if ($userId) {
            $stmt->bind_param('ii', $userId, $userId);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Buyer</th>
                        <th>Receipt ID</th>
                        <th>Items</th>
                        <th>Buyer Email</th>
                        <th>Buyer IP</th>
                        <th>Note</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Entry Date</th>
                        <th>Entry By</th>
                    </tr>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['amount']}</td>
                        <td>{$row['buyer']}</td>
                        <td>{$row['receipt_id']}</td>
                        <td>{$row['items']}</td>
                        <td>{$row['buyer_email']}</td>
                        <td>{$row['buyer_ip']}</td>
                        <td>{$row['note']}</td>
                        <td>{$row['city']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['entry_at']}</td>
                        <td>{$row['entry_by']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
    }
}

$report = new Report();
$userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h2>Search ID</h2>
    <br>
    <form method="GET" action="">
        <label for="user_id">Search by User ID or Entry By:</label>
        <input type="text" id="user_id" name="user_id">
        <input type="submit" value="Search">
    </form>
    <br>

    <h2>Submission Report</h2>
    <br>
    <?php $report->getSubmissions($userId); ?>
</body>
</html>
