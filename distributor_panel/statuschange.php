<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "automative_mechatronics");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accept'])) {
        $orderid = $_POST['oid'];
        // Update status to "Accepted" for the order with the given ID
        $statusaccept = "Accepted";
        $sql = "UPDATE orders SET status = '$statusaccept' WHERE oid = $orderid";
        if (mysqli_query($conn, $sql)) {
            // echo "Order status updated successfully.";
            header("location:orders.php");
        } else {
            echo "Error updating order status: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['reject'])) {
        $orderid = $_POST['oid'];
        // Update status to "Accepted" for the order with the given ID
        $statusaccept = "Reject";
        $sql = "UPDATE orders SET status = '$statusaccept' WHERE oid = $orderid";
        if (mysqli_query($conn, $sql)) {
            // echo "Order status updated successfully.";
            header("location:orders.php");
        } else {
            echo "Error updating order status: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['Delivered'])) {
        $orderid = $_POST['oid'];
        // Update status to "Accepted" for the order with the given ID
        $statusaccept = "Delivered";
        $sql = "UPDATE orders SET status = '$statusaccept' WHERE oid = $orderid";
        if (mysqli_query($conn, $sql)) {
            // echo "Order status updated successfully.";
            header("location:pandingorders.php");
        } else {
            echo "Error updating order status: " . mysqli_error($conn);
        }
    }
}
?>
