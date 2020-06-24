<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'website', 'email'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
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
