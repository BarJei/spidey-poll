<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - <?php echo $this->lang->line('edit_prof'); ?></title>
    <?php include_once 'lib_head.php' ?>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <?php
    echo form_open("Contrib/cp_save", "id='panel_add'");
    ?>
    <div class="panel panel-default" style="border-color: #245580;">
        <legend class="panel-heading" style="font-size: 25px; background-color: #265a88; color: #ffffff;">
            <?php
            foreach ($data as $key => $val){
            ?>
            <?php
            $arr_back = array(
                "class" => "glyphicon glyphicon-circle-arrow-left",
                "style" => "color: white;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('cancel')
            );
            echo anchor("Contrib/edit_profile/".$val->user_id, " ", $arr_back);?>
            <?php echo $this->lang->line('edit_prof'); ?>
        </legend>
        <fieldset class="panel-body">
            <table class="table-condensed table-responsive">
                <?php
                echo '<tr>';
                echo '<td>';
                $txtPass = array(
                    "name"=>"txtPass",
                    "id"=>"txtPass",
                    "class"=>"form-control",
                    "placeholder"=>"New password",
                    "required"=>"required",
                    "autofocus"=>"autofocus",
                    "size"=>"30"
                );
                echo form_password($txtPass);
                echo '</td>';
                echo '<td>';
                $txtID = array(
                    "name"=>"txtID",
                    "id"=>"txtID",
                    "class"=>"form-control hidden",
                    "required"=>"required",
                    "size"=>"30",
                    "style"=>"color: red;"
                );
                echo form_input($txtID, $val->user_id);
                echo '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>';
                echo form_submit("btnSave", "Save", "class='btn btn-success btn-block'");
                echo '</td>';
                echo '<td>';
                echo '</td>';
                echo '</tr>';
                }
                ?>
            </table>
        </fieldset>
    </div>
    <?php echo form_close(); ?>
</div>
</body>
<?php include_once 'lib_footer.php' ?>
</html>