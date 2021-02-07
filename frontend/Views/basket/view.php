<?php
    include_once __DIR__ . "/../header.php";
?>

<section class="sectionOfBasket">
    <div class="wrapper">
        <div id="basket_container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sum</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $key => $item) : ?>
                        <tr>
                            <td><?=++$key?></td>
                            <td>
                                <a href="/?model=product&action=view&id=<?=$item['product_id']?>">
                                    <img src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$item['product']['picture']?>">
                                </a>
                            </td>
                            <td>
                                <a href="/?model=product&action=view&id=<?=$item['product_id']?>">
                                    <?=$item['product']['title']?>
                                </a>
                            </td>
                            <td>
                                <form action="/?model=basket&action=change" method="POST">
                                    <input type="hidden" name="product_id" value="<?=$item['product']['id']?>">
                                    <input type="text" name="quantity" value="<?=$item['quantity']?>">
                                    <input type="submit" value="Change">
                                </form>
                            </td>
                            <td><?=$item['product']['price']?></td>
                            <td><?=$item['product']['sum']?></td>
                            <td>
                                <form action="/?model=basket&action=delete" method="POST">
                                    <input type="hidden" name="product_id" value="<?=$item['product']['id']?>">
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    <tr>
                        <td colspan="6" class="total">Total:</td>
                        <td><?=$total?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
    include_once __DIR__ . "/../footer.php";
?>
