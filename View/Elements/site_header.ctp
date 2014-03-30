<div id="page-header" class="navbar navbar-inverse navbar-static-top">
    <div class="container">

        <a class="navbar-brand" href="/">Mystery Inc.</a>

        <ul class="nav navbar-nav">

            <li>
                <a href="/stories">My Ghost Stories</a>
            </li>

        </ul>

        <div class="navbar-right">

            <?php if ($this->Session->read('Auth.User.id')): ?>

                <a href="/logout" class="btn btn-primary navbar-btn"><?php echo $this->Session->read('Auth.User.username'); ?> (logout)</a>

            <?php else: ?>

                <a href="/register" class="btn btn-link btn-sm navbar-btn">Register</a>

                <a href="/login" class="btn btn-primary navbar-btn">Log In</a>

            <?php endif; ?>

        </div>

    </div>
</div>
