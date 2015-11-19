<?php

namespace PufferPanel;

use Auth;
use Debugbar;
use Illuminate\Database\Eloquent\Model;

use GuzzleHttp\Client;

class Node extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nodes';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['daemonSecret'];

    /**
     * @var array
     */
    protected static $guzzle = [];

    /**
     * @var array
     */
    protected static $nodes = [];

    /**
     * Returns an instance of the database object for the requested node ID.
     *
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getByID($id)
    {

        if (!Auth::user()) {
            return false;
        }

        // The Node is already cached.
        if (array_key_exists($id, self::$nodes)) {
            return self::$nodes[$id];
        }

        self::$nodes[$id] = Node::where('id', $id)->first();
        return self::$nodes[$id];

    }

    /**
     * Returns a Guzzle Client for the node in question.
     *
     * @param  int $node
     * @return \GuzzleHttp\Client
     */
    public static function guzzleRequest($node)
    {

        if (!Auth::user()) {
            return false;
        }

        // The Guzzle Client is cached already.
        if (array_key_exists($node, self::$guzzle)) {
            return self::$guzzle[$node];
        }

        $nodeData = self::getByID($node);

        // @TODO: Better solution to disabling verification. Security risk.
        self::$guzzle[$node] = new Client([
            'base_uri' => sprintf('https://%s:%s/', $nodeData->fqdn, $nodeData->daemonListen),
            'timeout' => 10.0,
            'verify' => false,
        ]);

        return self::$guzzle[$node];

    }

}
