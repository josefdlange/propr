<div class="sixteen columns" style="margin-top: 10px;">
    <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <?php
        
            if(!$loggedIn) {
                ?><li><a href="login.php">Log In</a></li><?php
            } else {
                ?>
                <li><a href="props.php">Props</a></li>
                <li><a href="productions.php">Productions</a></li>
                <li><a href="people.php">People</a></li>
                <?php
            }
        
        ?>
    </ul>
    <hr />
</div>