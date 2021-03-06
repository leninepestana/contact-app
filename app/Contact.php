<?php

namespace App;

use App\Scopes\FilterScope;
use App\Scopes\ContactSearchScope;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'address', 'company_id', 'user_id'];

    public $filterColumns = ['company_id'];
     
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define a local scope for ContactController
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }

    // function getRouteKeyName()
    // {
    //     return 'first_name';
    // }
    
    static function boot()
    {
        parent::boot();

        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new ContactSearchScope);
    }
}
