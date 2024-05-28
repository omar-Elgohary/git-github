<?php

use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
        return $this->response->redirect('/');
    }

    public function editAction($user_id=null) {
        if (is_null($user_id)) {
            return $this->response->redirect('/');
        }
        $user = Users::findFirst($user_id);
        if ($user) {
            $this->view->user = $user;
        } else {
            return $this->response->redirect('/');
        }
    }

    public function updateAction($user_id=null) {
        if (is_null($user_id)) {
            return $this->response->redirect('/');
        }
        /** get data from the request */
        $data = $this->request->getPost();

        /** saving data to the users table */
        $user = Users::findFirst($user_id);
        if ($user) {
            $this->view->user = $user;
        } else {
            return $this->response->redirect('/');
        }
        $user->name = $data['name'];
        $user->email = $data['email'];
        try {
            $saved = $user->save();
        } catch (PDOException $exception) {
            $this->view->error = $exception->getMessage();
            return;
        }

        if ($saved) {
            return $this->response->redirect('users/show/' . $user_id);
        } else {
            return $this->response->redirect('/');
        }
    }

    public function showAction($user_id=null) {
        if (is_null($user_id)) {
            return $this->response->redirect('/');
        }
        $user = Users::findFirst($user_id);
        if ($user) {
            $this->view->message = 'User data show:';
            $this->view->user = $user;
        } else {
            return $this->response->redirect('/');
        }
    }
    
    public function deleteAction($user_id=null) {
        if (is_null($user_id)) {
            return $this->response->redirect('/');
        }
        $user = Users::findFirst($user_id);
        $this->view->deleted = null;
        if ($user) {
            $this->view->deleted = $user->delete() ? $user : null;
            if ($this->view->deleted == null) {
                $this->view->message = 'Error while deleting';
            } else {
                $this->view->message = 'User deleted successfully!';
            }
        } else {
            $this->view->message = 'User not found';
        }
    }

}