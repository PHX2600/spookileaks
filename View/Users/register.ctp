<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <?php echo $this->Form->create('User', array('class' => 'well')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('username', array(
                    'class' => 'login-username form-control'
                )); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('password', array(
                    'class' => 'login-password form-control'
                )); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('confirm_password', array(
                    'class' => 'login-password form-control'
                )); ?>
            </div>

            <div class="form-group text-right">
                <?php echo $this->Form->submit('Register', array(
                    'class' => 'login-submit btn btn-primary'
                )); ?>

            </div>

        <?php echo $this->Form->end(); ?>

    </div>

</div>