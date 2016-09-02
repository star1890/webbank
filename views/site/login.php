<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>

<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    echo '<div class="ui '.$key.' message">';
    echo '<p>'.$message.'</p>';
    echo '</div>';
}
?>

<div class="ui grid atas">
    
    <div class="ten wide column">sad</div>
    <div class="six wide column">
        <div class="column">
            <div class="ui stacked segment">
                <h2 class="login header">Login</h2>
                <?php $form = ActiveForm::begin([
                    'id' => 'ibank-form',
                    'type' => ActiveForm::TYPE_VERTICAL,
                ]); ?>

                <?= $form->field($model, 'username',[
                    'showLabels'=>false,
                    'addon' => ['prepend' => ['content'=>'<i class="user icon"></i>']]
                    ])->textInput([
                        'placeholder'=>'Username',
                        'autocomplete'=>'off',
                        'autofocus' => true
                        ]) ?>

                <?= $form->field($model, 'password',[
                    'showLabels'=>false,
                    'addon' => ['prepend' => ['content'=>'<i class="lock icon"></i>']]
                    ])->passwordInput([
                        'placeholder'=>'Password',
                        'autocomplete'=>'off',
                        ]) ?>
                
                <?= Html::submitButton('Masuk', ['class' => 'ui fluid large teal submit button', 'id'=>'submit']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>         
    </div>
</div>