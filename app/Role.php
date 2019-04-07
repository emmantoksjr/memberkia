<?php 
namespace App;

use Zizaco\Entrust\EntrustRole;
use OwenIt\Auditing\Contracts\Auditable;
//use Zizaco\Entrust\Traits\EntrustUserTrait;
class Role extends EntrustRole implements Auditable
{ 
    use \OwenIt\Auditing\Auditable;
//    use EntrustUserTrait;
    protected $fillable = ['name', 'display_name', 'description','visibility'];
    protected $auditExclude = [];
}
