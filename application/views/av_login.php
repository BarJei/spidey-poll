<!DOCTYPE html>
<html>
<head>
    <title>
        Pa-poll - <?php echo $this->lang->line('admin_login'); ?>
    </title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div class="container" style="margin-top: 10%">
    <?php
    echo form_open("Maine/a_login", "class='form-signin'");
    ?>
    <div class="panel panel-default" style="border-color: #245580;">
        <legend class="panel-heading" style="font-size: 25px; background-color: #265a88; color: #ffffff;">
            <?php
            $arr_home = array(
                "class" => "glyphicon glyphicon-home",
                "style" => "color: white;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('home')
            );
            echo anchor("Maine", " ", $arr_home);?>
            <?php echo $this->lang->line('admin_login'); ?>
        </legend>
        <fieldset class="panel-body">
            <?php
            $txtUsername = array(
                "name"=>"txtUsername",
                "id"=>"txtUsername",
                "class"=>"form-control",
                "autofocus"=>"autofocus"
            );
            $txtPassword = array(
                "name"=>"txtPassword",
                "id"=>"txtPassword",
                "class"=>"form-control"
            );
            echo form_label($this->lang->line('username'),"txtUsername", "class='sr-only'");?>
            <div class="form-group">
                <?php
                echo form_input($txtUsername, set_value("txtUsername"));
                ?>
            </div>
            <?php
            echo form_error("txtUsername");
            echo form_label($this->lang->line('password'), "txtPassword", "class='sr-only'");
            ?>
            <div class="form-group">
                <?php
                echo form_password($txtPassword);
                ?>
            </div>
            <?php
            echo form_error("txtPassword");
            ?>
            <?php
            $submit = array(
                "id"=>"btnLogin",
                "name"=>"btnLogin",
                "value"=>$this->lang->line('login'),
                "class"=>"btn btn-primary",
                "style"=>"float: right;"
            );
            echo form_submit($submit);
            ?>
        </fieldset>
    </div>
    <?php echo form_close(); ?>
</div>
</body>
<?php include_once 'lib_footer.php' ?>
</html>