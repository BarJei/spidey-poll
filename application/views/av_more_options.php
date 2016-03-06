<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - Add More Options</title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <?php
    echo form_open("Admin/", "id='panel_prof'");
    ?>
    <div class="panel panel-default" style="border-color: #245580;">
        <legend class="panel-heading" style="font-size: 25px; background-color: #265a88; color: #ffffff;">
            <?php
           // $arr_back = array(
              //  "class" => "glyphicon glyphicon-circle-arrow-left",
                //"style" => "color: white;",
                //"data-toggle"=>"tooltip",
                //"data-placement"=>"top",
                //"title"=>"Go Back"
            //);
            //echo anchor("Admin/view_add_options/".$query, " ", $arr_back);?>
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
                            $txtOption3 = array(
                                "name"=>"txtOption3",
                                "id"=>"txtOption3",
                                "class"=>"form-control",
                                "placeholder"=>"Option 3",
                                "required"=>"required",
                                "autofocus"=>"autofocus",
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
                                "placeholder"=>"Option 4",
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
                        echo form_submit("btnDone", "Finish Question", "class='btn btn-default btn-block'");
                        ?>
						<center>
						
						</center>
                        <?php
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