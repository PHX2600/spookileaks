<script type="comment/javascript" src="/js/images.js"></script>

<div class="public-image-list row">

    <div class="col-md-6">

    <?php foreach ($images as $key => $image): ?>
        <?php if ($key % 2 === 0): ?>

            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4>
                        <a href="/images/<?php echo $image['Image']['id']; ?>">
                            <?php echo $image['Image']['title']; ?>
                        </a><br>
                        <small>
                            By <?php echo $image['User']['username']; ?>
                            &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $image['Image']['created']); ?>
                        </small>
                    </h4>
                </div>

                <img src="/uploads/<?php echo $image['Image']['file']; ?>" class="img-responsive">

                <?php if (!empty($image['Image']['comment'])): ?>
                    <div class="panel-body">

                        <div class="image-comment">
                            <?php echo nl2br($image['Image']['comment']); ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>

        <?php endif; ?>
    <?php endforeach; ?>

    </div>

    <div class="col-md-6">

        <?php foreach ($images as $key => $image): ?>
        <?php if ($key % 2 !== 0): ?>

            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4>
                        <a href="/images/<?php echo $image['Image']['id']; ?>">
                            <?php echo $image['Image']['title']; ?>
                        </a><br>
                        <small>
                            By <?php echo $image['User']['username']; ?>
                            &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $image['Image']['created']); ?>
                        </small>
                    </h4>
                </div>

                <img src="/uploads/<?php echo $image['Image']['file']; ?>" class="img-responsive">

                <?php if (!empty($image['Image']['comment'])): ?>
                    <div class="panel-body">

                        <div class="image-comment">
                            <?php echo nl2br($image['Image']['comment']); ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>

        <?php endif; ?>
    <?php endforeach; ?>

    </div>

</div>

<?php if ($this->Session->read('Auth.User.id')): ?>
    <a href="/images/manage" class="manage-images-btn btn btn-success btn-sm">Manage Your images</a>
<?php endif; ?>
