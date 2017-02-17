<h1>Desktop version</h1>

<ul>
    <?php if(isset($_COOKIE['mode']) && $_COOKIE['mode'] === 'mobile'): ?>
    <li><a href="./set-desktop-cookie.php">Desktop version</a></li>
        <?php else: ?>
    <li><a href="./set-mobile-cookie.php">Mobile version</a></li>
    <?php endif; ?>
</ul>