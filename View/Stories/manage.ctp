<script type="text/javascript" src="/js/stories.js"></script>

<div class="row">

    <div class="col-md-7">

        <?php foreach ($stories as $story): ?>


            <div class="story-wrapper panel panel-default">

                <div class="panel-heading">

                    <h4>
                        <?php echo $story['Story']['title']; ?><br>
                        <small>
                            By <?php echo $story['User']['username']; ?>
                            &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $story['Story']['created']); ?>
                        </small>
                    </h4>

                    <?php if ($story['Story']['public']): ?>
                        <div class="story-public bg-info text-info">
                            Public
                        </div>
                    <?php endif; ?>

                </div>

                <img src="/stories/media?file=<?php echo $story['Story']['file']; ?>" class="img-responsive">

                <div class="panel-body">

                    <div class="story-text">
                        <?php echo nl2br($story['Story']['text']); ?>
                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <div class="col-md-5">

        <?php echo $this->Form->create('Story', array(
            'class'   => 'submit-story-form',
            'enctype' => 'multipart/form-data'
        )); ?>

            <div class="new-story panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Add Your Story</h3>
                </div>

                <div class="panel-body">

                    <div class="form-group">

                        <h5>Story Title</h5>

                        <?php echo $this->Form->text('title', array(
                            'class'       => 'story-title-input form-control input-lg',
                            'placeholder' => 'Title',
                        )); ?>

                    </div>

                    <div class="form-group">

                        <h5>Story Image</h5>

                        <?php echo $this->Form->file('Story.file_upload', array(
                            'class' => 'story-file-upload-input'
                        )); ?>

                        <?php echo $this->Form->hidden('file_hash', array(
                            'class' => 'story-file-hash-input'
                        )); ?>

                        <small class="help-block">
                            <strong>Allowed file types:</strong> png, gif, jpg, jpeg, bmp
                        </small>

                    </div>

                    <div class="form-group">

                        <h5>Story Text</h5>

                        <?php echo $this->Form->textarea('text', array(
                            'class'       => 'story-text-input form-control',
                            'placeholder' => 'Story Text',
                            'rows'        => 6
                        )); ?>

                    </div>

                    <div class="panel-separator"></div>

                    <label class="checkbox checkbox-inline pull-left">
                        <?php echo $this->Form->checkbox('public', array(
                            'class'       => 'story-public-input',
                            'hiddenField' => false
                        )); ?>
                        Public
                    </label>

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
