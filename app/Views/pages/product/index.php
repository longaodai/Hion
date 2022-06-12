<center><h1>Product Page</h1></center>
<a href="./product/add">Add Product</a>
<br>
<form method="get">
    <div>
        <label for="">Name</label>
        <input type="text" name="search_name" value="<?= handleParamGET()['search_name'] ?? null ?>">
    </div>
    <div>
        <label for="">price</label>
        <input type="text" name="search_price" value="<?= handleParamGET()['search_price'] ?? null ?>">
    </div>
    <button type="submit">Search</button>
    <a href="<?= getURLCurrentPage()?>">Reset</a>
</form>
<hr>
<?php foreach($data['data'] as $item): ?>
    <span><?= $item['id'] ?? "-"?></span><br>
    <span><?= $item['name'] ?? "-" ?></span><br>
    <span><?= $item['price'] ?? "-" ?></span><br>
    <span><?= $item['description'] ?? "-" ?></span><br>
    <hr>
<?php endforeach ?>

<!-- <?php renderPagination($data['paginate']) ?> -->