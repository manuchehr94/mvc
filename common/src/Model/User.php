<?php

    include_once __DIR__ . "/../Service/DBConnector.php";
    include_once __DIR__ . "/../Service/UserService.php";

class User
{
    const ROLE_USER_VALUE = 'ROLE USER';

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $roles;

    /**
     * @var false|mysqli
     */
    private $conn;

    public function __construct(
                                $id = null,
                                $name = null,
                                $phone = null,
                                $email = null,
                                $password = null,
                                $roles = []
                                )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->setId($id);
        $this->setName($name);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRoles($roles);
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId($id)
    {
        $this->id = $id;

    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = UserService::encodePassword($password);
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "Update `user` set `name`='" . $this->getName() . "', 
                                          phone='" . $this->getPhone() . "',
                                          email='" . $this->getEmail() . "',
                                          `password` ='" . $this->getPassword() . "',
                                          roles='" . json_encode($this->getRoles()) . "'
                                          where id=" . $this->getId() . " limit 1";

        } else {
            $query = "INSERT INTO `user` (id, `name`, phone, email, password, roles) VALUES (
                                            null,
                                            '" . $this->getName() . "',
                                            '" . $this->getPhone() . "',
                                            '" . $this->getEmail() . "',
                                            '" . $this->getPassword() . "',
                                            '" . json_encode($this->getRoles()) . "'
            )";
        }

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $result = mysqli_query($this->conn, "Select * from `user` where id = '" . $id . "' limit 1");
        $oneProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($oneProduct);
    }

    /**
     * @param $email
     * @return mixed
     * @throws Exception
     */
    public function getByEmail($email)
    {
        $result = mysqli_query($this->conn, "Select * from `user` where email = '" . $email . "' limit 1");

        if(!$result) {
            throw new Exception("User not found", 404);
        }

        $oneProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($oneProduct);
    }

    /**
     * @param array $roles
     * @param $controller
     * @param $action
     * @return bool
     * @throws Exception
     */
    public function isAccess(array $roles, $controller, $action)
    {
        $permission = SecurityService::getPermissionNameByControllerAndAction($controller, $action);

        $result = mysqli_query($this->conn, "Select * from `rbac_access` 
                            where role in ('".  implode("','", $roles) ."') and permission = '$permission'");

        if(!$result) {
            throw new Exception("Permission error", 400);
        }

        $accesses = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($accesses as $access) {
            if($access) return true;
        }

        throw new Exception("No Permission", 403);
    }
    
}