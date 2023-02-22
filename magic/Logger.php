<?php

namespace magic;

class Logger{
    private $users = array(
        'lala'=> 'Lala-Britta',
        'sedar' =>'theGoat',
        'stark'=> 'warmachinerox'
    );

    public function generateLoginForm(string $action): void{ ?>

        <!--Le formulaire-->
        <div class="formulaire">
            <div class="form-entete">
                Please Login
            </div>
            <form method="POST" action="<?php echo $action; ?>">
                <input type="text" class="form-login-input" id="pseudo" placeholder="USERNAME"
                       name="pseudo">
                <input type="password" class="form-login-input" id="password" placeholder="PASSWORD"
                       name="psw">
                <button type="submit" id = "btn-submit" class="btn-style">
                    LOGIN
                </button>
            </form>
        </div>
    <?php }

    public function log(string $username, string $password) : array{
        $gar = false;
        if(array_key_exists($username, $this->users))
            if($this->users[$username] == $password)
                $gar = true;


        $nc = null;
        $err = null;


//        $username_correct = "sedar";
//        $password_correct = "theGoat";
//        if( ($username == $username_correct) && ($password == $password_correct ) )
//            $gar = true;
//        else
//            $gar = false;
//        $gar = ( ($username == $username_correct) &&
//            ($password == $password_correct ) );

        if($gar)
            $nc = $username;

        else {
            if (empty($username))
                $err = "username is empty";

            else if (empty($password))
                $err = "password is empty";

            else if ((!empty($username)) && (!empty($password)))
                $err = "authentication failed";
        }

        $tableau = array(
            'granted'  => $gar,
            'nick' => $nc,
            'error' => $err,
        );

        return $tableau;
    }

}