<?php
require 'includes/connection.php';
include 'includes/public_header.php';
$id = $_GET["id"];
?>

<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">

            <?php
            $one_product_query = "SELECT * FROM products where product_id = $id";
            $one_product_result = mysqli_query($conn, $one_product_query);
            while ($one_product_row = mysqli_fetch_assoc($one_product_result)) {

                $perPrice = "" ;

                if ($one_product_row['discount'] > 0) {
                    $Newprice =   ((int)$one_product_row["product_price"] - ((int)$one_product_row["product_price"] * ((int)$one_product_row['discount'] / 100)))  ;
                    $perPrice =  "<p style=' text-decoration: line-through'>". $one_product_row["product_price"] . " JOD". "</p>" ;
                } else {
                    $Newprice = $one_product_row["product_price"] ;
                    $perPrice = "" ;
                }

               
              
                echo "<script> var product_price = $Newprice </script>" ;
              
                echo '
                <form class="row" method="GET" action="addto_cart.php" >
                <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="../admin/' . $one_product_row["product_image"] . '">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../admin/' . $one_product_row["product_image"] . '" alt="IMG-PRODUCT">
                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        ' . $one_product_row["product_name"] . '
                        </h4>
                        <span class="mtext-106 cl2">
                             ' . $perPrice .   $Newprice . " JOD" . '
                        </span>
                        <p class="stext-102 cl3 p-t-23">
                        ' . $one_product_row["product_desc"] . '
                        </p>
    
                        <div class="p-t-33">
                        <div class=" flex-w flex-m respon6-next">
                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                            <div onclick="gettotalDON()" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </div>
                            <input  onchange="updat()" id="product_price" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">
                            <div onclick="gettotalUP()" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>
                        </div>
                        <input id="hiddenInput" value='.$Newprice . ' style="display:none" name="total" >
                        <input id="hiddenInput" value='.$one_product_row["product_id"].' style="display:none" name="id" >
                        
                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button>
                      
                    </div>
                        </div>
    <br>
                      <h4>Total <p ><span id="totalSingle">'. $Newprice . '</span> JOD</p> </h4>
                    </div>
                </div>
                </form>
                    ';
            }
            ?>

        </div>
        <div class="bor10 m-t-50 p-t-43 p-b-40">

            <div class="tab01">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                            information</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                </ul>

                <div class="tab-content p-t-43">

                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla
                                sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit
                                lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim,
                                cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum
                                in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor
                                sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec
                                laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras
                                in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
                            </p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Weight
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            0.79 kg
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Dimensions
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            110 x 33 x 100 cm
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Materials
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            60% cotton
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Color
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            Black, Blue, Grey, Green, Red, White
                                        </span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Size
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            XL, L, M, S
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">

                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="images/avatar-01.jpg" alt="AVATAR">
                                        </div>
                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    Ariana Grande
                                                </span>
                                                <span class="fs-18 cl11">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </span>
                                            </div>
                                            <p class="stext-102 cl6">
                                                Quod autem in homine praestantissimum atque optimum est, id
                                                deseruit. Apud ceteros autem philosophos
                                            </p>
                                        </div>
                                    </div>

                                    <form class="w-full">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Add a review
                                        </h5>
                                        <p class="stext-102 cl6">
                                            Your email address will not be published. Required fields are marked *
                                        </p>
                                        <div class="flex-w flex-m p-t-50 p-b-23">
                                            <span class="stext-102 cl3 m-r-16">
                                                Your Rating
                                            </span>
                                            <span class="wrap-rating fs-18 cl11 pointer">
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <input class="dis-none" type="number" name="rating">
                                            </span>
                                        </div>
                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>
                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="name">Name</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                                            </div>
                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="email">Email</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                            </div>
                                        </div>
                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            SKU: JAK-01
        </span>
        <span class="stext-107 cl6 p-lr-25">
            Categories: Jacket, Men
        </span>
    </div>
</section>

<script>

function gettotalUP(){
    document.getElementById("totalSingle").innerHTML = (parseInt( $("#product_price").val()) + 1) * parseInt(product_price) ;
    $("#hiddenInput").val(document.getElementById("totalSingle").innerHTML)
    ;
}
function gettotalDON(){
    if(parseInt($("#product_price").val()) !=1 ){

        document.getElementById("totalSingle").innerHTML = (parseInt( $("#product_price").val()) - 1) * parseInt(product_price) ;
        $("#hiddenInput").val(document.getElementById("totalSingle").innerHTML)
    }else{
        $("#product_price").val(2)  ;
       
    }
    
}

function updat(){
    document.getElementById("totalSingle").innerHTML = (parseInt( $("#product_price").val())) * parseInt(product_price) ;
    $("#hiddenInput").val(document.getElementById("totalSingle").innerHTML)
}


</script>
<?php include 'includes/public_footer.php' ?>