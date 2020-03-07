<?php


namespace controllers;


use models\db\Tasks;
use models\db\Users;
use vendor\components\BaseController;

class SiteController extends BaseController
{
    public function actionIndex()
    {
        $modelsQuery = Tasks::query()->select();

        if (isset($_GET['sort'])) {
            $sort = explode('-', $_GET['sort']);
            if (count($sort) > 1) {
                $modelsQuery = $modelsQuery->sort(end($sort), 'DESC');
            } else {
                $modelsQuery = $modelsQuery->sort(end($sort));
            }
        }

        $perPage = $_GET['per-page'] ?? 3;
        if (isset($perPage)) {
            $page = $_GET['page'] ?? 1;
            $offset = $perPage * ($page - 1);

            $modelsQuery = $modelsQuery->limit($perPage)->offset($offset);
        }

        $models = $modelsQuery->all();
        $countModels = Tasks::query()->count();
        $indexPage = ($countModels % $perPage) ? 1 : 0;
        $countPage = floor($countModels / $perPage) + $indexPage;

        return $this->render('index', [
            'models' => $models,
            'countPage' => $countPage,
            'perPage' => $perPage,
            'countModels' => $countModels
        ]);
    }

    public function actionCreate()
    {

        $model = new Tasks();
        if (!empty($_POST)) {
            $model->user_name = $_POST['name'];
            $model->email = $_POST['email'];
            $model->text = $_POST['task'];
            $model->status = isset($_POST['status']) ? $_POST['status'] : 0;
            $model->save();
            header('Location: /index');
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        if (!Users::isAdmin()) {
            header('Location: /index');
        }
        $model = Tasks::query()->selectById($id);
        if (!empty($_POST)) {
            $model = new Tasks();
            $model->id = $id;
            $model->user_name = $_POST['name'];
            $model->email = $_POST['email'];
            $model->text = $_POST['task'];
            $model->status = isset($_POST['status']) ? $_POST['status'] : 0;
            $model->save();
            header('Location: /index');
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionLogin()
    {
        if (isset($_POST['login']) && isset($_POST['password']) && Users::validate($_POST['login'], $_POST['password'])) {
            $_SESSION['auth'] = true;
            header('Location: /index');
        } else {
            return $this->render('login');
        }
    }

    public function actionLogout()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth']) {
            $_SESSION['auth'] = false;
            header('Location: /index');
        }
    }
}