<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - <?php echo $this->lang->line('polls'); ?></title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div>
    <?php include_once 'a_header.php'; ?>
    <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
        <?php echo form_open("Admin/view_users"); ?>
        <h3 class="alert alert-info">
            <?php echo $this->lang->line('created_polls'); ?>
        </h3>
        <table class="table table-condensed table-responsive table-bordered">
            <tr class="info">
                <th>ID</th>
                <th><?php echo $this->lang->line('poll_title'); ?></th>
                <th><?php echo $this->lang->line('status'); ?></th>
                <th><?php echo $this->lang->line('date_created'); ?></th>
                <th><?php echo $this->lang->line('contrib'); ?> ID</th>
                <th></th>
            </tr>
            <?php
            foreach ($polls as $key => $val){
                echo "<tr class='active'>";
                echo "<td>".$val->title_id."</td>";
                ?>
                <?php
                echo "<td>".$val->title."</td>";
                ?>
                <?php
                echo "<td>".$val->status."</td>";
                ?>
                <?php
                echo "<td>".$val->date_created."</td>";
                ?>
                <?php
                echo "<td>".$val->FK_user_id."</td>";
                ?>
                <td>
                    <?php
                    $update_poll = array(
                        "class"=>"glyphicon glyphicon-eye-open",
                        "style"=>"color: #2aabd2; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"top",
                        "title"=>$this->lang->line('open')
                    );
                    echo anchor("Admin/open_poll/".$val->title_id, " ", $update_poll);
                    ?>
                    <?php
                    $update_poll = array(
                        "class"=>"glyphicon glyphicon-eye-close",
                        "style"=>"color: #eb9316; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"top",
                        "title"=>$this->lang->line('close')
                    );
                    echo anchor("Admin/close_poll/".$val->title_id, " ", $update_poll);
                    ?>
                    <?php
                    $delete_poll = array(
                        "class"=>"glyphicon glyphicon-remove",
                        "style"=>"color: #c12e2a; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"top",
                        "title"=>$this->lang->line('delete')
                    );
                    echo anchor("Admin/delete_poll/".$val->title_id, " ", $delete_poll);
                    ?>
                    <?php
                    $csv = array(
                        "class"=>"glyphicon glyphicon-save-file",
                        "style"=>"color: #419641; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"top",
                        "title"=>$this->lang->line('save_csv')
                    );
                    echo anchor("Admin/save_csv/".$val->title_id, " ", $csv);
                    ?>
                    <!--                --><?php //echo anchor("Admin/getUserByID/".$val->ID, "Change Pic", "class='btn btn-warning'"); ?>
                </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
<?php include_once 'footer_admin.php'; ?>
</html>