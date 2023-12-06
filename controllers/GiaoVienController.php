<?php

namespace app\controllers;

use app\models\Lop;
use app\models\MonHoc;
use app\models\QuanLyGiaoVien;
use app\models\Role;
use app\models\search\QuanLyGiaoVienSearch;
use app\models\User;
use Yii;
use app\models\GiaoVien;
use app\models\search\GiaoVienSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * GiaoVienController implements the CRUD actions for GiaoVien model.
 */
class GiaoVienController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulkdelete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all GiaoVien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuanLyGiaoVienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single GiaoVien model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "GiaoVien #".$id,
                'content' =>$this->renderAjax('view', [
                    'model' => $this->findViewModel(['id' => $id]),
                ]),
                'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                    Html::a(Yii::t('yii2-ajaxcrud', 'Update'), ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        }
        else
        {
            return $this->render('view', [
                'model' => $this->findViewModel(['id' => $id]),
            ]);
        }
    }

    /**
     * Creates a new GiaoVien model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new QuanLyGiaoVien();

        if($request->isAjax)
        {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet)
            {
                return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Create New')." GiaoVien",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::button(Yii::t('yii2-ajaxcrud', 'Create'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            }
            else if($model->load($request->post()) && $model->save())
            {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => Yii::t('yii2-ajaxcrud', 'Create New')." GiaoVien",
                    'content' => '<span class="text-success">'.Yii::t('yii2-ajaxcrud', 'Create').' GiaoVien '.Yii::t('yii2-ajaxcrud', 'Success').'</span>',
                    'footer' =>  Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::a(Yii::t('yii2-ajaxcrud', 'Create More'), ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Create New')." GiaoVien",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::button(Yii::t('yii2-ajaxcrud', 'Save'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            }
        }
        else
        {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    /**
     * Updates an existing GiaoVien model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $viewModel = $this->findViewModel($id);
        $model = $this -> findModel($id);
//        $lopModel = $this -> findClassModel(Lop::findOne(['ten_lop' => $viewModel->ten_lop])->id);
        $lopModel = (Lop::find()->all());
        $monModel = MonHoc::find()->all();
        $userModel = User::find()->all();
        $request = Yii::$app->request;

        if($request->isAjax)
        {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet)
            {
                return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Update')." GiaoVien #".$id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'viewModel' => $viewModel,
                        'lopModel' => $lopModel,
                        'monModel' => $monModel,
                        'userModel' => $userModel,
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::button(Yii::t('yii2-ajaxcrud', 'Save'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            }
            else if($model->load($request->post()) && $model->save())
            {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "GiaoVien #".$id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                        'viewModel' => $viewModel,
                        'lopModel' => $lopModel,
                        'monModel' => $monModel,
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal'])
//                        Html::a(Yii::t('yii2-ajaxcrud', 'Update'), ['update', 'id' => $id],['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                 return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Update')." GiaoVien #".$id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'viewModel' => $viewModel,
                        'lopModel' => $lopModel,
                        'monModel' => $monModel,
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::button(Yii::t('yii2-ajaxcrud', 'Save'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            }
        }
        else
        {
            /*
            *   Process for non-ajax request
            */
            if ($viewModel->load($request->post()) && $viewModel->save())
            {
                return $this->redirect(['view', 'id' => $viewModel->id]);
            }
            else
            {
                return $this->render('update', [
                    'viewModel' => $viewModel,
                ]);
            }
        }
    }

    /**
     * Delete an existing GiaoVien model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax)
        {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }
        else
        {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

     /**
     * Delete multiple existing GiaoVien model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk )
        {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax)
        {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }
        else
        {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the GiaoVien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GiaoVien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GiaoVien::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findViewModel($id)
    {
        if (($model = QuanLyGiaoVien::findOne(['id' => $id])) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findClassModel($id)
    {
        if (($model = Lop::findOne(['id' => $id])) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findSubjectModel($id)
    {
        if (($model = MonHoc::findOne(['id' => $id])) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findRoleModel($id)
    {
        if (($model = Role::findOne(['id' => $id])) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
