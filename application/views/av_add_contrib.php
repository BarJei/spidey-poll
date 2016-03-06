<!DOCTYPE html>
<html>
<head>
    <title>
        Pa-poll - <?php echo $this->lang->line('add_contrib'); ?>
    </title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <?php
    echo form_open("Admin/add_user", "id='panel_add'");
    ?>
    <div class="panel panel-default" style="border-color: #245580;">
        <legend class="panel-heading" style="font-size: 25px; background-color: #265a88; color: #ffffff;">
            <?php
            $arr_back = array(
                "class" => "glyphicon glyphicon-circle-arrow-left",
                "style" => "color: white;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('go_backs')
            );
            echo anchor("Admin/view_users", " ", $arr_back);?>
            <?php echo $this->lang->line('add_contrib'); ?>
        </legend>
        <fieldset class="panel-body">
            <?php
            include_once 'table_add.php';
            ?>
        </fieldset>
    </div>
    <?php echo form_close(); ?>
</div>
</body>
<?php include_once 'lib_footer.php' ?>
</html>