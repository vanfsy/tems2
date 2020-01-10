<?php

namespace App\Models;

use App\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppModel extends Model
{
    use SoftDeletes, CacheQueryBuilder;

    protected $dates = ['deleted_at'];
    protected $_title = [];
    protected $_forms = [];
    protected $_validates = [];
    protected $_validates_front = [];
    protected $_tables = [];

    public static function boot()
    {
        parent::boot();
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getFormList()
    {
        return $this->_forms;
    }

    public function getValidateList()
    {
        return $this->_validates;
    }

    public function getTableList()
    {
        return $this->_tables;
    }

    public static function checkForm($user,$modelId)
    {
        if($user->id == $modelId)
        {
            return true;
        }else{
            return false;
        }
    }
}
