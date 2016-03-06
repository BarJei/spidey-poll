<nav class="navbar navbar-default" style="background-color: #265a88; border-color: #245580;"    >
    <div class="navbar-header" style="margin-left: 5%;">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <b><a class="navbar-brand" href="<?php echo base_url("Contrib"); ?>" id="lnkHome" style="font-family: comic sans ms;">Pa-poll</a></b>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">

            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="lnkPoll"><?php echo $this->lang->line('poll'); ?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header"><b style="color: #265a88;"><?php echo $this->lang->line('manage'); ?></b></li>
                    <li><a href="<?php echo base_url('Contrib/view_create'); ?>"><?php echo $this->lang->line('create_poll'); ?></a></li>
                    <li><a href="<?php echo base_url('Contrib/view_polls/'); ?>"><?php echo $this->lang->line('your_polls'); ?></a></li>
                </ul>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin-right: 5%;">
            <li>
                <?php
                $classUser = array(
                    "id"=>"lnkUser",
                    "data-toggle"=>"tooltip",
                    "data-placement"=>"left",
                    "title"=>$this->lang->line('contrib'),
                );
                echo anchor("Contrib/profile_view/".$user_id, $user, $classUser);
                ?>
            </li>
            <li>
                <?php
                $classLogout = array(
                    "id"=>"lnkLogout",
                    "class"=>"glyphicon glyphicon-off",
                    "data-toggle"=>"tooltip",
                    "data-placement"=>"bottom",
                    "title"=>$this->lang->line('logout')
                );
                echo anchor("Contrib/logout", " ", $classLogout);
                ?>
            </li>
        </ul>
</nav>
