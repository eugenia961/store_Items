
<h2>Login.</h2>
<form method="POST" name='myForm' id='myForm' action="" >

    <?= $this->flashSession->output() ?>

    <div class="form-group">

        <label ><b><?= $form->label('email') ?>:</b></label>
        <?= $form->render('email') ?>


        <label ><b><?= $form->label('password') ?>:</b></label>
        <?= $form->render('password') ?>

        </br>
        <p><button type="submit" class="btn btn-danger">Submit</button></p>

    </div>


</form>
