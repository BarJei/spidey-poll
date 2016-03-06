<table class="table-condensed table-responsive">
    <tr>
        <thead>
        <div class="form-group" style="margin-left: 2%; margin-right: 2%;">
            <?php
            $txtQ = array(
                "name"=>"txtQuestion",
                "id"=>"txtQuestion",
                "class"=>"form-control",
                "placeholder"=>"Question",
                "required"=>"required",
                "autofocus"=>"autofocus",
                "size"=>"30"
            );
            echo form_input($txtQ, set_value("txtQuestion"));
            ?>
        </div>
        </thead>
    </tr>
    <tr>
        <td>
            <?php
            $txtO = array(
                "name"=>"txtOption",
                "id"=>"txtOption",
                "class"=>"form-control",
                "placeholder"=>"Option 1",
                "required"=>"required",
                "size"=>"30"
            );
            echo form_input($txtO);
            ?>
        </td>
        <td>
            <?php
            echo form_button("btnOp", "Add Option", "class='btn btn-default btn-block'");
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $txtO = array(
                "name"=>"txtOption2",
                "id"=>"txtOption2",
                "class"=>"form-control",
                "placeholder"=>"Option 2",
                "required"=>"required",
                "size"=>"30"
            );
            echo form_input($txtO);
            ?>
        </td>
        <td>
            <?php
            echo form_button("btnOp", "Add Option", "class='btn btn-default btn-block'");
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo form_submit("btnCreate", "Create New Poll", "class='btn btn-primary btn-block'");
            ?>
        </td>
        <td>
            <?php ?>
        </td>
    </tr>
</table>