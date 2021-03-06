<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/5/21
 * Time: 5:24 PM
 */

namespace frontend\controllers;

use common\models\Complaint;

class CompanyController extends ActiveController
{

    public $modelClass = Complaint::class;

}
