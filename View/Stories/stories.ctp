<div class="row">

    <div class="col-md-7">

        <?php foreach ($stories as $story): ?>

            <div class="story-wrapper">

                <h3 class="story-title">
                    <?php echo $story['Story']['title']; ?><br>
                    <small>
                        By <?php echo $story['User']['username']; ?>
                        &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $story['Story']['created']); ?>
                    </small>
                </h3>

                <img src="/stories/media?file=<?php echo $story['Story']['file']; ?>" class="story-img img-responsive img-thumbnail">

                <div class="story-text">
                    <?php echo nl2br($story['Story']['text']); ?>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <div class="col-md-5">

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

                        <?php echo $this->Form->file('Story.file_upload'); ?>

                        <small class="help-block">
                            <strong>Allowed file types:</strong> bmp, gif, jpg, jpeg
                        </small>

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
