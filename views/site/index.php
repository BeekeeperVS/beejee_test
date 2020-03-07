<?php

/**
 * @var $models Tasks[]
 * @var $countPage int
 * @var $perPage int
 * @var $countModels int
 */

use models\db\Tasks;
use models\db\Users;
use vendor\components\Helper;

$dataKey = ($_GET['page'] == 1) ? 0 : $perPage;
?>
<div>
    <h1>Task manager</h1>

    <p>
        <a href="<?= Helper::createUrl('/create') ?>" class="btn btn-success">Create</a>
    </p>

    <div id="w0" class="table-responsive">
        <div class="summary">Показаны записи
            <b><?= $dataKey + 1 ?>
                - <?= (($dataKey + $perPage) > $countModels) ? $countModels : ($dataKey + $perPage) ?></b> из
            <b><?= $countModels ?></b>.
        </div>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th><a href="<?= Helper::createSortableUrl('/index', ['sort' => 'user_name']) ?>"
                       data-sort="title">Name</a></th>
                <th><a href="<?= Helper::createSortableUrl('/index', ['sort' => 'email']) ?>" data-sort="cipher">Email</a>
                </th>
                <th><a href="<?= Helper::createSortableUrl('/index', ['sort' => 'text']) ?>"
                       data-sort="type_alias">Text</a></th>
                <th><a href="<?= Helper::createSortableUrl('/index', ['sort' => 'status']) ?>"
                       data-sort="type_alias">Status</a></th>
                <?php if (Users::isAdmin()): ?>
                    <th class="search-actions">Actions</th>
                <?php endif; ?>
            </tr>

            </thead>
            <tbody>
            <?php foreach ($models as $model): ?>
                <?php $dataKey++ ?>
                <tr data-key="<?= $dataKey ?>">
                    <td class="text-center"><?= $dataKey ?></td>
                    <td><?= $model->user_name ?></td>
                    <td><?= $model->email ?></td>
                    <td><?= $model->text ?></td>
                    <td><?= $model->status ? "Complete" : '' ?></td>
                    <?php if (Users::isAdmin()): ?>
                        <td class="text-center">
                            <a href="<?= Helper::createUrl('/update/' . $model->id) ?>" title="Редактировать"
                               aria-label="Редактировать"
                               data-pjax="0">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <ul class="pagination">
            <li class="prev <?= $_GET['page'] == 1 ? 'disabled' : '' ?>"><a
                        href="<?= Helper::createGetUrl('/index', ['page' => $_GET['page'] - 1]) ?>">«</a></li>
            <?php for ($i = 1; $i <= $countPage; $i++): ?>
                <li class="<?= ($i == $_GET['page']) ? 'active' : '' ?>">
                    <a href="<?= ($i != $_GET['page']) ? Helper::createGetUrl('/index', ['page' => $i]) : '#' ?>"
                       data-page="0">
                        <?= $i; ?>
                    </a>
                </li>
            <?php endfor; ?>

            <li class="next <?= $_GET['page'] == $countPage ? 'disabled' : '' ?>"><a
                        href="<?= Helper::createGetUrl('/index', ['page' => $_GET['page'] + 1]) ?>"
                        data-page="1">»</a></li>
        </ul>
    </div>
</div>