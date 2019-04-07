<?php 
namespace App;

use Zizaco\Entrust\EntrustPermission;
use OwenIt\Auditing\Contracts\Auditable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Permission extends EntrustPermission implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use EntrustUserTrait;
    protected $fillable = ['name', 'display_name', 'description'];
    protected $auditExclude = [
        
    ];
}