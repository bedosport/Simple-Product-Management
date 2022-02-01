<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php if (getSession('success')) : ?>
                <div class="alert alert-success"> <?php echo successSession(); ?> </div>
            <?php endif; ?>
            <?php if ($errors = getSession('errors')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    foreach (getErrors() as  $val) {
                        echo $val . "<br>";
                    }
                    ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>