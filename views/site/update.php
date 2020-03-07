<?php

use vendor\components\Helper;

?>
<h3>Create task</h3>
<form action="<?= Helper::createUrl('/site/create') ?>" method="post">
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">User Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" placeholder="First name" name="name"
                   value>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email"
                   value="<?= isset($task['email']) ? $task['email'] : '' ?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">Status</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status"
                       id="gridCheck1"
                       value=2 <?php if (isset($task['status']) && $task['status'] == 2) : ?> checked <?php endif; ?>>
                <label class="form-check-label" for="gridCheck1">
                    Task complete
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Task description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  name='task'><?= isset($task['task']) ? $task['task'] : '' ?></textarea>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"><?= isset($task) ? 'Update' : 'Create'; ?></button>
        </div>
    </div>
</form>