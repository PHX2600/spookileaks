<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <?php echo $this->Form->create('User', array(
            'class' => 'registration-form panel panel-default'
        )); ?>

            <div class="panel-body">

                <div class="form-group">

                    <h5>User Name</h5>

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

                <div class="form-group">

                    <h5>Confirm Password</h5>

                    <?php echo $this->Form->password('password_confirm', array(
                        'class' => 'login-password-confirm form-control'
                    )); ?>

                </div>

                <div class="panel-separator"></div>

                <div class="form-group text-right">

                    <?php echo $this->Form->submit('Register', array(
                        'class' => 'login-submit btn btn-primary'
                    )); ?>


                </div>

            </div>

        <?php echo $this->Form->end(); ?>

    </div>

</div>

<script src="/js/jquery.validate.min.js"></script>

<script>

    // Enable form validation
    $('.registration-form').validate({
        errorClass: 'error-text text-danger',
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });

    // Add validation rule
    $('.login-username').rules('add', {
        required:  true,
        minlength: 4
    });

    // Add validation rule
    $('.login-password').rules('add', {
        required:  true,
        minlength: 6
    });

    // Add validation rule
    $('.login-password-confirm').rules('add', {
        required:  true,
        minlength: 6,
        equalTo:   '.login-password'
    });

</script>
