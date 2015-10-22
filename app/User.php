<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * Atributo: full_name
     */
    public function getFullNameAttribute() 
    {
        $res = strtolower( $this->id.' - '.$this->name.' - '.$this->email );
        return $res;
    }


    # sets functions for the model updete

    public function setPasswordAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['password'] = bcrypt($value); // fc analoga
            // $this->attributes['password'] = \Hash::make($value);
        }
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function scopeNameOrEmail($query,$str_busqueda)
    {
        $str_busqueda  = trim($str_busqueda);

        //$consulta = \DB::raw( "CONCAT(nombre,' ',apellido)" );

        $query->where('name','LIKE', '%' . $str_busqueda . '%' )
            ->orWhere('email','LIKE', '%' . $str_busqueda . '%' );
    }
}
