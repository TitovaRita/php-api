<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends Model
{
    public function set_params($params = array())
    {
        parent::set_params($params);
        $this->$crypted_password = md5($params["password"] . md5("salt"));
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
   */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $username;
    /**
     * @ORM\Column(type="string")
     */
    private $logintime;
    /**
     * @ORM\Column(type="string")
     */
    private $crypted_password;
}
