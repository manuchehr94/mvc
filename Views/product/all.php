<?php
    include_once __DIR__ . "/../header.php";
?>
<div>
    <a class="btn btn-warning" href="/php/Alif_Academy_php/MVC/index.php?model=product&action=create">Добавить товар</a>
</div>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Picture</th>
        <th scope="col">Preview</th>
        <th scope="col">Price</th>
        <th scope="col">Status</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allProducts as $products): ?>
        <tr>
            <td><?=$products['id']?></td>
            <td><?=$products['title']?></td>
            <td><img src ="uploads/products/<?=$products['picture']?>"></td>
            <td><?=$products['preview']?></td>
            <td><?=$products['price']?></td>
            <td><?=$products['status']?></td>
            <td><?=$products['created']?></td>
            <td><?=$products['updated']?></td>
            <td style ="width: 200px;">
                <a href="/php/Alif_Academy_php/MVC/index.php?model=product&action=update&id=<?=$products['id']?>" class="btn btn-warning">Update</a>
                <a href="/php/Alif_Academy_php/MVC/index.php?model=product&action=delete&id=<?=$products['id']?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
    include_once __DIR__ . "/../footer.php";
?>