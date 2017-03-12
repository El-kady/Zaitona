<div class="ui container">
    <div class="container">

        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">

                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large industry icon"></i>
                            <div class="content">
                                Statistics
                            </div>
                        </h3>
                    </div>
                </div>


                <div class="ui stackable four column grid">
                    <div class="column">
                        <div class="ui segments">
                            <div class="ui secondary olive green inverted dashboard center aligned segment">
                                <div class="ui dashboard statistic">
                                    <div class="value">
                                        <?php echo number_format($this->get("users",0)); ?>
                                    </div>
                                    <div class="label">
                                        Memberships
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="ui segments">
                            <div class="ui secondary violet green inverted dashboard center aligned segment">
                                <div class="ui dashboard statistic">
                                    <div class="value">
                                        <?php echo number_format($this->get("courses",0)); ?>
                                    </div>
                                    <div class="label">
                                        courses
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="ui segments">
                            <div class="ui secondary teal green inverted dashboard center aligned segment">
                                <div class="ui dashboard statistic">
                                    <div class="value">
                                        <?php echo number_format($this->get("materials",0)); ?>
                                    </div>
                                    <div class="label">
                                        Materials
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="ui segments">
                            <div class="ui secondary blue green inverted dashboard center aligned segment">
                                <div class="ui dashboard statistic">
                                    <div class="value">
                                        <?php echo number_format($this->get("downloads",0)); ?>
                                    </div>
                                    <div class="label">
                                        HITS
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
