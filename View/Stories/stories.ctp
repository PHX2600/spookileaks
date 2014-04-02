<script type="text/javascript" src="/js/stories.js"></script>

<div class="public-story-list row">

    <div class="col-md-6">

    <?php foreach ($stories as $key => $story): ?>
        <?php if ($key % 2 === 0): ?>

            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4>
                        <a href="/stories/<?php echo $story['Story']['id']; ?>">
                            <?php echo $story['Story']['title']; ?>
                        </a><br>
                        <small>
                            By <?php echo $story['User']['username']; ?>
                            &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $story['Story']['created']); ?>
                        </small>
                    </h4>
                </div>

                <img src="/uploads/<?php echo $story['Story']['file']; ?>" class="img-responsive">

                <div class="panel-body">

                    <div class="story-text">
                        <?php if (strlen($story['Story']['text'])  > 400): ?>
                            <?php echo nl2br(substr($story['Story']['text'], 0, 400) . '...'); ?>
                        <?php else: ?>
                            <?php echo nl2br($story['Story']['text']); ?>
                        <?php endif; ?>
                    </div>

                </div>

            </div>

        <?php endif; ?>
    <?php endforeach; ?>

    </div>

    <div class="col-md-6">

        <?php foreach ($stories as $key => $story): ?>
        <?php if ($key % 2 !== 0): ?>

            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4>
                        <a href="/stories/<?php echo $story['Story']['id']; ?>">
                            <?php echo $story['Story']['title']; ?>
                        </a><br>
                        <small>
                            By <?php echo $story['User']['username']; ?>
                            &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $story['Story']['created']); ?>
                        </small>
                    </h4>
                </div>

                <img src="/uploads/<?php echo $story['Story']['file']; ?>" class="img-responsive">

                <div class="panel-body">

                    <div class="story-text">
                        <?php if (strlen($story['Story']['text'])  > 400): ?>
                            <?php echo nl2br(substr($story['Story']['text'], 0, 400) . '...'); ?>
                        <?php else: ?>
                            <?php echo nl2br($story['Story']['text']); ?>
                        <?php endif; ?>
                    </div>

                </div>

            </div>

        <?php endif; ?>
    <?php endforeach; ?>

    </div>

</div>

<?php if ($this->Session->read('Auth.User.id')): ?>
    <a href="/stories/manage" class="manage-stories-btn btn btn-success btn-sm">Manage Your Stories</a>
<?php endif; ?>
