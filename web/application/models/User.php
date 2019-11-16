<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends Model
{
    public function __construct($params = array())
    {
        $this->username = $params['username'];
        $this->crypted_password = md5($params['pass'] . md5('salt'));
        $this->logintime = date('c');
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
   */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $username;
    /**
     * @ORM\Column(type="string")
     */
    protected $logintime;
    /**
     * @ORM\Column(type="string")
     */
    protected $crypted_password;

    public function get_data()
    {
        return [ 'username' => $this->username, 'logintime' => $this->logintime ];
    }

    public function auth($pass)
    {
        $res = md5($pass . md5('salt')) == $this->crypted_password;
        if ($res) {
            $this->logintime = date('c');
            $this->save();
        }
        return $res;
    }
}
