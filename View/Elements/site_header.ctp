<div id="page-header" class="navbar navbar-inverse navbar-static-top">
    <div class="container">

        <a class="navbar-brand" href="/">Mystery Inc.</a>

        <ul class="nav navbar-nav">

            <li>
                <a href="/about">About Us</a>
            </li>

            <?php if ($this->Session->read('Auth.User.id')): ?>

                <li>
                    <a href="/stories">My Ghost Stories</a>
                </li>

            <?php endif; ?>

        </ul>

        <div class="navbar-right">

            <?php if ($this->Session->read('Auth.User.id')): ?>

                <div class="navbar-text">
                    Logged in as: <strong><?php echo $this->Session->read('Auth.User.username'); ?></strong>
                </div>

                <a href="/logout" class="btn btn-primary navbar-btn">Log Out</a>

            <?php else: ?>

                <a href="/register" class="btn btn-link navbar-btn">Register</a>

                <a href="/login" class="btn btn-primary navbar-btn">Log In</a>

            <?php endif; ?>

        </div>

    </div>
</div>
