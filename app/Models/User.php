<?php

namespace App\Models;


use App\Notifications\VerifyNotification;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use  HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'username',
        'gender',
        'birth',
        'email',
        'phone',
        'address',
        'password',
        'confirm_password',
        'avatar',
        'status',
        'role_as',
        'email_verified_at',
        'phone_is_verified',
    ];

    protected $appends = ['fullname']; //appends là thuộc tính của eloquent giúp thêm thuộc tính mới vào model nhưng không cần thêm vào trong database
    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'confirm_password',
        'password_resets'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset(Storage::url('avatar/' . $value) ?? 'avatar/default.jpg'),
        );
    }

    public function getFullnameAttribute()
    {
        return $this->lastname . ' ' . $this->firstname;
    }

    public function scopeSearch($query, $search)
    {
        $search = "%$search%";

        $query->where(function ($query) use ($search) {
            $query->where('username', 'like', $search)
                ->orWhere('firstname', 'like', $search)
                ->orWhere('lastname', 'like', $search)
                ->orWhere('email', 'like', $search)
                ->orWhere('phone', 'like', $search)
                ->orWhere('address', 'like', $search);
        });
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyNotification());
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function socialAccouts()
    {
        return  $this->hasMany(SocialAccount::class);
    }

    public function favoriteCars()
    {
        //belongsToMany có 4 tham số: model, bảng trung gian, khóa ngoại của model hiện tại, khóa ngoại của model liên kết
        return $this->belongsToMany(Car::class, 'favorites', 'user_id', 'car_id');
    }
}
