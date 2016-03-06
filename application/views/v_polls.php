<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pa-poll - <?php echo $this->lang->line('polls'); ?></title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body>
    <div>
        <div class="container-fluid" style="margin-left: 20%; margin-right: 20%;">
            <?php echo form_open("Poll/answer_poll"); ?>
            <h3 class="alert alert-info">
                <?php
                $arr_back = array(
                    "class" => "glyphicon glyphicon-home",
                    "style" => "color: #265a88;",
                    "data-toggle"=>"tooltip",
                    "data-placement"=>"top",
                    "title"=>$this->lang->line('home')
                    );
                    echo anchor("Maine/", " ", $arr_back);?>
                    <?php echo $this->lang->line('created_polls'); ?>
                </h3>
                <table class="table table-condensed table-responsive table-bordered">
                    <tr class="info">
                        <th>
                            <?php echo $this->lang->line('poll_title'); ?>
                        </th>
                        <!-- <th></th> -->
                    </tr>
                    <?php
                    foreach ($polls as $key => $val){
                        echo "<tr class='active'>";
                        ?>
                        <?php
                        echo "<td>";
                        echo anchor("Poll/get_questions/".$val->title_id, $val->title);
                        echo "</td>";
                // echo "<td>";
                // $view = array(
                //     "class"=>"glyphicon glyphicon-thumbs-up",
                //     "style"=>"color: #2aabd2; font-size: 25px;",
                //     "data-toggle"=>"tooltip",
                //     "data-placement"=>"top",
                //     "title"=>$this->lang->line('view_votes')
                // );
                // echo anchor("Poll/get_tally/".$val->title_id, " ", $view);
                // echo "</td>";
                        ?>
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