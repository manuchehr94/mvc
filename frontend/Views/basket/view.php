<?php
    include_once __DIR__ . "/../header.php";
?>

<section class="sectionOfBasket">
    <div class="wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Quantity</th>
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
                        <td><input type="text" value="<?=$item['quantity']?>"></td>
                        <td><button>Delete</button></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</section>

<?php
    include_once __DIR__ . "/../footer.php";
?>
