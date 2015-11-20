<?php

namespace PufferPanel\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Subuser extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subusers';

    /**
     * @var mixed
     */
    protected static $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        self::$user = Auth::user();
    }

    /**
     * Returns an array of each server ID that the user has access to.
     *
     * @return array
     */
    public static function accessServers()
    {

        $access = [];

        $union = self::select('server_id')->where('user_id', self::$user->id);
        $select = Server::select('id')->where('owner', self::$user->id)->union($union)->get();

        foreach($select as &$select) {
            $access = array_merge($access, [ $select->id ]);
        }

        return $access;

    }

}
