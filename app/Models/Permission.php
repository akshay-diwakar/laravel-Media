<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Item_permission_role;
use App\Models\role;


class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ]; 	 	
    

    public function roles()
    {
    	return $this->belongsToMany(role::class,'role_permissions')->withPivot('Item_id');
    }

	// refrence this link: https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/
        public function items()
        {
        	return $this->belongToMany(Item::class,'role_permissions','Item_id','permission_id')
                                ->using(Item_permission_role::class)
                                ->withPivot('Item_id');
        }
}
