<?php

namespace app\controllers;

use app\assets\function\EncryptDecrypt;
use app\models\Lop;
use app\models\MonHoc;
use app\models\QuanLyGiaoVien;
use app\models\search\QuanLyGiaoVienSearch;
use app\models\User;
use Yii;
use app\models\GiaoVien;
use app\models\search\GiaoVienSearch;
use yii\db\IntegrityException;
use yii\helpers\VarDumper;
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

        return $this->render('@app/views/ban_giam_hieu/giao-vien/index', [
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
                'title' => "Thông tin giáo viên",
                'content' =>$this->renderAjax('@app/views/ban_giam_hieu/giao-vien/view', [
                    'model' => $this->findViewModel($id),
                ]),
                'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                    Html::a(Yii::t('yii2-ajaxcrud', 'Update'), ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        }
        else
        {
            return $this->render('@app/views/ban_giam_hieu/giao-vien/view', [
                'model' => $this->findViewModel($id),
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
        $model = new GiaoVien();
        $modelClass = Lop::find()->all();
        $modelSubject = MonHoc::find()->all();
        $modelUser = User::find()->all();

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
                    'content' => $this->renderAjax('@app/views/ban_giam_hieu/giao-vien/create', [
                        'model' => $model,
                        'modelClass' => $modelClass,
                        'modelSubject' => $modelSubject,
                        'modelUser' => $modelUser
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
                    'content' => $this->renderAjax('@app/views/ban_giam_hieu/giao-vien/create', [
                        'model' => $model,
                        'modelClass' => $modelClass,
                        'modelSubject' => $modelSubject,
                        'modelUser' => $modelUser
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
                return $this->render('@app/views/ban_giam_hieu/giao-vien/create', [
                    'model' => $model,
                    'modelClass' => $modelClass,
                    'modelSubject' => $modelSubject,
                    'modelUser' => $modelUser
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
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $modelClass = Lop::find()->all();
        $modelSubject = MonHoc::find()->all();
        $modelUser = User::find()->all();

        if($request->isAjax)
        {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet)
            {
                return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Update')." thông tin giáo viên",
                    'content' => $this->renderAjax('@app/views/ban_giam_hieu/giao-vien/update', [
                        'model' => $model,
                        'modelClass' => $modelClass,
                        'modelSubject' => $modelSubject,
                        'modelUser' => $modelUser
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::button(Yii::t('yii2-ajaxcrud', 'Save'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            }
            else if($model->load($request->post()) && $model->save())
            {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Thông tin giáo viên",
                    'content' => $this->renderAjax('@app/views/ban_giam_hieu/giao-vien/view', [
                        'model' => $model,
                        'modelClass' => $modelClass,
                        'modelSubject' => $modelSubject,
                        'modelUser' => $modelUser
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal'])
//                        Html::a(Yii::t('yii2-ajaxcrud', 'Update'), ['update', 'id' => $id],['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                 return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Update')." thông tin giáo viên",
                    'content' => $this->renderAjax('@app/views/ban_giam_hieu/giao-vien/update', [
                        'model' => $model,
                        'modelClass' => $modelClass,
                        'modelSubject' => $modelSubject,
                        'modelUser' => $modelUser
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
                return $this->render('@app/views/ban_giam_hieu/giao-vien/update', [
                    'model' => $model,
                    'modelClass' => $modelClass,
                    'modelSubject' => $modelSubject,
                    'modelUser' => $modelUser
                ]);
            }
        }
    }
    /**
     * Updates an existing HocSinh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateCaNhan()
    {
        $id = GiaoVien::findByIdAccount(Yii::$app->user->id)->id;
        $model = $this->findPersonalModel();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['giao-vien/view-ca-nhan', 'id' => $model->id]);
        }

        return $this->render('@app/views/ban_giam_hieu/ca-nhan/update', [
            'model' => $model,
        ]);
    }
    /**
     * Displays a single HocSinh model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewCaNhan($id)
    {
        return $this->render('@app/views/ban_giam_hieu/ca-nhan/view', [
            'model' => $this->findPersonalModel(),
        ]);
    }
    /**
     * Updates an existing HocSinh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public $enableCsrfValidation = false;

    public function actionUpdateMatKhau()
    {
        $model = User::findById(Yii::$app->user->id);
        $password = \app\assets\function\EncryptDecrypt::decrypt($model->password_hash, $model->auth_key);
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) ) {
            $matKhauCu = Yii::$app->request->post('mat_khau_cu');
            $matKhauMoi = $model->password_hash;
            $repeatMatKhauMoi = Yii::$app->request->post('repeat_mat_khau_moi');
            if ($matKhauCu == $password && $matKhauMoi == $repeatMatKhauMoi) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Cập nhật mật khẩu thành công.');
                    return $this->redirect(['site/index']);
                } else {
                    Yii::$app->session->setFlash('error', 'Đã xảy ra lỗi khi cập nhật mật khẩu.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Mật khẩu cũ không đúng hoặc mật khẩu mới không khớp.');
            }
        }

        return $this->render('@app/views/ban_giam_hieu/ca-nhan/update-mat-khau', [
            'model' => $model,
        ]);
    }
    /**
     * Displays a single HocSinh model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewMatKhau($id)
    {
        return $this->render('@app/views/ban_giam_hieu/giao-vien/view', [
            'model' => $this->findPersonalModel(),
        ]);
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
        try{
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
        } catch (IntegrityException $e){
            Yii::$app->session->setFlash('error', 'Giáo viên này đang giảng dạy');
        }
        return $this->redirect(['index']);

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
    protected function findPersonalModel()
    {
        if (($model = GiaoVien::findOne(GiaoVien::findByIdAccount(Yii::$app->user->id)->id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
