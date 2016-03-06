<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - <?php echo $this->lang->line('del_poll'); ?></title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <?php
    echo form_open(" ", "id='panel_del'");
    ?>
    <div class="panel panel-default" style="border-color: #245580;">
        <legend class="panel-heading" style="font-size: 25px; background-color: #265a88; color: #ffffff;">
            <?php

            foreach($poll_data as $key=>$val){
            $arr_back = array(
                "class" => "glyphicon glyphicon-circle-arrow-left",
                "style" => "color: white;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('cancel')
            );
            echo anchor("Admin/view_polls", " ", $arr_back);
            ?>
            <?php
            $arr_del = array(
                "class" => "glyphicon glyphicon-ok-sign",
                "style" => "color: white;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('confirm')
            );
            echo anchor("Admin/delete_poll_na/".$val->title_id, " ", $arr_del);
            ?>
            <?php echo $this->lang->line('del_poll'); ?>
        </legend>
        <fieldset class="panel-body">
            <h4><?php echo $this->lang->line('del_sure'); ?></h4>
            <h4 style="color: #419641;">
                <?php
                echo $val->title;
                ?>
            </h4>
            <?php
            }
            ?>
        </fieldset>
    </div>
    <?php echo form_close(); ?>
</div>
</body>
<?php include_once 'lib_footer.php' ?>

</body>
</html>