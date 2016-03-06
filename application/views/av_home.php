<!DOCTYPE html>
<html>
<head>
    <title>
        Pa-poll - <?php echo $this->lang->line('admin'); ?>
    </title>
    <?php include_once 'lib_head.php' ?>
</head>
<body>
<div>
    <?php include_once 'a_header.php'; ?>
    <div style="margin-left: 5%; margin-right: 5%;">
        <div class="row">
            <div class="col-sm-8">
                <h3 class="alert alert-info"><?php echo $this->lang->line('poll_list'); ?></h3>
                <table class="table table-responsive">
                    <tr class="info">
                        <th>
                            <?php echo $this->lang->line('poll_title'); ?>
                            <?php
                            $arrView_poll = array(
                                "class" => "glyphicon glyphicon-eye-open",
                                "style" => "color: #2aabd2; float: right; font-size: 25px;",
                                "data-toggle"=>"tooltip",
                                "data-placement"=>"top",
                                "title"=>$this->lang->line('view_all_poll')
                            );
                            echo anchor("Admin/view_polls", " ", $arrView_poll);
                            ?>
                            <?php
                            $arrAdd_poll = array(
                                "class" => "glyphicon glyphicon-plus-sign",
                                "style" => "color: #419641; float: right; font-size: 25px;",
                                "data-toggle"=>"tooltip",
                                "data-placement"=>"top",
                                "title"=>$this->lang->line('create_poll')
                            );
                            echo anchor("Admin/view_create", " ", $arrAdd_poll);
                            ?>
                        </th>
                    </tr>
                    <?php
                    foreach ($polls as $key => $val){
                        echo "<tr class='active'>";
                        echo "<td>";
                        echo $val->title;
//                        echo anchor("Admin/poll_view/".$val->title_id, $val->title);
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-sm-4">
                <h3 class="alert alert-info"><?php echo $this->lang->line('contribs'); ?></h3>
                <table class="table table-responsive">
                    <tr class="info">
                        <th>
                            <?php echo $this->lang->line('username'); ?>
                            <?php
                            $arrView = array(
                                "class" => "glyphicon glyphicon-eye-open",
                                "style" => "color: #2aabd2; float: right; font-size: 25px;",
                                "data-toggle"=>"tooltip",
                                "data-placement"=>"top",
                                "title"=>$this->lang->line('view_all_poll')
                            );
                            echo anchor("Admin/view_users", " ", $arrView);
                            ?>
                            <?php
                            $arrAdd = array(
                                "class" => "glyphicon glyphicon-plus-sign",
                                "style" => "color: #419641; float: right; font-size: 25px;",
                                "data-toggle"=>"tooltip",
                                "data-placement"=>"top",
                                "title"=>$this->lang->line('add_contrib')
                            );
                            echo anchor("Admin/reg_user", " ", $arrAdd);
                            ?>
                        </th>
                    </tr>
                    <?php
                    foreach ($users as $key => $val){
                        echo "<tr class='active'>";
                        echo "<td>";
                        echo anchor("Admin/profile_view/".$val->user_id, $val->username);
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<?php include_once 'footer_admin.php' ?>
</html>