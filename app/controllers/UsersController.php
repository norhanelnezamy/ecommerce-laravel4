<?php

class UsersController extends BaseController
{
    public function __constructor()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getRegister()
    {
        return View::make('users.register');
    }

    public function postCreate()
    {
        $validate = Validator::make(Input::all(), User::$rules);

        if ($validate->passes()) {
            $user = new User();
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->telephone = Input::get('telephone');
            $user->save();

            return Redirect::to('users/signin')
                ->with('message', 'thank you for registering , please sign in');

        }

        return Redirect::to('users/register')
            ->with('message', 'Something wrong')
            ->withErrors($validate)
            ->withInput();
    }

    public function getSignin()
    {
        return View::make('users.signin');
    }

    public function postSignin()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
            return Redirect::to('/');
        }

        return Redirect::to('users/signin')
            ->with('message', 'Your E-mail/password incorrect');
    }

    public function getSignout()
    {
        Auth::logout();
        return View::make('users.signin')
            ->with('message', 'You have signed out');
    }
}