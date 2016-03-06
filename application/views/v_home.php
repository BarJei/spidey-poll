<!DOCTYPE html>
<html>
<head>
    <title>
        Pa-poll - <?php echo $this->lang->line('home'); ?>
    </title>
    <?php include_once 'lib_head.php' ?>
</head>
<body>
<div>
    <?php include_once 'header.php'; ?>
    <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
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
                            echo anchor("Poll/view_polls", " ", $arrView_poll);
                            ?>
                        </th>
                    </tr>
                    <?php
                    foreach ($polls as $key => $val){
                        echo "<tr class='active'>";
                        echo "<td>";
                        echo anchor("Poll/get_questions/".$val->title_id, $val->title);
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</div>
</body>
<?php include_once 'footer_home.php' ?>
</html>
