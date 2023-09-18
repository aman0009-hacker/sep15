<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Verification;
use App\Models\AdminUser;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class adminAuthController extends AdminController
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
        // $grid->column('password', __('Password'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'))->display(function($value)
    {
             if($value==null)
             {
                return "N/A";
             }
             else
             {
                return $value;
             }
    });
    $grid->column('otp',__('status'))->display(function($value)
    {
          if($value==null)
          {
            return "<span style='background-color:red;color:#fff;padding:3px 10px;border-radius:10px'>Not verified</span>";
          }
          else
          {
            return "<span style='background-color:green;color:#fff;padding:3px 10px;border-radius:10px'>Verified</span>";
          }
    });
        // $grid->column('avatar', __('Avatar'));
        // $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->actions(function($action)
        {
            $action->disableDelete();
            $action->disableView();
            $action->disableEdit();
            $action->add(new Verification);
        });


        $html = <<<HTML
        <style>

            #emailverification
            {
             display:inline-block!important;
             width:50%;   
            }
            #emaillabel
            {
                display: block!important;
            }
            #verifiction_head label
             {
              display: block!important;
              
            }
            #verifiction_head input
            {
                padding:6px 12px;
                border:1px solid #d2d6de;
                width:50%;
            }
            #verifiction_head input:focus-visible
            {
                outline:1px solid #3c8dbc!important;
                border-color:none!important;
            }

        </style>


      HTML;
        Admin::html($html);
        $jsFilePath = public_path('js/emailverification.js');
        $jsContent = file_get_contents($jsFilePath);
        Admin::script($jsContent);
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
        $form->password('password', __('Password'));
        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->image('avatar', __('Avatar'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
