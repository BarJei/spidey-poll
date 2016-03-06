<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pa-poll - <?php echo $this->lang->line('vote'); ?> </title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body >
    <div style="margin-top: 5%;">
        <div class="container-fluid" style="margin-left: 30%; margin-right: 30%;">
            <?php
            echo form_open("Poll/vote_poll");
            ?>

            <h3 class="alert alert-info">
                <?php
                // $arr_back = array(
                //     "class" => "glyphicon glyphicon-circle-arrow-left",
                //     "style" => "color: #265a88;",
                //     "data-toggle"=>"tooltip",
                //     "data-placement"=>"top",
                //     "title"=>$this->lang->line('go_back')
                //     );
                foreach ($poll_data as $key => $value) {
                    // echo anchor("Poll/answer_poll/".$value->title_id, " ", $arr_back);
                    // ?>
                    <?php
                    echo $value->title;
                }
                ?>
            </h3>

            <?php
            $q_id = null;
            $nFID;
            $query_f = 0;
            $count = 0;
            foreach($query as $key => $val) {
                $count += 1;
            }
            if($count > 0){
                foreach($query as $key => $val){
                    $q_id = $val->query_id;
                    $arr_opt = array(
                        "name"=>"option",
                        "id"=>"option",
                        "value" => $val->label
                        );

                    $query_s = $val->query_id;

                    $arr_query = array(
                        "name"=>"query",
                        "value"=>"query"
                        );

                    if($query_s == $query_f){
                        echo "<tr class='active'>";
                        echo "<td>" . form_radio($arr_opt).$val->label."</td>";
                        echo "</tr>";
                    }else{
                        echo "</table>";
                        echo form_close();
                        echo form_open("Poll/poll_vote", $arr_query);
                        echo "<table class='table table-condensed table-responsive table-bordered'>";
                        echo "<tr class='info' style='text-align: right;'>";
                        echo "<th>" . $val->query."</th>";
                        echo "</tr>";
                        echo "<tr class='active'>";
                        echo "<td>" . form_radio($arr_opt).$val->label."</td>";
                        echo "</tr>";
                    }
                    $query_f = $query_s;
                }
                ?>
                <tr>
                    <td style="float: right;">
                        <?php
                        $arr_btn = array(
                            "id"=>"btnNext",
                            "name"=>"btnNext",
                            "value"=>$this->lang->line('next_q'),
                            "class"=>"btn btn-success"
                            );
                        echo form_submit($arr_btn);
                        ?>
                    </td>
                </tr>
                <?php
            }
            else{
                echo anchor("Poll/view_polls", $this->lang->line('vote_done'));
            }
            ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</body>
<?php include_once 'lib_footer.php'; ?>
</html>