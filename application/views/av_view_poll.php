<!DOCTYPE html>
<html>
<head>
    <title>Pa-poll - Polls</title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div>
    <?php include_once 'a_header.php'; ?>
    <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
        <?php echo form_open("Admin/view_users"); ?>
        <h3 class="alert alert-info">Created Polls</h3>
        <table class="table table-condensed table-responsive table-bordered">
            <tr class="info">
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Creator</th>
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
                echo "<td>".$val->close."</td>";
                ?>
                <?php
                echo "<td>".$val->date_created."</td>";
                ?>
                <?php
                echo "<td>".$val->FK_username."</td>";
                ?>
                <td>
                    <?php
                    $update_poll = array(
                        "class"=>"glyphicon glyphicon-pencil",
                        "style"=>"color: #2aabd2; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"left",
                        "title"=>"Edit"
                    );
                    echo anchor("Admin/update_poll/".$val->title_id, " ", $update_poll);
                    ?>
                    <?php
                    $delete_poll = array(
                        "class"=>"glyphicon glyphicon-remove",
                        "style"=>"color: #c12e2a; font-size: 25px;",
                        "data-toggle"=>"tooltip",
                        "data-placement"=>"right",
                        "title"=>"Delete"
                    );
                    echo anchor("Admin/delete_poll/".$val->title_id, " ", $delete_poll);
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
<?php include_once 'lib_footer.php'; ?>
</html>