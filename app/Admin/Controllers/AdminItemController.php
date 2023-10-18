<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Item;

class AdminItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Item';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Item());

        $grid->column('id', __('Id'));
        $grid->column('CategoryID', __('CategoryID'));
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'));
        $grid->column('description', __('Description'));
        $grid->column('ItemAvailability', __('ItemAvailability'));
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
        $show = new Show(Item::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('CategoryID', __('CategoryID'));
        $show->field('name', __('Name'));
        $show->field('price', __('Price'));
        $show->field('description', __('Description'));
        $show->field('ItemAvailability', __('ItemAvailability'));
        $show->field('imageURL', __('ImageURL'));
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
        
        $form = new Form(new Item());

        $form->number('CategoryID', __('CategoryID'));
        $form->text('name', __('Name'));
        $form->decimal('price', __('Price'));
        $form->text('description', __('Description'));
        $form->text('ItemAvailability', __('ItemAvailability'))->default('Available');
        $form->image('imageURL', 'Image');

        return $form;
    }
}
