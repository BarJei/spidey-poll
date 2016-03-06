<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - <?php echo $this->lang->line('create_poll'); ?></title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <?php
    echo form_open("Contrib/create_poll", "id='panel_poll_create'");
    ?>
    <div class="panel panel-default" style="border-color: #245580;">
        <legend class="panel-heading" style="font-size: 25px; background-color: #265a88; color: #ffffff;">
            <?php
            $arr_back = array(
                "class" => "glyphicon glyphicon-circle-arrow-left",
                "style" => "color: white;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('go_back')
            );
            echo anchor("Contrib/", " ", $arr_back);?>
            <?php echo $this->lang->line('create_poll'); ?>
        </legend>
        <fieldset class="panel-body">
            <table class="table-condensed table-responsive">
                <tr>
                    <thead>
                    <div class="form-group">
                        <?php
                        $txtName = array(
                            "name"=>"txtName",
                            "id"=>"txtName",
                            "class"=>"form-control",
                            "placeholder"=>$this->lang->line('poll_title'),
                            "required"=>"required",
                            "autofocus"=>"autofocus",
                            "size"=>"30"
                        );
                        echo form_input($txtName, set_value("txtName"));
                        ?>
                    </div>
                    </thead>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo form_submit("btnCreate", $this->lang->line('submit_poll'), "class='btn btn-primary btn-block'");
                        ?>
                    </td>
                </tr>
            </table>
        </fieldset>
        <?php echo form_close(); ?>
    </div>
</body>
<?php include_once 'lib_footer.php' ?>
</html>