<?php
    include_once __DIR__ . "/../header.php";
?>

<section class="section">
    <div class="wrapper">
        <div class="mainContentOfProducts">
            <aside class="aside">
                <div class="productCategories divSpaces">
                    <h2>Categories</h2>
                    <ul>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Children</a></li>
                        <li><a href="#">Hot deals</a></li>
                    </ul>
                </div>
                <div class="priceFilter divSpaces">
                    <!--	<p>
                          <label for="amount">Price range:</label>
                          <input type="text" id="amount">
                        </p>

                        <div id="slider-range"></div>
                    </div>-->
                    <div class="priceFilterRange1">
                        <h2>Price Filter</h2>
                        <p class="priceFilterRangeText">
                            <span>100$</span>
                            <span>1000$</span>
                        </p>
                        <input type="range" min="0" max="1100" value="100" class="slider" id="lower">
                        <input type="range" min="0" max="1100" value="1000" class="slider" id="higher">
                    </div>
                    <p class="priceFilterRange2">
                        <span>From</span>
                        <input type="text" class="priceRange">
                        <span>To</span>
                        <input type="text" class="priceRange">
                    </p>
                </div>
                <div class="productSizesAndBrands divSpaces">
                    <h2>Price Filter</h2>
                    <ul>
                        <li><a href="#">Small</a></li>
                        <li><a href="#">Medium</a></li>
                        <li><a href="#">Large</a></li>
                        <li><a href="#">XLarge</a></li>
                    </ul>
                </div>
                <div class="productSizesAndBrands divSpacesSpecial">
                    <h2>Brands</h2>
                    <ul>
                        <li><a href="#">Reebok</a></li>
                        <li><a href="#">Adidas</a></li>
                        <li><a href="#">Nike</a></li>
                        <li><a href="#">Active</a></li>
                    </ul>
                </div>
            </aside>
            <div class="allProductsAndMore">
                <div class="allProducts">
                    <?php for ($i = 0; $i < sizeof($allProducts); $i++) : ?>
                    <div class="item">
                        <a class="productImg" href="/?model=product&action=view&id=<?=$allProducts[$i]['id']?>">
                            <img alt="photo" src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$allProducts[$i]['picture']?>">
                        </a>
                        <h2 class="trackJacket"><?=$allProducts[$i]['title']?></h2>
                        <p class="productCost"><?=$allProducts[$i]['price']?>$</p>
                    </div>
                    <?php endfor; ?>
                  <!-- <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product3.png" alt="photo"></a>
                        <h2 class="trackJacket orangeColor">Reebok Track Jacket</h2>
                        <p class="productSizes">sizes: s-m-l-xl</p>
                        <div class="varianOfProducts">
                            <div class="good productColor1"></div>
                            <div class="good productColor2"></div>
                            <div class="good productColor3"></div>
                            <div class="good productColor4"></div>
                        </div>
                        <div class="productIcons">
                            <a class="shareIcon" href="#"><img src="/img/share.png" alt="share"></a>
                            <a class="cartIcon" href="#"><img src="/img/addToCart.png" alt="addToCart"></a>
                            <a class="likeIcon" href="#"><img src="/img/like.png" alt="putLike"></a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product4.png" alt="photo"></a>
                        <h2 class="trackJacket">Reebok Track Jacket</h2>
                        <p class="productCost">100$</p>
                    </div>
                    <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product2.png" alt="photo"></a>
                        <h2 class="trackJacket">Reebok Track Jacket</h2>
                        <p class="productCost">100$</p>
                    </div>
                    <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product1.png" alt="photo"></a>
                        <h2 class="trackJacket">Reebok Track Jacket</h2>
                        <p class="productCost">100$</p>
                    </div>
                    <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product4.png" alt="photo"></a>
                        <h2 class="trackJacket">Reebok Track Jacket</h2>
                        <p class="productCost">100$</p>
                    </div>
                    <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product2.png" alt="photo"></a>
                        <h2 class="trackJacket">Reebok Track Jacket</h2>
                        <p class="productCost">100$</p>
                    </div>
                    <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product1.png" alt="photo"></a>
                        <h2 class="trackJacket">Reebok Track Jacket</h2>
                        <p class="productCost">100$</p>
                    </div>
                    <div class="item">
                        <a class="productImg" href="#"><img src="/img/Product4.png" alt="photo"></a>
                        <h2 class="trackJacket">Reebok Track Jacket</h2>
                        <p class="productCost">100$</p>
                    </div>-->
                </div>
                <div class="moreProducts2">
                    <div class="loadMore"></div>
                    <div class="loadMore"></div>
                    <div class="loadMore"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section2">
    <div class="wrapper">
        <div class="newsAndJoin">
            <div class="newsAndJoinBackground">
                <div class="newsText">
                    <span class="newsTitle">news letter</span>
                    <span class="newsDescription">join us now to get all news and special offer</span>
                </div>
                <div class="emailAndJoin">
                    <div class="email">
                        <img src="/img/email.png" alt="e-mail"><!--
									--><input class="inputEmail" type="email" placeholder="type your email here"/>
                    </div>
                    <a class="joinUs" href="#">
                        <span>join us</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . "/../footer.php";
?>