<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Include html2pdf library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice {
            width: 80%;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            margin: 0;
        }

        .invoice-body table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-body th, .invoice-body td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .invoice-body th {
            background-color: #f2f2f2;
        }

        .invoice-body tfoot td {
            font-weight: bold;
        }

        .invoice-body tfoot td:first-child {
            text-align: right;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .invoice, .invoice * {
                visibility: visible;
            }

            .invoice {
                position: absolute;
                left: 0;
                top: 0;
            }

            /* Hide download button when printing */
            #downloadBtn {
                display: none;
            }
        }
    </style>
</head>
<body>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "automative_mechatronics");

// Check if oid is set in the URL
if(isset($_GET['oid'])) {
    $oid = $_GET['oid'];

    // Select query to fetch data for the invoice
    $sel_order = "SELECT 
                shipping.phone AS shipping_phone,
                shipping.email AS shipping_email,
                shipping.gst AS shipping_gst,
                shipping.address AS shipping_address,
                orders.oid,
                orders.name,
                orders.price,
                orders.qty,
                orders.status,
                orders.date,
                payment.total_amount
                FROM 
                orders
                INNER JOIN
                shipping ON orders.sid = shipping.sid
                INNER JOIN
                payment ON orders.oid = payment.oid 
                WHERE orders.oid = '$oid'";

    $result = mysqli_query($conn, $sel_order);

    if($result) {
        // Check if any row is returned
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = explode(",",$row['name']);
            $price = explode(",",$row['price']);
            $qty = explode(",",$row['qty']);
            $count = count($name);
        } else {
            echo "No record found";
        }
    } else {
        // Display any SQL error if occurred
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Order ID not provided";
}
?>

<div class="invoice">
    <div class="invoice-header">
        <h1>Invoice <?php echo $row['oid']; ?></h1>
        <h3>GST No : <?php echo $row['shipping_gst']; ?></h3>
        <p><?php echo $row['shipping_address']; ?></p>
        <p>Email: <?php echo $row['shipping_email']; ?> | Phone: <?php echo $row['shipping_phone']; ?></p>
    </div>
    <div class="invoice-body">
        <h4>Date:<?php echo $row['date']; ?></h4>
        <table>
            <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($i=0;$i<$count;$i++)
            {
                ?>
                <tr>
                    <td><?php echo $name[$i]; ?></td>
                    <td><?php echo $qty[$i]; ?></td>
                    <td>₹<?php echo $price[$i]; ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2">Total</td>
                <td>₹<?php echo $row['total_amount']; ?></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<center>
    <button id="downloadBtn" onclick="downloadInvoice()" style="height:40px;">Download Invoice</button>
</center>

<script>
    var oid = "invoice : <?php echo $oid; ?>";
    function downloadInvoice() {
        // Select the invoice element
        const invoice = document.querySelector(".invoice");

        // Remove download button from invoice before generating PDF
        const downloadBtn = invoice.querySelector("#downloadBtn");
        if (downloadBtn) {
            downloadBtn.remove();
        }

        // Configure options for pdf generation
        const options = {
            margin: 10,
            filename: oid,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        // Generate the PDF
        html2pdf().from(invoice).set(options).save();
    }
</script>

</body>
</html>
