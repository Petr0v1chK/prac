<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <ul>
        <li><a href="index.php" class="<?= $current === 'index.php' ? 'active' : '' ?>">Главная страница</a></li>
        <li><a href="o-kompanii.php" class="<?= $current === 'o-kompanii.php' ? 'active' : '' ?>">О компании</a></li>
        <li><a href="novosti.php" class="<?= $current === 'novosti.php' ? 'active' : '' ?>">Новости</a></li>
        <li><a href="obratnaya-svyaz.php" class="<?= $current === 'obratnaya-svyaz.php' ? 'active' : '' ?>">Обратная связь</a></li>
        <li><a href="#">Поставщикам</a></li>
        <li><a href="#">Заказчикам</a></li>
    </ul>
</nav>