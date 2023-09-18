<?php

namespace App\Admin\Controllers;

use App\Models\AdminUser;
use App\Models\permission;
use App\Models\Role;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserRoleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AdminUser';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AdminUser());

        $grid->column('id', __('Id'));
        $grid->column('username', __('Username'));
        $grid->column('Roles', __('Role'))->display(function ($value) {
            if($value==null)
            {
                return "N/A";
            }
            else
            {
                foreach ($value as $key => $singlevalue) {
            
                          $arr[]=$singlevalue['name'];
                }

                return implode(" ",$arr);
            }
        });
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'))->display(function($value)
    {
        if($value===null)
        {
            return "N/A";

        }
    else
    {
        return $value;
    }
    });
        // $grid->column('avatar', __('Avatar'));
        // $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(AdminUser::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('password', __('Password'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('avatar', __('Avatar'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new AdminUser());

        $form->text('username', __('Username'));
        $form->password('password', __('Password'))->creationRules('required|min:6')->updateRules('nullable|min:6');;
        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->image('avatar', __('Avatar'));
        // $form->select('Roles',__('Roles'))->options(Role::all()->pluck('name'));
        $form->multipleSelect('roles', __('Role'))->options(Role::all()->pluck('name', 'id'));
       
       
        $form->select('permission_id','permissions')->options(permission::all()->pluck('name','id')); 
        // $form->text('remember_token', __('Remember token'));
        $form->saving(function (Form $form) {
            if ($form->password) {
                // Hash the password before saving
                $form->password = bcrypt($form->password);
            }
        });
        return $form;
    }
}











