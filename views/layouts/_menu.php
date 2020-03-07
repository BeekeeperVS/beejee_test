<?php

use app\components\identity\Identity;
use app\components\RoleTypeEnum;
use yii\helpers\Url;

/**@var $identity Identity */

?>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li class="treeview"><a class="app-menu__item" href="<?= '/' ?>">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label"><?= 'Task' ?></span>
            </a>
        </li>
<!--        <li class="treeview"><a class="app-menu__item" href="--><?//= '#' ?><!--">-->
<!--                <i class="app-menu__icon fa fa-th-list"></i>-->
<!--                <span class="app-menu__label">--><?//= 'User Page' ?><!--</span>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li class="treeview"><a class="app-menu__item" href="--><?//= '#' ?><!--">-->
<!--                <i class="app-menu__icon fa fa-th-list"></i>-->
<!--                <span class="app-menu__label">--><?//= 'User Page' ?><!--</span>-->
<!--            </a>-->
<!--        </li>-->
    </ul>
</aside>