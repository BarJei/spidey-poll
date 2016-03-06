<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - <?php echo $this->lang->line('add_options'); ?></title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <?php
    echo form_open("Contrib/finish_poll", "id='panel_poll_create'");
    ?>
    <div class="panel panel-default" style="border-color: #245580;">
        <legend class="panel-heading" style="font-size: 25px; background-color: #265a88; color: #ffffff;">
            <?php
            $arr_back = array(
                "class" => "glyphicon glyphicon-ok-sign",
                "style" => "color: white;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('done')
            );
            echo anchor("Contrib/", " ", $arr_back);?>
            <?php
            echo $query;
            ?>
        </legend>
        <fieldset class="panel-body">
            <table class="table-condensed table-responsive">
                <tr>
                    <td>
                        <div class="form-group">
                            <?php
                            $txtOption = array(
                                "name"=>"txtOption",
                                "id"=>"txtOption",
                                "class"=>"form-control",
                                "placeholder"=>$this->lang->line('option'),
                                "required"=>"required",
                                "autofocus"=>"autofocus",
                                "size"=>"30"
                            );
                            echo form_input($txtOption, set_value("txtOption"));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $txtOption2 = array(
                                "name"=>"txtOption2",
                                "id"=>"txtOption2",
                                "class"=>"form-control",
                                "placeholder"=>$this->lang->line('option'),
                                "required"=>"required",
                                "size"=>"30"
                            );
                            echo form_input($txtOption2, set_value("txtOption2"));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $txtOption3 = array(
                                "name"=>"txtOption3",
                                "id"=>"txtOption3",
                                "class"=>"form-control",
                                "placeholder"=>$this->lang->line('option'),
                                "required"=>"required",
                                "size"=>"30"
                            );
                            echo form_input($txtOption3, set_value("txtOption3"));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $txtOption4 = array(
                                "name"=>"txtOption4",
                                "id"=>"txtOption4",
                                "class"=>"form-control",
                                "placeholder"=>$this->lang->line('option'),
                                "required"=>"required",
                                "size"=>"30"
                            );
                            echo form_input($txtOption4, set_value("txtOption4"));
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo form_submit("btnDone", $this->lang->line('finish_q'), "class='btn btn-primary btn-block'");
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
<?php include_once 'lib_footer.php'; ?>
</html>