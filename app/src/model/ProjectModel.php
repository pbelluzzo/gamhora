<?php

namespace app\src\model;

use app\src\model\Model;
use app\src\dao\ProjectDao;
use Exception;

class ProjectModel extends Model {
    
    protected $tableName = "tbl_project";
    protected $tableColumns = ['prj_title' => '', 'prj_description' => '', 'prj_genre' => '', 'prj_author_id' => '', 'prj_budget' => '',
    'prj_start_date' => '', 'prj_expected_end_date' => '', 'prj_hours' => '', 'prj_hours_done' => '', 'prj_situation' => ''];
    protected $id;
    protected $prefix = 'prj_';


}