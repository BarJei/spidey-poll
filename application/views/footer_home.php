<footer class="footer navbar-fixed-bottom">
    <div style="margin-right: 5%; float: right;">
        <table class="table-condensed table-responsive">
            <tr>
                <td>
                    <?php echo anchor("Maine/a_login", $this->lang->line('admin')); ?>
                </td>
                <td>
                    <?php echo anchor("Maine/about_us", $this->lang->line('about')); ?>
                </td>
                <td>
                    <?php echo anchor("Maine/contact_us", $this->lang->line('contact')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo anchor("Maine/eng", "English", array("id"=>"lang")); ?>
                </td>
                <td>
                    <?php echo anchor("Maine/fil", "Filipino", array("id"=>"lang")); ?>
                </td>
                <td>
                    Team Jobs &copy; 2015
                </td>
            </tr>
        </table>
    </div>
</footer>
<?php include_once "lib_footer.php"; ?>