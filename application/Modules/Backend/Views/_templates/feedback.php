
<?php if (isset($this->feedback_positive)) { ?>
    <div class="ui info message">
        <i class="close icon"></i>
        <ul class="list">
            <?php foreach ($this->feedback_positive as $feedback) { ?>
                <li><?php echo $feedback; ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php if (isset($this->feedback_negative)) { ?>
    <div class="ui error message">
        <i class="close icon"></i>
        <ul class="list">
            <?php foreach ($this->feedback_negative as $feedback) { ?>
                <li><?php echo $feedback; ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>
