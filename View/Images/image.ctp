<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="image-wrapper">

            <p class="text-muted">
                By <?php echo $image['User']['username']; ?>
                &bull; <?php echo $this->Time->format('M jS, Y - g:i A', $image['Image']['created']); ?>
            </p>

            <img src="/uploads/<?php echo $image['Image']['file']; ?>" class="image-img img-responsive img-thumbnail">

            <div class="image-comment">
                <?php echo nl2br($image['Image']['comment']); ?>
            </div>

        </div>

    </div>

</div>
