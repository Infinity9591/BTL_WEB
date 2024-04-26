<?php

namespace app\controllers;

use app\models\BangDiemTiengAnh;
use app\models\BangDiemTiengViet;
use app\models\BangDiemToan;
use app\models\GiaoVien;
use app\models\Lop;
use app\models\QuanLyHocSinh;
use app\models\search\QuanLyChiTietDiemHocSinhSearch;
use app\models\search\QuanLyHocSinhSearch;
use app\models\User;
use Yii;
use app\models\HocSinh;
use app\models\search\HocSinhSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * HocSinhController implements the CRUD actions for HocSinh model.
 */
class HocSinhController extends Controller
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
     * Lists all HocSinh models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuanLyHocSinhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('@app/views/giao_vien_chu_nhiem/hoc-sinh/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all HocSinh models.
     * @return mixed
     */
    public function actionIndexMark()
    {
        $searchModel = new QuanLyChiTietDiemHocSinhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (User::findIdentity(Yii::$app->user->id)->ma_role == 2){
            return $this->render('@app/views/giao_vien_chu_nhiem/hoc-sinh/index-mark', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else if (User::findIdentity(Yii::$app->user->id)->ma_role == 3){
            return $this->render('@app/views/giao_vien_bo_mon/hoc-sinh/index-mark', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }


    /**
     * Displays a single HocSinh model.
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
                'title' => "Thông tin học sinh ",
                'content' =>$this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/view', [
                    'model' => $this->findViewModel($id),
                ]),
                'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                    Html::a(Yii::t('yii2-ajaxcrud', 'Update'), ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        }
        else
        {
            return $this->render('@app/views/giao_vien_chu_nhiem/hoc-sinh/view', [
                'model' => $this->findViewModel($id),
            ]);
        }
    }

    /**
     * Creates a new HocSinh model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new HocSinh();
        $modelClass = Lop::find()->select('id')->where(['id' => GiaoVien::findById(Yii::$app->user->id)->ma_lop])->scalar();

        if($request->isAjax)
        {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet)
            {
                return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Create New')." HocSinh",
                    'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/create', [
                        'model' => $model,
                        'modelClass' => $modelClass,
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::button(Yii::t('yii2-ajaxcrud', 'Create'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            }
            else if($model->load($request->post()) && $model->save())
            {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => Yii::t('yii2-ajaxcrud', 'Create New')." HocSinh",
                    'content' => '<span class="text-success">'.Yii::t('yii2-ajaxcrud', 'Create').' HocSinh '.Yii::t('yii2-ajaxcrud', 'Success').'</span>',
                    'footer' =>  Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::a(Yii::t('yii2-ajaxcrud', 'Create More'), ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Create New')." HocSinh",
                    'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/create', [
                        'modelClass' => $modelClass,
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
                return $this->render('@app/views/giao_vien_chu_nhiem/hoc-sinh/create', [
                    'modelClass' => $modelClass,
                    'model' => $model,
                ]);
            }
        }

    }

    /**
     * Updates an existing HocSinh model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $modelView = $this->findViewModel($id);
        $modelClass = Lop::find()->all();

        if($request->isAjax)
        {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet)
            {
                return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Update')." thông tin học sinh ".$model->ten,
                    'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/update', [
                        'model' => $model,
                        'modelClass' => $modelClass,
                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::button(Yii::t('yii2-ajaxcrud', 'Save'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            }
            else if($model->load($request->post()) && $model->save())
            {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Thông tin học sinh ".$model->ten,
                    'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/view', [
                        'model' => $modelView,
                        'modelClass' => $modelClass,

                    ]),
                    'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                        Html::a(Yii::t('yii2-ajaxcrud', 'Update'), ['update', 'id' => $id],['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                 return [
                    'title' => Yii::t('yii2-ajaxcrud', 'Update')." thông tin học sinh ".$model->ten,
                    'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/update', [
                        'model' => $model,
                        'modelClass' => $modelClass,

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
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionUpdateMark($id)
    {
        $request = Yii::$app->request;
        if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon==1){
            $model = BangDiemToan::findById($id);
        } else if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon==2){
            $model = BangDiemTiengViet::findById($id);
        } else if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon==3){
            $model = BangDiemTiengAnh::findById($id);
        }
        if (User::findIdentity(Yii::$app->user->id)->ma_role == 2){

        }

        if($request->isAjax)
        {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet)
            {
                if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon===1){
                    return [
                        'title' => Yii::t('yii2-ajaxcrud', 'Update')." điểm học sinh",
                        'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/update-mark-toan', [
                            'model' => $model,

                        ]),
                        'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                            Html::button(Yii::t('yii2-ajaxcrud', 'Save'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                    ];
                } else if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon==2){
                    return [
                        'title' => Yii::t('yii2-ajaxcrud', 'Update')." điểm học sinh ",
                        'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/update-mark-tieng-viet', [
                            'model' => $model,

                        ]),
                        'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                            Html::button(Yii::t('yii2-ajaxcrud', 'Save'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                    ];
                }

            }
            else if($model->load($request->post()) && $model->save())
            {
                if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon===1){
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "Điểm học sinh",
                        'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/view', [
                            'model' => $model,


                        ]),
                        'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                            Html::a(Yii::t('yii2-ajaxcrud', 'Update'), ['update', 'id' => $id],['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                } else  if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon===2){
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "Điểm học sinh",
                        'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/view-mark-tieng-viet', [
                            'model' => $model,


                        ]),
                        'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                            Html::a(Yii::t('yii2-ajaxcrud', 'Update'), ['update', 'id' => $id],['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                }
            }
            else if (!($model->load($request->post()) && $model->save()))
            {
                if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon===2){
                    return [
                        'title' => Yii::t('yii2-ajaxcrud', 'Update')." HocSinh #".$id,
                        'content' => $this->renderAjax('@app/views/giao_vien_chu_nhiem/hoc-sinh/update-mark-tieng-viet', [
                            'model' => $model,


                        ]),
                        'footer' => Html::button(Yii::t('yii2-ajaxcrud', 'Close'), ['class' => 'btn btn-default pull-left', 'data-bs-dismiss' => 'modal']).
                            Html::button(Yii::t('yii2-ajaxcrud', 'Save'), ['class' => 'btn btn-primary', 'type' => 'submit'])
                    ];
                }

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
                if (GiaoVien::findById(Yii::$app->user->id)->ma_mon===1){
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
                else if (GiaoVien::findByIdAccount(Yii::$app->user->id)->ma_mon===2){
                    return $this->render('update-mark-tieng-viet', [
                        'model' => $model,
                    ]);
                }


            }
        }
    }

    /**
     * Delete an existing HocSinh model.
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
     * Delete multiple existing HocSinh model.
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
     * Finds the HocSinh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HocSinh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HocSinh::findOne($id)) !== null)
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
        if (($model = QuanLyHocSinh::findOne(['id' => $id])) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
