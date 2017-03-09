
<div class="ui container">

    <div class="pageHeader">
        <div class="segment">
            <h3 class="ui dividing header">
                <i class="large warning sign icon"></i>
                <div class="content">
                    <?php echo $this->text("ERROR_PAGE_TITLE"); ?>
                </div>
            </h3>
        </div>
    </div>

    <div class="ui warning message">
        <i class="close icon" data-dismiss="alert"></i>
        <div class="header">
            <i class="warning icon"></i> <?php echo $this->text("ERROR_PAGE_TITLE"); ?>.
        </div>
        <?php echo $this->text("ERROR_PAGE_DESC"); ?>
    </div>
</div>


