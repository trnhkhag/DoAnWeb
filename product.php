<?php

                $countRow = 0;
                while ($row = mysqli_fetch_assoc($result1)) {
                    if ($countRow == 0) {
                        echo '<div id="row" class="row" style="display:none">';
                    }
                    echo '<div class="col-md-6 col-lg-3 ftco-animate">';

                ?>
                    <div class="product">
                        <a href="product-single.html" class="img-prod"><img class="img-fluid" src="<?php echo  $row['Hinh'] ?>" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#" name="tensp"><?php echo $row['TenSP'] ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price" name="gia"><span><?php echo number_format($row['Gia'], 0, '', ',') ?> vnđ</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="product-single.html" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart btn-buynow" name="buynow"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    echo '</div>'; // end of col
                    $countRow++;
                };
                if ($countRow > 0) {
                    echo '</div>';
                }
                ?>