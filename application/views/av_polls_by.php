<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pa-poll - <?php echo $this->lang->line('polls'); ?></title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
<div>
    <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
        <?php echo form_open(); ?>
        <h3 class="alert alert-info">
            <?php
            $arr_back = array(
                "class" => "glyphicon glyphicon-home",
                "style" => "color: #265a88;",
                "data-toggle"=>"tooltip",
                "data-placement"=>"top",
                "title"=>$this->lang->line('home')
            );
            echo anchor("Admin/", " ", $arr_back);?>
            <?php echo $this->lang->line('created_polls')?>
        </h3>
        <table class="table table-condensed table-responsive table-bordered">
            <tr class="info">
                <th>
                    ID
                </th>
                <th>
                    Title
                </th>
                <th>
                    Status
                </th>
                <th>
                    Date Created
                </th>
                <th>

                </th>
            </tr>
            <?php
            foreach ($polls as $key => $val){
                echo "<tr class='active'>";
                ?>
                <?php
                echo "<td>$val->title_id</td>";
                echo "<td>$val->title</td>";
                echo "<td>$val->status</td>";
                echo "<td>$val->date_created</td>";
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