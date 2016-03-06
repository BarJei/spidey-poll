<table class="table-condensed table-responsive">
    <tr>
        <td>
            <?php
            $txtFname = array(
                "name"=>"txtFirstName",
                "id"=>"txtFirstName",
                "class"=>"form-control",
                "placeholder"=>$this->lang->line('fname'),
                "required"=>"required",
                "autofocus"=>"autofocus",
                "size"=>"30"
            );
            echo form_input($txtFname, set_value("txtFirstName"));
            ?>
        </td>
        <td>
            <?php
            $txtLname = array(
                "name"=>"txtLastName",
                "id"=>"txtLastName",
                "class"=>"form-control",
                "placeholder"=>$this->lang->line('lname'),
                "required"=>"required",
                "size"=>"30"
            );
            echo form_input($txtLname, set_value("txtLastName"));
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $txtEmail = array(
                "name"=>"txtEmail",
                "id"=>"txtEmail",
                "class"=>"form-control",
                "placeholder"=>"Email",
                "required"=>"required",
                "size"=>"30"
            );
            echo form_input($txtEmail, set_value("txtEmail"));
            ?>
        </td>
        <td>
            <?php
            $txtUsername = array(
                "name"=>"txtUsername",
                "id"=>"txtUsername",
                "class"=>"form-control",
                "placeholder"=>"Username",
                "required"=>"required",
                "size"=>"30"
            );
            echo form_input($txtUsername, set_value("txtUsername"));
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $txtPassword = array(
                "name"=>"txtPassword",
                "id"=>"txtPassword",
                "class"=>"form-control",
                "placeholder"=>$this->lang->line('password'),
                "required"=>"required",
                "size"=>"30"
            );
            echo form_password($txtPassword);
            ?>
        </td>
        <td>
            <h5><?php echo $this->lang->line('min_char'); ?></h5>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo form_submit("btnReg", $this->lang->line('sign_up'), "class='btn btn-success btn-block'");
            ?>
        </td>
        <td>
            <?php ?>
        </td>
    </tr>
</table>