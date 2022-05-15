<center>
    <div>
        <ul>
            <?php foreach(MENU_CONFIG as $menu): ?>
                <li><a href="<?= $menu['url'] ?>"><?= $menu['name'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</center>