    <nav>
        <ul class="flex gap-4 p-4 bg-orange-500 text-white">
            <li><a href="">Home</a></li>
            <li><a href="about/">About</a></li>
            <?php if (!empty($auth_user)): ?>
                <li><a href="home/">My Page</a></li>
                <li><a href="signout/">Sign Out</a></li>
            <?php else: ?>
                <li><a href="signin/">Sign In</a></li>
            <?php endif ?>
        </ul>
    </nav>