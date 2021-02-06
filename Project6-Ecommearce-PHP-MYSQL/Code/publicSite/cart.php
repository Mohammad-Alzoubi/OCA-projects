<?php

require 'includes/connection.php';
require("includes/public_header.php");
$total_price = 0;
function calculate_total($price)
{
    $GLOBALS['total_price'] += $price;
    if ($GLOBALS["total_price"] != 0) {
        $_SESSION["total_price"] = $GLOBALS["total_price"];
    }
}

if (isset($_POST["submit"])) {
    if (isset($_SESSION["customer_id"])) {
        if (isset($_SESSION["order"])) {
            $customer_id = $_SESSION["customer_id"];

            $total = $_SESSION["total_price"];
            $query = "INSERT INTO orders(customer_id,order_total) VALUES($customer_id,$total)";
            mysqli_query($conn, $query);
            $last_id = mysqli_insert_id($conn);
            foreach ($_SESSION["order"] as $key => $order) {
                $query2 = "INSERT INTO order_product(order_id,product_id) VALUES($last_id,{$order["product_id"]})";
                mysqli_query($conn, $query2);
            }

            unset($_SESSION["order"]);
            echo "<script>window.location='profile.php'</script>";
        }
    } else {
        echo "<script>window.location='login_customer.php'</script>";
        // header("location:login.php");
    }
}



?>
<form id="cart_form" action="" method="POST" class="bg0 p-t-100 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1 ">Image</th>
                                <th class="column-1 text-center ">Name</th>
                                <th class="column-1 text-center">Price</th>
                                <th class="column-1 text-center">Delete</th>
                            </tr>
                            <?php

                            if (isset($_SESSION["order"])) {
                                foreach ($_SESSION["order"] as $key => $order) {
                                    $query3 = "SELECT * FROM products WHERE product_id={$order['product_id']}";
                                    $result = mysqli_query($conn, $query3);
                                    $item = mysqli_fetch_assoc($result);
                                    calculate_total((int)$order['total']);
                                    echo '
									<tr id="' . $order['product_id'] . '" class="table_row">
										<td class="column-1  ">
											<div class="how-itemcart1 d-inline-flex align-items-center">
												<img mx-auto src="../admin/' . $item['product_image'] . '" alt="IMG">
											</div>
										</td>
										<td class="column-1 text-center">' . $item['product_name'] . '</td>
                                        <td class="column-1 text-center">' . $order['total'] . " JOD" . '</td>
                                        <td class="column-1 text-center"><div onclick="' . "removefromcart({$order['total']} , $key ,{$order['product_id']})" . '"class="btn btn-danger ">Remove</div> </td>
									</tr>
								';
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <a href="index.php">
                            <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Continue Shopping
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">

                            <div class="p-t-15">
                                <h4>Shipping: </h4>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="time">
                                        <option>Select a country...</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>
                        <div class="size-209 p-t-1">
                            <span id="total_front" class="mtext-110 cl2">
                                <?php echo $total_price . " JOD" ?>
                            </span>
                        </div>
                    </div>
                    <input id="cart_submit" type="submit" name="submit" value="Proceed to Checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"> </input>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
require("includes/public_footer.php");
?>
<script>
    function removefromcart(id, k, p) {


        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


                $("#" + p).remove();
                document.getElementById("total_front").innerHTML = this.responseText + " JOD"

                $("#cart_count").attr("data-notify", $("#cart_count").attr("data-notify") - 1)


                if ((this.responseText) == 0) {

                    $("#cart_submit").attr("disabled", true)

                    document.getElementById("cart_submit").style.opacity = "0.5"
                } else {

                    $("#cart_submit").removeAttr("disabled")
                    document.getElementById("cart_submit").style.opacity = "1"
                }

            }
        };
        xhttp.open("POST", "cart_delete.php?id_delete=" + id + "&order_key=" + k, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();



    }
</script>