<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

use App\Http\Controllers\ReferralSystemController;

class User extends Authenticatable implements MustVerifyEmail
{
    use  HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'ref_code',
        'points',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers(){
        return $this->orderBy('id','DESC')->get();
    }

    public function getById($id){
        return $this->find($id);
    }

    public function createUser($data){
         $this->create($data);
    }

    public function updateUser($data,$id){
        $index = $this->where('id',$id)->first();
        $index->update($data);
    }

    public function deleteUser($id){
        $this->destroy($id);
    }

    public function checkRefCode($newCode){
        return $this->get('ref_code');
    }

    // referral system
    public function addPointIfNewMac($s_ref,$d_ref,$d_ip){
        
        $src_user = $this->where('ref_code',$s_ref)->first();
        
        if($src_user == null)
        return false;
        /// return 'referral code not found';

        else{
            $user_id = $src_user->id;
            // $decryption_mac = ReferralSystemController::decryptString($d_ref);
            
            $referrals = Referral::where('user_id',$user_id)->where('mac',$d_ref)->first();
            

            if($referrals != null){
                return true;
                /// return 'earn not allow';
            }
            else{
                $old_points = $src_user->points;
                $new_points = $old_points + 20;
                $d['points'] = $new_points;
                $src_user->update($d);

            $data = [];
               
            $data['user_id'] = $user_id;
            $data['mac'] = $d_ref;
            $data['ip'] = $d_ip;
            Referral::create($data);
            return true;
            /// return 'add points success';    
            }
        }
    }

}
