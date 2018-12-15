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
    $trail->push(trans('create_user'), route('backend.admin.user.create'));
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
    $trail->push(trans('general.order_index'), route('backend.admin.role.index'));
});

Breadcrumbs::for('backend.admin.role.edit', function ($trail, $element) {
    $trail->parent('backend.admin.role.index');
    $trail->push(trans('general.edit'), route('backend.admin.role.edit', $element->id));
});


Breadcrumbs::for('backend.admin.category.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('categories'), route('backend.admin.category.index'));
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


Breadcrumbs::for('backend.file.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.files'), route('backend.file.index'));
});

Breadcrumbs::for('backend.file.show', function ($trail, $element) {
    $trail->parent('backend.file.index');
    $trail->push($element->title, route('backend.file.show', $element->id));
});

Breadcrumbs::for('backend.order.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.orders'), route('backend.order.index'));
});

Breadcrumbs::for('backend.order.create', function ($trail) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.order'), route('backend.order.create'));
});

Breadcrumbs::for('backend.order.show', function ($trail, $element) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.order'), route('backend.order.show', $element->id));
});


Breadcrumbs::for('backend.country.create', function ($trail) {
    $trail->parent('backend.country.index');
    $trail->push(trans('create country'), route('backend.country.create'));
});

Breadcrumbs::for('backend.country.edit', function ($trail, $element) {
    $trail->parent('backend.country.index');
    $trail->push(trans('general.edit_country'), route('backend.country.edit', $element->id));
});

Breadcrumbs::for('backend.job.index', function ($trail, $element) {
    $trail->parent('backend.order.index');
    $trail->push(trans('general.job'), route('backend.job.index', ['order_id' => $element['order_id']]));
});
Breadcrumbs::for('backend.job.create', function ($trail) {
    $trail->parent('backend.job.index');
    $trail->push(trans('general.create_new_job'), route('backend.job.create'));
});

Breadcrumbs::for('backend.job.show', function ($trail, $element) {
    $trail->parent('backend.job.index', ['order_id' => $element->order_id]);
    $trail->push(trans('general.show_job'), route('backend.job.show', $element->id));
});

Breadcrumbs::for('backend.job.edit', function ($trail, $element) {
    $trail->parent('backend.job.index');
    $trail->push(trans('general.edit_job'), route('backend.job.edit', $element->id));
});

Breadcrumbs::for('backend.user.create', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.create_user'), route('backend.user.create'));
});

Breadcrumbs::for('backend.user.edit', function ($trail, $element) {
    $trail->parent('backend.home');
    $trail->push('users', route('backend.user.index', ['role_id' => $element->role_id]));
    $trail->push(trans('general.edit_user'), route('backend.user.edit', $element->id));
});


Breadcrumbs::for('backend.category.create', function ($trail) {
    $trail->parent('backend.category.index');
    $trail->push(trans('create category'), route('backend.category.create'));
});

Breadcrumbs::for('backend.category.edit', function ($trail, $element) {
    $trail->parent('backend.category.index');
    $trail->push(trans('edit category'), route('backend.category.edit', $element->id));
});

Breadcrumbs::for('backend.aboutus.create', function ($trail) {
    $trail->parent('backend.aboutus.index');
    $trail->push(trans('create aboutus'), route('backend.aboutus.create'));
});

Breadcrumbs::for('backend.aboutus.edit', function ($trail, $element) {
    $trail->parent('backend.aboutus.index');
    $trail->push(trans('edit aboutus'), route('backend.aboutus.edit', $element->id));
});


Breadcrumbs::for('backend.term.create', function ($trail) {
    $trail->parent('backend.term.index');
    $trail->push(trans('create term'), route('backend.term.create'));
});

Breadcrumbs::for('backend.term.edit', function ($trail, $element) {
    $trail->parent('backend.term.index');
    $trail->push(trans('edit term'), route('backend.term.edit', $element->id));
});

Breadcrumbs::for('backend.faq.create', function ($trail) {
    $trail->parent('backend.faq.index');
    $trail->push(trans('create faq'), route('backend.faq.create'));
});

Breadcrumbs::for('backend.faq.edit', function ($trail, $element) {
    $trail->parent('backend.faq.index');
    $trail->push(trans('edit faq'), route('backend.faq.edit', $element->id));
});


Breadcrumbs::for('backend.slider.create', function ($trail) {
    $trail->parent('backend.slider.index');
    $trail->push(trans('create slider'), route('backend.slider.create'));
});

Breadcrumbs::for('backend.slider.edit', function ($trail, $element) {
    $trail->parent('backend.slider.index');
    return $trail->push(trans('edit slider'), route('backend.slider.edit', $element->id));
});


Breadcrumbs::for('backend.image.edit', function ($trail, $element) {
    $trail->parent('backend.gallery.edit', $element->gallery);
    return $trail->push(trans('edit image'), route('backend.image.edit', $element->id));
});

Breadcrumbs::for('backend.setting.edit', function ($trail, $element) {
    $trail->parent('backend.setting.index');
    return $trail->push(trans('general.edit_setting'), route('backend.image.edit', $element->id));
});

Breadcrumbs::for('backend.reset.password', function ($trail) {
    $trail->parent('backend.home');
    return $trail->push(trans('general.reset_password'), route('backend.reset.password'));
});



