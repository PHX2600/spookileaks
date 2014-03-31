<div class="row">

    <div class="col-md-8">

        <p>Stories will go here</p>

    </div>

    <div class="col-md-4">

        <?php echo $this->Form->create('Story', array('enctype' => 'multipart/form-data')); ?>

            <div class="new-story panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Add Your Story</h3>
                </div>

                <div class="panel-body">

                    <div class="form-group">

                        <h5>Story Title</h5>

                        <?php echo $this->Form->text('title', array(
                            'class'       => 'form-control input-lg',
                            'placeholder' => 'Title',
                        )); ?>

                    </div>

                    <div class="form-group">

                        <h5>Story Image</h5>

                        <?php echo $this->Form->file('Story.file'); ?>

                    </div>

                    <div class="form-group">

                        <h5>Story Text</h5>

                        <?php echo $this->Form->textarea('text', array(
                            'class'       => 'form-control',
                            'placeholder' => 'Story Text',
                            'rows'        => 6
                        )); ?>

                    </div>

                    <div class="panel-separator"></div>

                    <div class="form-group text-right">

                        <?php echo $this->Form->submit('Post', array(
                            'class' => 'btn btn-primary',
                            'div'   => false
                        )); ?>

                    </div>

                </div>

            </div>

        <?php echo $this->Form->end(); ?>

    </div>

</div>
