<nav class="navbar" style="background-color: #265a88; border-color: #245580;">
    <b>
        <a class="navbar-brand" href="<?php echo base_url('Maine'); ?>" style="color: white; font-size: 40px; margin-left: 5%; font-family: Comic Sans Ms;">
            Pa-poll
        </a>
    </b>
    <?php echo form_open("Maine/c_login"); ?>
    <fieldset>
        <ul class="navbar-nav navbar-right" style="margin-right: 5%;">
            <table class="table-condensed">
                <tr>
                    <td>
                        <h5 id="txtLog"><?php echo $this->lang->line('username'); ?></h5>
                    </td>
                    <td>
                        <h5 id="txtLog"><?php echo $this->lang->line('password'); ?></h5>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $txtUser = array(
                            "name"=>"txtUser",
                            "id"=>"txtUser",
                            "required"=>"required",
                            "autofocus"=>"autofocus"
                        );
                        echo form_input($txtUser, set_value("txtUser"));
                        ?>
                    </td>
                    <td>
                        <?php
                        $txtPass = array(
                            "name"=>"txtPass",
                            "id"=>"txtPass",
                            "required"=>"required"
                        );
                        echo form_password($txtPass);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo form_submit("btnLogin", $this->lang->line('login'), "class='btn-primary'");
                        ?>
                    </td>
                </tr>
            </table>
        </ul>
    </fieldset>
    <?php echo form_close();?>
</nav>
<!--<nav class="navbar navbar-default" style="background-color: #265a88; border-color: #245580;">-->
<!--    <div class="navbar-header">-->
<!--        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">-->
<!--            <span class="sr-only">Toggle navigation</span>-->
<!--            <span class="icon-bar"></span>-->
<!--            <span class="icon-bar"></span>-->
<!--            <span class="icon-bar"></span>-->
<!--        </button>-->
<!--        <b><a class="navbar-brand" href="--><?php //echo base_url("Maine"); ?><!--" id="lnkHome" style="color: white;">Home</a></b>-->
<!--    </div>-->
<!--    <ul class="nav navbar-nav">-->
<!--        <li>-->
<!--            --><?php //echo anchor("Maine/contact_us","Contact Us", "style='color: white;'"); ?>
<!--        </li>-->
<!--        <li>-->
<!--            --><?php //echo anchor("Maine/about_us","About", "style='color: white;'"); ?>
<!--        </li>-->
<!--    </ul>-->
<!---->
<!--    <ul class="nav navbar-nav navbar-right">-->
<!--        <li>-->
<!--            <a style="color: white;">-->
<!--                <em>-->
<!--                    Or click here to login as Admin ->-->
<!--                </em>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            --><?php
//            $classAdmin = array(
//                "class"=>"glyphicon glyphicon-user",
//                "style"=>"color: white",
//                "data-toggle"=>"tooltip",
//                "data-placement"=>"bottom",
//                "title"=>"Admin Login"
//            );
//            echo anchor("Maine/a_login"," ", $classAdmin);
//            ?>
<!--        </li>-->
<!--        <li><a></a></li>-->
<!--    </ul>-->
<!--    --><?php //echo form_close(); ?>
<!--</nav>-->