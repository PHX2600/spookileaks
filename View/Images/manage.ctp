<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/images.js"></script>

<div class="row">

    <div class="col-md-7">

        <?php foreach ($images as $image): ?>


            <div class="image-wrapper panel panel-default">

                <div class="panel-heading">

                    <h4>
                        <?php echo $image['Image']['title']; ?><br>
                        <small>
                            By <?php echo $image['User']['username']; ?>
                            &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $image['Image']['created']); ?>
                        </small>
                    </h4>

                    <div class="image-meta">

                        <?php if ($image['Image']['public']): ?>
                            <div class="image-public bg-info text-info">
                                Public
                            </div>
                        <?php endif; ?>

                        <a href="/images/delete/<?php echo $image['Image']['id']; ?>" class="image-delete" title="Delete" rel="tooltip" data-container="body" data-placement="right">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>

                    </div>

                </div>

                <img src="/images/media?file=<?php echo $image['Image']['file']; ?>" class="img-responsive">

                <?php if (!empty($image['Image']['comment'])): ?>
                    <div class="panel-body">

                        <div class="image-comment">
                            <?php echo nl2br($image['Image']['comment']); ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>

    <div class="col-md-5">

        <?php echo $this->Form->create('Image', array(
            'class'   => 'submit-image-form',
            'enctype' => 'multipart/form-data'
        )); ?>

            <div class="new-image panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Add Your Image</h3>
                </div>

                <div class="panel-body">

                    <div class="form-group">

                        <h5>Title</h5>

                        <?php echo $this->Form->text('title', array(
                            'class'       => 'image-title-input form-control input-lg',
                            'placeholder' => 'Title',
                        )); ?>

                    </div>

                    <div class="form-group">

                        <h5>Image</h5>

                        <?php echo $this->Form->file('Image.file_upload', array(
                            'class' => 'image-file-upload-input'
                        )); ?>

                        <?php echo $this->Form->hidden('file_hash', array(
                            'class' => 'image-file-hash-input'
                        )); ?>

                        <small class="help-block">
                            <strong>Allowed file types:</strong> png, gif, jpg, jpeg, bmp
                        </small>

                    </div>

                    <div class="form-group">

                        <h5>Comment</h5>

                        <?php echo $this->Form->textarea('comment', array(
                            'class'       => 'image-comment-input form-control',
                            'placeholder' => 'Comments',
                            'rows'        => 6
                        )); ?>

                    </div>

                    <div class="panel-separator"></div>

                    <label class="checkbox checkbox-inline pull-left">
                        <?php echo $this->Form->checkbox('public', array(
                            'class'       => 'image-public-input',
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
