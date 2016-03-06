<?php 
foreach($poll_data as $key=> $val)
{
 $query_id = $val->query_id;
 $query = $val->query;
}
?>
<div class="row-fluid"> 
    <div class="box span10">
        <div class="box-header">
            <h3 class="alert alert-info">
                <?php
                $arr_back = array(
                    "class" => "glyphicon glyphicon-home",
                    "style" => "color: #265a88;",
                    "data-toggle"=>"tooltip",
                    "data-placement"=>"top",
                    "title"=>$this->lang->line('home')
                    );
                    echo anchor("Poll/view_polls", " ", $arr_back);?>
                    <?php
                    echo $this->lang->line('question');
                    ?>:
                    <?php
                    echo $query;
                    ?>
                </h3>
            </div>
            <div class="box-content" style="margin-top: 5%;">
                <ul class="skill-bar">
                    <?php
                    $query = $this->db->select_sum("vote_count")
                    ->from("tbl_sagot")
                    ->where("FK_query_id", $query_id)
                    ->get();
                    $res = $query->result();
                    $row = $res[0];
                    $total = $row->vote_count;

                    foreach($poll_data as $key=> $val)
                    {

                        if($total >0)
                        {
                            echo '<li style="list-style:none;">';
                            $percent = round((($val->vote_count / $total)*100),2);
                            echo '<h4>'.$val->label.' - '.$val->vote_count.' vote/s ( '.$percent.'% )</h4>';
                            echo '<div class="progress">';
                            echo '<div class="progress-bar" style="width: '.$percent.'%;">';
                            echo $val->vote_count.' vote/s - '.$percent.'%';
                            echo '</div>';
                            echo '</li>';
                        }
                        else
                        {
                            echo "NULL ";
                        }
                    }
                    ?>
                </ul>
            </div>  
        </div><!--/span-->

    </div><!--/row-->
