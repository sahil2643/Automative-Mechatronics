<?php
    // ... (your existing PHP code) ...

    if(isset($_GET['action']) && $_GET['action'] == "remove" && isset($_GET['pid']) && isset($_GET['confirmed'])) {
        foreach($_SESSION['cart'] as $key => $value) {
            if($value['pid'] == $_GET['pid']) {
                unset($_SESSION['cart'][$key]);
            }
        }
        header("Location: ".$_SERVER['HTTP_REFERER']); // Redirect back to the referring page
        exit();
    }

    // ... (remaining PHP code) ...
?>
