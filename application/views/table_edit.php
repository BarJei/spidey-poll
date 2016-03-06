<table class="table-condensed table-responsive">
    <?php
    foreach ($data as $key => $val){
        echo '<tr>';
        echo '<td>';
        $txtFname = array(
            "name"=>"txtFirstName",
            "id"=>"txtFirstName",
            "class"=>"form-control",
            "placeholder"=>"First Name",
            "required"=>"required",
            "autofocus"=>"autofocus",
            "size"=>"30"
        );
        echo form_input($txtFname, $val->f_name);
        echo '</td>';
        echo '<td>';
        $txtLname = array(
            "name"=>"txtLastName",
            "id"=>"txtLastName",
            "class"=>"form-control",
            "placeholder"=>"Last Name",
            "required"=>"required",
            "size"=>"30"
        );
        echo form_input($txtLname, $val->l_name);
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        $txtEmail = array(
            "name"=>"txtEmail",
            "id"=>"txtEmail",
            "class"=>"form-control",
            "placeholder"=>"Email",
            "required"=>"required",
            "size"=>"30"
        );
        echo form_input($txtEmail, $val->email);
        echo '</td>';
        echo '<td>';
        $txtID = array(
            "name"=>"txtID",
            "id"=>"txtID",
            "class"=>"form-control hidden",
            "placeholder"=>"Do not edit",
            "required"=>"required",
            "size"=>"30",
            "style"=>"color: red;"
        );
        echo form_input($txtID, $val->user_id);
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo form_submit("btnSave", "Save", "class='btn btn-success btn-block'");
//        echo anchor("Admin/edit_save/".$val->user_id, "Save", "class='btn btn-success btn-block'");
        echo '</td>';
        echo '<td>';
        echo anchor("Admin/change_pass/".$val->user_id, "Change Password", "class='btn btn-default btn-block'");
        echo '</td>';
        echo '</tr>';
    }
    ?>
</table>