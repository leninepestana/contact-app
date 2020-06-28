<?php

namespace App;

use App\Contact;
use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'website', 'email'];

    public $searchColumns = ['name', 'address', 'email', 'website'];

    public function contacts()
    {
        return $this->hasMany(Contact::class)->withoutGlobalScope(SearchScope::class);
    }

    public static function boot() 
    {
        parent::boot();

        static::addGlobalScope(new SearchScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Static methods no need to be instantiate
    public static function userCompanies()
    {
        //return auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return self::where('user_id', auth()->id())->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
    }
}
