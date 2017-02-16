<?php if (isset($_POST['login']) && isset($_POST['password']) && $_POST['password'] == 123): ?>
    <h4>Hi, <?php echo $_POST['login'] ?>, you are logged in</h4>
<?php else: ?>
    <form method="post">
    <div>
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" />
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="text" name="password" id="password"/>
    </div>
    <div>
        <input type="submit" value="Login" />
    </div>
</form>
<?php endif; ?>
<script>
    setTimeout(function () {
            var node = document.createElement("span");                 // Create a <li> node
            var textNode = document.createTextNode("created");         // Create a text node
            node.appendChild(textNode);                              // Append the text to <li>
            document.getElementsByTagName('body')[0].appendChild(node);
    }, 2000);
</script>
