    <!DOCTYPE html>
    <html>
    <head>
        <title>
            Pa-poll - Profile
        </title>
        <?php include_once 'lib_head.php'; ?>
    </head>
    <body>
    <div class="container" style="margin-top: 10%">
        <?php
        echo form_open("Contrib/edit_profile/".$user_id, "id='panel_prof'");
        ?>
        <div class="panel panel-default" style="border-color: #245580;">
            <?php
            foreach ($user_data as $key => $val) {
                ?>
                <legend class="panel-heading" style="font-size: 25px; background-color: #265a88; color: #ffffff;">
                    <?php
                    $arr_back = array(
                        "class" => "glyphicon glyphicon-circle-arrow-left",
                        "style" => "color: white;",
                        "data-toggle" => "tooltip",
                        "data-placement" => "top",
                        "title" => $this->lang->line('go_back')
                    );
                    echo anchor("Contrib", " ", $arr_back);?>
                    <?php
                    echo $val->f_name." ".$val->l_name;
                    ?>
                </legend>
                <fieldset class="panel-body">
                    <h5>Email:</h5>
                    <?php
                    $email = array(
                        "class"=>"sr-only"
                    );
                    echo form_label($val->email, $email);
                    ?>
                    <h5>Username:</h5>
                    <?php
                    $username = array(
                        "class"=>"sr-only"
                    );
                    echo form_label($val->username, $username);?>
                    <h5>Account:</h5>
                    <?php
                    $priv = array(
                        "class"=>"sr-only"
                    );
                    echo form_label($val->priv, $priv);
                    ?>
                </fieldset>
                <?php
                echo form_submit("btnEdit", $this->lang->line('edit_prof'), "class='btn btn-info btn-block'");
                ?>
            <?php
            }
            ?>
        </div>
        <?php echo form_close(); ?>
    </div>
    </body>
    <?php include_once 'lib_footer.php' ?>
    </html>