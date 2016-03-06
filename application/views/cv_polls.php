<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - <?php echo $this->lang->line('your_polls'); ?></title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div>
    <?php include_once 'c_header.php'; ?>
    <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
        <?php echo form_open("Contrib/view_users"); ?>
        <h3 class="alert alert-info"><?php echo $this->lang->line('created_polls'); ?></h3>
        <table class="table table-condensed table-responsive table-bordered">
            <tr class="info">
                <th>ID</th>
                <th><?php echo $this->lang->line('poll_title'); ?></th>
                <th><?php echo $this->lang->line('status'); ?></th>
                <th><?php echo $this->lang->line('date_created'); ?></th>
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
                <td>
                    <?php
                    $delete_poll = array(
                        "class"=>"glyphicon glyphicon-remove",
                        "style"=>"color: #c12e2a; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"right",
                        "title"=>$this->lang->line('delete')
                    );
                    echo anchor("Contrib/delete_poll/".$val->title_id, " ", $delete_poll);
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
<?php include_once 'footer_contrib.php'; ?>
</html>