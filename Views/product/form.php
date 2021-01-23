<?php
    include_once __DIR__ . "/../header.php";
?>
<h1>Create Product</h1>

<div>
    <a class="btn btn-warning" href="/php/Alif_Academy_php/MVC/index.php?model=product&action=read">К списку</a>
</div>

<div>
    <form action="/php/Alif_Academy_php/MVC/index.php?model=product&action=save" method="post" enctype="multipart/form-data">
        <input value="<?=$oneProduct['id'] ?? "" ?>" type = "hidden" name ="id">
        <div class="form-group">
            <label>Title</label>
            <input value="<?=$oneProduct['title'] ?? "" ?>" type ="text" name = "title" class="form-control">
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type ="file" name = "picture" class="form-control">
            <?php
                if(!empty($oneProduct['picture'])){
                    ?><img src="uploads/products/<?=$oneProduct['picture'] ?>" style="width: 70px;"><?php
                }
            ?>
        </div>
        <div class="form-group">
            <label>Preview</label>
            <input value="<?=$oneProduct['preview'] ?? "" ?>" type="text" name ="preview" class="form-control">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input value="<?=$oneProduct['price'] ?? "" ?>" type="number" name ="price" class="form-control">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input value="<?=$oneProduct['status'] ?? "" ?>" type="number" name ="status" class="form-control">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" name="content"><?=$oneProduct['content'] ?? ''?></textarea>
        </div>
        <div class="form-group">
            <input type ="submit" name = "submit" class="btn btn-success">
        </div>
    </form>
</div>
<?php
    include_once __DIR__ . "/../footer.php";
?>