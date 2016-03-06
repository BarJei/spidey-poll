<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pa-poll - <?php echo $this->lang->line('answer_a_poll'); ?></title>
    <?php include_once 'lib_head.php'; ?>
</head>
<body >
    <div style="margin-top: 5%;">
        <div class="container-fluid" style="margin-left: 30%; margin-right: 30%;">
            <?php
            echo form_open("Poll/answer_poll");
            ?>
            <h3 class="alert alert-info">
                <?php
                $arr_back = array(
                    "class" => "glyphicon glyphicon-circle-arrow-left",
                    "style" => "color: #265a88;",
                    "data-toggle"=>"tooltip",
                    "data-placement"=>"top",
                    "title"=>$this->lang->line('go_back')
                    );
                    echo anchor("Poll/view_polls", " ", $arr_back);?>
                    <?php
                    foreach ($poll_data as $key => $value) {
                        echo $value->title;
                    }
                    ?>
                </h3>
                <table class="table table-condensed table-responsive table-bordered">
                    <?php
                    $q_id = " ";
                    $q = 0;
                    ?>
                    <tr class="info">
                        <th><?php echo $this->lang->line('questions'); ?></th>
                        <td></td>
                    </tr>
                    <?php
                    foreach ($data as $key => $val){
                        echo "<tr class='active'>";
                        echo "<td>";
                        echo $val->query;
                        echo "</td>";
                        ?>
                        <td style="width: 10%;">
                            <?php 
                            $view = array(
                                "class"=>"glyphicon glyphicon-thumbs-up",
                                "style"=>"color: #2aabd2; font-size: 25px;",
                                "data-toggle"=>"tooltip",
                                "data-placement"=>"top",
                                "title"=>$this->lang->line('view_votes')
                                );
                            echo anchor("Poll/get_tally/".$val->query_id, " ", $view);
                            ?>
                        </td>
                        <?php
                        echo "</tr>";
                        if($q != 0){
                        }
                        else{
                            $q_id = $val->query_id;
                        }
                        $q++;
                    }
                    if($q_id == " "){
                        echo "<tr><td>";
                        echo anchor("Poll", "No questions available in this poll, try another.");
                        echo "</td></tr>";
                    }
                    else{
                        ?>
                        <tr>
                            <td></td>
                            <td>
                                <?php
                                $submit = array(
                                    "class"=>"btn btn-default",
                                    "style"=>"float: right;"
                                    );
                                echo anchor("Poll/answer_poll/".$q_id, $this->lang->line('answer_poll'), $submit );
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
    </body>
    <?php include_once 'lib_footer.php'; ?>
    </html>