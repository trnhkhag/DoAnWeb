<?php

//fetch_data.php

include('connect_db.php');

if (isset($_POST["action"])) {
    $query = "
    SELECT MaSP, Hang, Gia, sanpham.MaLoai, TenLoai, TenSP, Hinh, CodeSP
    FROM sanpham, loai 
    WHERE TrangThai = '1' and sanpham.MaLoai = loai.MaLoai";

    $parameters = array();

    if (isset($_POST["search_product_name"])) {
        $search_filter = $_POST["search_product_name"];
        if (!empty($search_filter)) {
            $query .= "
            AND TenSP LIKE ?
        ";
            $parameters[] = '%' . $search_filter . '%';
        }
    }

    $statement = $connect->prepare($query);
    $statement->execute($parameters);
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();

    $output = '';

    //PRODUCT
    if ($total_row > 0) {
        foreach ($result as $row) {
            $output .= '
            <ul class="search-result">
                <a href="product-single.php?MaSP=' .$row['MaSP'] . '" class="img-prod"><img class="img-fluid3" src="' . $row['Hinh'] . '" alt="Colorlib Template"> <span class="name-top-search">' . $row['TenSP'] . '</span> </a>
            </ul>
			';
        }
    } else {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}
?>
<script>
    $(document).ready(function() {
        $(".addItemBtn").click(function(e) {
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcode = $form.find(".pcode").val();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {
                    pid: pid,
                    pname: pname,
                    pprice: pprice,
                    pimage: pimage,
                    pcode: pcode
                },
                success: function(response) {
                    $("#message").html(response);
                    window.scrollTo(0, 0);
                    load_cart_item_number();
                }
            });
        });

        load_cart_item_number();

        function load_cart_item_number() {
            $.ajax({
                url: 'action.php',
                method: 'get',
                data: {
                    cartItem: "cart_item"
                },
                success: function(response) {
                    $("#cart-Item").html(response);
                }
            });
        }
    });
</script>