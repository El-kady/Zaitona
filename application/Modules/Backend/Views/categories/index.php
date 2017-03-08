<div class="ui container">
    <div class="container">

        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">
                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large browser icon"></i>
                            <div class="content">
                                <?php echo $this->text("CATEGORIES");?>
                                <!-- <div class="sub header"></div> -->
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="ui vertical segment">
                    <div class="ui small icon input right">
                        <input type="text" placeholder="输入动作名搜索……">
                        <i class="search icon"></i>
                    </div>

                    <a class="ui green small labeled icon add button" href="<?php echo $this->route(["action" => "add"]); ?>"><i class="add icon"></i> <?php echo $this->text("ADD");?></a>

                </div>
                <div class="ui form fluid vertical segment">
                    <form name="form" action="/user/actions" method="post">
                        <table class="ui basic table">
                            <thead>
                            <tr>
                                <th>动作名</th>
                                <th>类型</th>
                                <th>是否使用</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>示例动作01</td>
                                <td>电子邮件</td>
                                <td><i class="icon close"></i></td>
                                <td><a class="ui tiny blue edit button" href="./edit_action.html"><i class="edit icon"></i>编辑</a> <a class="ui tiny basic button"><i class="trash icon"></i>删除</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                    <!--the form end-->
                </div>




            </div>
        </div>
    </div>
</div>