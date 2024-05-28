<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller {

    public function indexAction() {
        
    }

    public function registerAction() {
        /** get data from the request */
        $data = $this->request->getPost();

        /** saving data to the users table */
        $user = new Users;
        $user->name = $data['name'];
        $user->email = $data['email'];
        try {
            $saved = $user->save();
        } catch (PDOException $exception) {
            $this->view->error = $exception->getMessage();
            return;
        }

        /** passing saved boolean to the view */
        $this->view->saved = $saved;

        if ($saved) {
            $message = "Thanks for registering!";
        } else {
            $message = "Sorry, the following problems were generated:<br>"
                . implode('<br>', $user->getMessages());
        }

        // passing a message to the view
        $this->view->message = $message;
    }

}
