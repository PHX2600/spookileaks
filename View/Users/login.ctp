<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <?php echo $this->Form->create('User', array(
            'class' => 'login-form panel panel-default'
        )); ?>

            <div class="panel-body">

                <div class="form-group">

                    <h5>Username</h5>

                    <?php echo $this->Form->text('username', array(
                        'class' => 'login-username form-control'
                    )); ?>

                </div>

                <div class="form-group">

                    <h5>Password</h5>

                    <?php echo $this->Form->password('password', array(
                        'class' => 'login-password form-control'
                    )); ?>

                </div>

                <div class="panel-separator"></div>

                <div class="form-group text-right">

                    <?php echo $this->Form->submit('Login', array(
                        'class' => 'login-submit btn btn-primary'
                    )); ?>

                </div>

            </div>

        <?php echo $this->Form->end(); ?>

    </div>

</div>