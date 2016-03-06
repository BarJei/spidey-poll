<!DOCTYPE html>
<html>
<head>
    <title>
        Pa-poll - <?php echo $this->lang->line('contrib'); ?>
    </title>
    <?php include_once 'lib_head.php' ?>
</head>
<body>
<div>
    <?php include_once 'a_header.php'; ?>
    <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
        <?php echo form_open("Admin/view_users"); ?>
        <h3 class="alert alert-info"><?php echo $this->lang->line('contrib_details'); ?></h3>
        <table class="table table-condensed table-responsive table-bordered">
            <tr class="info">
                <th>ID</th>
                <th><?php echo $this->lang->line('lname'); ?></th>
                <th><?php echo $this->lang->line('fname'); ?></th>
                <th>Username</th>
                <th>Email</th>
                <th></th>
            </tr>
            <?php
            foreach ($users as $key => $val){
                echo "<tr class='active'>";
                echo "<td>".$val->user_id."</td>";
                ?>
                <?php
                echo "<td>".$val->l_name."</td>";
                ?>
                <?php
                echo "<td>".$val->f_name."</td>";
                ?>
                <?php
                echo "<td>";
                echo anchor("Admin/profile_view/".$val->user_id, $val->username);
                echo "</td>";
                ?>
                <?php
                echo "<td>".$val->email."</td>";
                ?>
                <td>
                    <?php
                    $edit_user = array(
                        "class"=>"glyphicon glyphicon-pencil",
                        "style"=>"color: #2aabd2; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"top",
                        "title"=>$this->lang->line('edit')
                    );
                    echo anchor("Admin/edit_user/".$val->user_id, " ", $edit_user);
                    ?>
                    <?php
                    $delete_user = array(
                        "class"=>"glyphicon glyphicon-remove",
                        "style"=>"color: #c12e2a; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"top",
                        "title"=>$this->lang->line('delete')
                    );
                    echo anchor("Admin/delete_view/".$val->user_id, " ", $delete_user);
                    ?>
                    <!--                --><?php //echo anchor("Admin/getUserByID/".$val->ID, "Change Pic", "class='btn btn-warning'"); ?>
                </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>
</body>
<?php include_once 'footer_admin.php' ?>
</html>
