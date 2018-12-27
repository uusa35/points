<?php

// Home
use App\Models\User;

Breadcrumbs::for('backend.home', function ($trail) {
    $trail->push(trans('general.home'), route('backend.home'));
});

Breadcrumbs::for('backend.index', function ($trail) {
    $trail->push(trans('general.home'), route('backend.home'));
});

// admins
Breadcrumbs::for('backend.admin.user.index', function ($trail) {
    $trail->parent('backend.home');
    if (request()->has('role_id')) {
        $trail->push(trans('general.users'), route('backend.admin.user.index', ['role_id' => request('role_id')]));
    } else {
        $trail->push(trans('general.users'), route('backend.admin.user.index'));
    }
});

Breadcrumbs::for('backend.admin.user.create', function ($trail) {
    $trail->parent('backend.admin.user.index');
    $trail->push(trans('general.create_user'), route('backend.admin.user.create'));
});

Breadcrumbs::for('backend.admin.user.edit', function ($trail, $element) {
    $trail->parent('backend.admin.user.index');
    $trail->push(trans('general.edit_user'), route('backend.admin.user.edit', $element->id));
});

Breadcrumbs::for('backend.admin.order.create', function ($trail) {
    $trail->parent('backend.admin.order.index');
    $trail->push(trans('general.create_order'), route('backend.admin.order.create'));
});

Breadcrumbs::for('backend.admin.order.show', function ($trail, $element) {
    $trail->parent('backend.admin.order.index', ['user_id' => $element->user_id]);
    $trail->push($element->title, route('backend.admin.order.show', $element->id));
});

Breadcrumbs::for('backend.admin.order.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.orders'), route('backend.admin.order.index'));
});

Breadcrumbs::for('backend.admin.role.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.roles'), route('backend.admin.role.index'));
});

Breadcrumbs::for('backend.admin.role.edit', function ($trail, $element) {
    $trail->parent('backend.admin.role.index');
    $trail->push(trans('general.edit'), route('backend.admin.role.edit', $element->id));
});


Breadcrumbs::for('backend.admin.category.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.categories'), route('backend.admin.category.index'));
});

Breadcrumbs::for('backend.admin.plan.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.payment_plans'), route('backend.admin.plan.index'));
});

Breadcrumbs::for('backend.admin.plan.create', function ($trail) {
    $trail->parent('backend.admin.plan.index');
    $trail->push(trans('general.create_plan'), route('backend.admin.plan.create'));
});

Breadcrumbs::for('backend.admin.plan.edit', function ($trail,$element) {
    $trail->parent('backend.admin.plan.index');
    $trail->push(trans('general.edit'), route('backend.admin.plan.edit',$element->id));
});

Breadcrumbs::for('backend.admin.setting.show', function ($trail, $element) {
    $trail->parent('backend.home');
    $trail->push(trans('general.settings'), route('backend.admin.setting.show', $element->id));
});

Breadcrumbs::for('backend.admin.setting.index', function ($trail, $element) {
    $trail->parent('backend.home');
    $trail->push(trans('general.settings'), route('backend.admin.setting.index', $element->id));
});

Breadcrumbs::for('backend.admin.setting.edit', function ($trail, $element) {
    $trail->parent('backend.admin.setting.show', $element);
    return $trail->push(trans('general.edit_setting'), route('backend.admin.setting.edit', $element->id));
});

Breadcrumbs::for('backend.admin.category.create', function ($trail) {
    $trail->parent('backend.category.index');
    $trail->push(trans('general.create_category'), route('backend.category.create'));
});

Breadcrumbs::for('backend.admin.category.edit', function ($trail, $element) {
    $trail->parent('backend.category.index');
    $trail->push(trans('general.edit_category'), route('backend.category.edit', $element->id));
});

Breadcrumbs::for('backend.admin.service.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.service_index'), route('backend.admin.service.index'));
});

Breadcrumbs::for('backend.admin.service.create', function ($trail) {
    $trail->parent('backend.admin.service.index');
    $trail->push(trans('general.create_service'), route('backend.admin.service.create'));
});

Breadcrumbs::for('backend.admin.service.edit', function ($trail, $element) {
    $trail->parent('backend.admin.service.index');
    $trail->push(trans('edit service'), route('backend.admin.service.edit', $element->id));
});

Breadcrumbs::for('backend.admin.slider.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push('sliders', route('backend.admin.slider.index'));
});

Breadcrumbs::for('backend.admin.slider.create', function ($trail) {
    $trail->parent('backend.admin.slider.index');
    $trail->push('create slider', route('backend.admin.slider.create'));
});

Breadcrumbs::for('backend.admin.slider.edit', function ($trail, $element) {
    $trail->parent('backend.admin.slider.index');
    $trail->push('edit slider', route('backend.admin.slider.edit', $element->id));
});

// users

Breadcrumbs::for('backend.setting.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.settings'), route('backend.setting.index'));
});

Breadcrumbs::for('backend.notification.index', function ($trail) {
    $trail->parent('backend.setting.index');
    $trail->push(trans('general.notifications'), route('backend.notification.index'));
});


Breadcrumbs::for('backend.point.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.my_points'), route('backend.point.index'));
});

Breadcrumbs::for('backend.file.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.files'), route('backend.file.index'));
});

Breadcrumbs::for('backend.file.show', function ($trail, $element) {
    $trail->parent('backend.file.index');
    $trail->push($element->title, route('backend.file.show', $element->id));
});

Breadcrumbs::for('backend.file.create', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.file_create'), route('backend.file.create'));
});

Breadcrumbs::for('backend.file.edit', function ($trail, $element) {
    $trail->parent('backend.home');
    $trail->push(trans('general.file_edit'), route('backend.file.edit', $element->id));
});

Breadcrumbs::for('backend.order.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.orders'), route('backend.order.index',['is_complete' => 0]));
});

Breadcrumbs::for('backend.order.choose.lang', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.choose_order_lang'), route('backend.order.choose.lang'));
});

Breadcrumbs::for('backend.order.choose.category', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.choose_order_category'), route('backend.order.choose.category'));
});

Breadcrumbs::for('backend.order.choose.service', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.choose_order_service'), route('backend.order.choose.service'));
});

Breadcrumbs::for('backend.order.create', function ($trail) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.order'), route('backend.order.create'));
});

Breadcrumbs::for('backend.order.edit', function ($trail,$element) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.order'), route('backend.order.edit', $element->id));
});

Breadcrumbs::for('backend.order.show', function ($trail, $element) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.order'), route('backend.order.show', $element->id));
});


Breadcrumbs::for('backend.job.index', function ($trail) {
    if(request()->has("order_id")) {
        $trail->parent('backend.order.index',['order_id' => request()->order_id]);
        $trail->push(trans('general.job'), route('backend.job.index',['order_id' => request()->order_id]));
    }
    $trail->parent('backend.order.index',['jobs' => false]);
    $trail->push(trans('general.create_new_job'), '#');
});

Breadcrumbs::for('backend.job.create', function ($trail) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.create_new_job'), route('backend.job.create'));
});

Breadcrumbs::for('backend.job.show', function ($trail, $element) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.order'), route('backend.order.show', $element->order_id));
    $trail->push(trans('general.show_job'), route('backend.job.show', $element->id));
});

Breadcrumbs::for('backend.job.edit', function ($trail, $element) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.order'), route('backend.order.show', $element->order_id));
    $trail->push(trans('general.edit_job'), route('backend.job.edit', $element->id));
});

Breadcrumbs::for('backend.version.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.versions'), route('backend.version.index'));
});
Breadcrumbs::for('backend.version.create', function ($trail) {
    $trail->parent('backend.home');
    if(request()->has('job_id')) {
        $trail->push(trans('general.job'), route('backend.job.show', request()->job_id));
    }
    $trail->push(trans('general.create_new_version'), route('backend.version.create'));
});

Breadcrumbs::for('backend.version.show', function ($trail, $element) {
    $trail->parent('backend.home');
    $trail->push(trans('general.show_version'), route('backend.version.show', $element->id));
});

Breadcrumbs::for('backend.version.edit', function ($trail, $element) {
    $trail->parent('backend.job.index',['order_id' => $element->job->order_id]);
    $trail->push(trans('general.edit_version'), route('backend.version.edit', $element->id));
});

Breadcrumbs::for('backend.user.create', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.create_user'), route('backend.user.create'));
});

Breadcrumbs::for('backend.user.edit', function ($trail, $element) {
    $trail->parent('backend.home');
//    $trail->push('users', route('backend.user.index', ['role_id' => $element->role_id]));
    $trail->push(trans('general.edit_user'), route('backend.user.edit', $element->id));
});

Breadcrumbs::for('backend.user.show', function ($trail, $element) {
    $trail->parent('backend.home');
    $trail->push(trans('general.my_profile'), route('backend.user.show', $element->id));
});


Breadcrumbs::for('backend.image.edit', function ($trail, $element) {
    $trail->parent('backend.gallery.edit', $element->gallery);
    return $trail->push(trans('edit image'), route('backend.image.edit', $element->id));
});

Breadcrumbs::for('backend.reset.password', function ($trail) {
    $trail->parent('backend.home');
    return $trail->push(trans('general.reset_password'), route('backend.reset.password'));
});

Breadcrumbs::for('password.reset', function ($trail) {
    $trail->parent('backend.home');
    return $trail->push(trans('general.reset_password'), route('backend.reset.password'));
});



