<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - <?php echo $this->lang->line('add_question'); ?></title>
    <?php include_once 'lib_head.php' ?>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <?php
    echo form_open("Admin/add_question", "id='panel_poll_create'");
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
            echo anchor("Admin/view_create", " ", $arr_back);?>
            <?php
            $arr_cancel = array(
                "class" => "glyphicon glyphicon-ok-sign",
                "style" => "color: white;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('done')
            );
            echo anchor("Admin/view_polls", " ", $arr_cancel);?>
            <?php echo $this->lang->line('add_question'); ?>
        </legend>
        <fieldset class="panel-body">
            <table class="table-condensed table-responsive">
                <tr>
                    <thead>
                    <div class="form-group">
                        <?php
                        $txtQuestion = array(
                            "name"=>"txtQuestion",
                            "id"=>"txtQuestion",
                            "class"=>"form-control",
                            "placeholder"=>$this->lang->line('question'),
                            "required"=>"required",
                            "autofocus"=>"autofocus",
                            "size"=>"30"
                        );
                        echo form_input($txtQuestion, set_value("txtQuestion"));
                        ?>
                    </div>
                    </thead>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo form_submit("btnAdd", $this->lang->line('submit_q'), "class='btn btn-primary btn-block'");
                        ?>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
    <?
    echo form_close();
    ?>
</div>
</body>
<?php include_once 'lib_footer.php' ?>
</html>