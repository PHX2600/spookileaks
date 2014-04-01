<div class="jumbotron">

    <div class="row">

        <div class="col-md-6">

            <img src="/img/ghost.jpg" class="img-rounded img-responsive">

        </div>

        <div class="col-md-6">

            <h2>Welcome to SpookiLeaks</h2>

            <p>We help you get your ghost stories out there quickly and securly.</p>

            <?php if ($this->Session->read('Auth.User.id')): ?>

                <a href="/login" class="btn btn-primary btn-block btn-lg">Add your stroies!</a>

            <?php else: ?>

                <a href="/login" class="btn btn-success btn-block btn-lg">Sign up now!</a>

            <?php endif; ?>

        </div>

    </div>

</div>
