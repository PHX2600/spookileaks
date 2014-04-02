<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="story-wrapper">

            <p class="text-muted">
                By <?php echo $story['User']['username']; ?>
                &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $story['Story']['created']); ?>
            </p>

            <img src="/uploads/<?php echo $story['Story']['file']; ?>" class="story-img img-responsive img-thumbnail">

            <div class="story-text">
                <?php echo nl2br($story['Story']['text']); ?>
            </div>

        </div>

    </div>

</div>
