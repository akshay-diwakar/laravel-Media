<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Item;
use App\Models\Permission;
use App\Models\role;

class Item_permission_role extends Pivot
{
    use HasFactory;
   
   
}
