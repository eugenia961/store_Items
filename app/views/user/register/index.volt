
<h2>Register.</h2>
<form method="POST" name='myRegisterUserForm' id='myRegisterUserForm' action="" >

    {{ flashSession.output() }}

    <div class="form-group">

        <label ><b>{{form.label("name")}}:</b></label>
        {{form.render("name")}}


        <label ><b>{{form.label("email")}}:</b></label>
        {{form.render("email")}}


        <label ><b>{{form.label("password")}}:</b></label>
        {{form.render("password")}}


        <label ><b>{{form.label("confirm_password")}}:</b></label>
        {{form.render("confirm_password")}}

        </br>
        <p><button type="submit" class="btn btn-primary">Submit</button></p>

    </div>

</form>

