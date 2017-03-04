<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Log-in to your account
            </div>
        </h2>
        <form method="post" action="<?php echo $this->route(["action" => "login"]); ?>" class="ui large form">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="email" placeholder="E-mail address">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                </div>
                <button class="ui fluid large teal submit button">Login</button>
            </div>

            <div class="ui error message"></div>

        </form>

        <?php $this->renderFeedbackMessages(); ?>

        <div class="ui message">
            New to us? <a href="#">Sign Up</a>
        </div>
    </div>
</div>


