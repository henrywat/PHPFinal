<?php include 'include/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php"; ?>
<body>

    <!-- Navbar (sit on top) -->
    <?php include "include/navbar.php"; ?>

    <!-- Hero -->
    <div class="pagetitle w3-display-container w3-opacity-min">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;CART&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div> 
    </div>
    <!-- CART DETAIL -->
    <div class="w3-content w3-container w3-padding-64" style="min-height: 65%;">
        <div class="w3-row">
        <table class="w3-table-all w3-margin">
            <thead>
                <tr class="w3-orange w3-text-white">
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th></th>
                </tr>
            </thead>

<?php
if(isset($_SESSION["cart_item"])){
    $cnt = 1;
    $total = 0;
    //foreach ($_SESSION["cart_item"] as $item) {
    foreach($_SESSION["cart_item"] as $cart_key=>$item){
        // get product details
        //$sql = "select id, product, description, price, image from ecom.products where id=?;";
        //$rs_prod = $conn->execute_query($sql, [$item["pid"]]);
        //$rowp = $rs_prod->fetch_assoc();

        // get color
        //$sql = "select id, color, hex from colors where id=?;";
        //$rs_col = $conn->execute_query($sql, [$item["cid"]]);
        //$rowc = $rs_col->fetch_assoc();

        $total += $item["price"] * $item["qty"];
?>
            <tr>
                <th><?=$cnt++?></th>
                <th><?=$item["product"]?></th>
                <th><span class="w3-tag w3-small" style="background-color: <?=$item["hex"]?>"><?=$item["color"]?></span></th>
                <th>$<?=number_format($item["price"], 2)?></th>
                <th><?=$item["qty"]?></th>
                <th><a href="action/do_remove_fm_cart.php?ckey=<?=$cart_key?>">remove</a></th>
            </tr>
<?php
    }
?>
            <tr><td colspan="6" class="w3-large w3-right-align">Total: $<?=number_format($total, 2)?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
        </table>
        </div>
        <div class="w3-row">
            <div class="w3-right-align">
                <a href="action/do_empty_cart.php" class="w3-btn w3-sand w3-hover-red w3-round-large">Empty Cart</a>
                <a href="checkout.php" class="w3-btn w3-sand w3-hover-red w3-round-large">Checkout -></a>
            </div>
        </div>
<?php } else { ?>
            <tr><td colspan="5" align="center">Shopping cart is empty.</td></tr>
            </table>
        </div>
<?php } ?>
        <div class="w3-row"><p>&nbsp;</p></div>
    </div>

    <!-- Footer -->
    <?php include "include/footer.php"; ?>

</body>
</html>

<?php

// close connection
$conn->close();
?>

