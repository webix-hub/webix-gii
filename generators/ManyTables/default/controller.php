<?php
echo "<?php\n";
/**
 * This is the template for generating a controller class file.
 */

echo "namespace app\\controllers;";
?>

<?= 'use app\models\\'.$modelName ?>;

use DHTMLX\Connector\JSONDataConnector;
use Yii;
use yii\web\Controller;


class <?= $controllerName ?>Controller extends Controller
{

    public $layout = "fullscreen";

    public $enableCsrfValidation = false;

    public function actionTable()
    {
        return $this->render('table');
    }

    public function actionTable_data()
    {

        $model = new <?=$modelName?>();
        $connector = new JSONDataConnector($model,"PHPYii2");
        $connector->render_table($model->tableName(), "<?=$primaryKey?>", "<?=$fields?>");

    }


}
