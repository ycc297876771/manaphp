<?php
namespace App\Areas\Rbac\Models;

use ManaPHP\Db\Model;

class Role extends Model
{
    public $role_id;
    public $role_name;
    public $display_name;
    public $enabled;
    public $permissions;
    public $creator_name;
    public $updator_name;
    public $created_time;
    public $updated_time;

    public function getSource($context = null)
    {
        return 'rbac_role';
    }

    public function rules()
    {
        return [
            'role_name' => ['lower', 'length' => '3-15', 'unique'],
            'display_name' => ['lower', 'length' => '3-15', 'unique'],
            'enabled' => 'bool'
        ];
    }
}