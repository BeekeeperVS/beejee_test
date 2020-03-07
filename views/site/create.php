<?php

use models\db\Tasks;
use models\db\Users;
use vendor\components\Helper;

/**
 * @var $model Tasks
 */

?>
<h3><?= isset($model->id) ? 'Update task №' . $model->id : 'Create task'; ?></h3>
<form action="<?= ($model->id) ? Helper::createUrl("/update/{$model->id}") : Helper::createUrl('/create/') ?>"
      method="post">
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">User Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" placeholder="First name" name="name"
                   value="<?= $model->user_name ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email"
                   value="<?= $model->email ?>">
        </div>
    </div>
    <?php if (Users::isAdmin()): ?>
        <div class="form-group row">
            <div class="col-sm-2">Status</div>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status"
                           id="gridCheck1"
                           value=2 <?php if (isset($model->status) && $model->status == 2) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="gridCheck1" style="margin-left: 15px">
                        Task complete
                    </label>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Task description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  name='task'><?= isset($model->text) ? $model->text : '' ?></textarea>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"><?= $model->id ? 'Update' : 'Create'; ?></button>
        </div>
    </div>
</form>