<?php namespace RecPoc;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * RecPoc\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|Rating[] $ratings
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\RecPoc\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecPoc\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\RecPoc\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\RecPoc\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\RecPoc\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\RecPoc\User whereUpdatedAt($value)
 */
class User extends Model implements AuthenticatableContract {

    use Authenticatable;
	protected $table = 'users';
    protected $fillable = ['email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function movieRatings(){
        return $this->hasMany(MovieRating::class);
    }

    public function bookRatings(){
        return $this->hasMany(BookRating::class);
    }

}
