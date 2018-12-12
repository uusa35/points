<?php

// Home
use App\Models\User;

Breadcrumbs::for('backend.home', function ($trail) {
    $trail->push(trans('general.home'), route('backend.home'));
});

Breadcrumbs::for('backend.index', function ($trail) {
    $trail->push(trans('general.home'), route('backend.home'));
});

// Home > About
Breadcrumbs::for('backend.admin.user.index', function ($trail, $elements) {
    $trail->parent('backend.home');
    if (request()->has('role_id')) {
        $trail->push(trans('general.' . $elements->first()->role->name), route('backend.user.index', ['role_id' => request('role_id')]));
    } else {
        $trail->push(trans('general.user'), route('backend.user.index', ['role_id' => request('role_id')]));
    }
});

Breadcrumbs::for('backend.user.index', function ($trail, $elements) {
    $trail->parent('backend.home');
    if (request()->has('role_id')) {
        $trail->push(trans('general.' . $elements->first()->role->name), route('backend.user.index', ['role_id' => request('role_id')]));
    } else {
        $trail->push(trans('general.user'), route('backend.user.index', ['role_id' => $roleId]));
    }
});




Breadcrumbs::for('backend.client.order.show', function ($trail, $element) {
    $trail->parent('backend.client.order.index', ['user_id' => $element->user_id]);
    $trail->push(trans('Project' . $element->name), route('backend.client.order.show', $element->id));
});

Breadcrumbs::for('backend.admin.order.show', function ($trail, $element) {
    $trail->parent('backend.admin.order.index', ['user_id' => $element->user_id]);
    $trail->push(trans('Project' . $element->name), route('backend.admin.order.show', $element->id));
});


Breadcrumbs::for('backend.admin.category.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('categories'), route('backend.admin.category.index'));
});

Breadcrumbs::for('backend.tag.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('tags'), route('backend.tag.index'));
});


Breadcrumbs::for('backend.size.index', function ($trail) {

    $trail->parent('backend.home');
    $trail->push(trans('sizes'), route('backend.size.index'));
});

Breadcrumbs::for('backend.country.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('countries'), route('backend.country.index'));
});

Breadcrumbs::for('backend.report.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('reports'), route('backend.report.index'));
});

Breadcrumbs::for('backend.admin.role.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('roles'), route('backend.admin.role.index'));
});

Breadcrumbs::for('backend.setting.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.settings'), route('backend.setting.index'));
});

Breadcrumbs::for('backend.notification.index', function ($trail) {
    $trail->parent('backend.setting.index');
    $trail->push(trans('general.notifications'), route('backend.notification.index'));
});

Breadcrumbs::for('backend.admin.order.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.orders'), route('backend.admin.order.index'));
});

Breadcrumbs::for('backend.client.order.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.orders'), route('backend.client.order.index'));
});

Breadcrumbs::for('backend.designer.order.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.orders'), route('backend.designer.order.index'));
});

Breadcrumbs::for('backend.slider.index', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('general.sliders'), route('backend.slider.index'));
});


Breadcrumbs::for('backend.attribute.create', function ($trail, $element) {
    $trail->parent('backend.attribute.index');
    $trail->push(trans('create attribute'), route('backend.attribute.create', ['id' => $element->id]));
});

Breadcrumbs::for('backend.admin.role.edit', function ($trail, $element) {
    $trail->parent('backend.admin.role.index');
    $trail->push(trans('general.edit'), route('backend.admin.role.edit', $element->id));
});

Breadcrumbs::for('backend.attribute.edit', function ($trail, $element) {
    $trail->parent('backend.attribute.index');
    $trail->push(trans('general.edit_attribute'), route('backend.attribute.edit', $element->id));
});

Breadcrumbs::for('backend.report.create', function ($trail) {
    $trail->parent('backend.report.index');
    $trail->push(trans('create report'), route('backend.report.create'));
});

Breadcrumbs::for('backend.report.edit', function ($trail, $element) {
    $trail->parent('backend.report.index');
    $trail->push(trans('general.edit_report'), route('backend.report.edit', $element->id));
});

Breadcrumbs::for('backend.document.create', function ($trail) {
    $trail->parent('backend.document.index');
    $trail->push(trans('create document'), route('backend.document.create'));
});

Breadcrumbs::for('backend.document.edit', function ($trail, $element) {
    $trail->parent('backend.document.index');
    $trail->push(trans('general.edit_document'), route('backend.document.edit', $element->id));
});

Breadcrumbs::for('backend.drawing.create', function ($trail) {
    $trail->parent('backend.drawing.index');
    $trail->push(trans('create drawing'), route('backend.drawing.create'));
});

Breadcrumbs::for('backend.drawing.edit', function ($trail, $element) {
    $trail->parent('backend.drawing.index');
    $trail->push(trans('general.edit_drawing'), route('backend.drawing.edit', $element->id));
});

Breadcrumbs::for('backend.payment.create', function ($trail) {
    $trail->parent('backend.payment.index');
    $trail->push(trans('create payment'), route('backend.payment.create'));
});

Breadcrumbs::for('backend.payment.edit', function ($trail, $element) {
    $trail->parent('backend.payment.index');
    $trail->push(trans('general.edit_payment'), route('backend.payment.edit', $element->id));
});

Breadcrumbs::for('backend.phase.create', function ($trail) {
    $trail->parent('backend.phase.index');
    $trail->push(trans('create phase'), route('backend.phase.create'));
});

Breadcrumbs::for('backend.timeline.create', function ($trail) {
    $trail->parent('backend.timeline.index');
    $trail->push(trans('create timeline'), route('backend.timeline.create'));
});

Breadcrumbs::for('backend.phase.edit', function ($trail, $element) {
    $trail->parent('backend.phase.index');
    $trail->push(trans('general.edit_phase'), route('backend.phase.edit', $element->id));
});

Breadcrumbs::for('backend.timeline.edit', function ($trail, $element) {
    $trail->parent('backend.timeline.index');
    $trail->push(trans('general.edit_timeline'), route('backend.timeline.edit', $element->id));
});

Breadcrumbs::for('backend.task.create', function ($trail) {
    $trail->parent('backend.task.index');
    $trail->push(trans('create task'), route('backend.task.create'));
});

Breadcrumbs::for('backend.task.edit', function ($trail, $element) {
    $trail->parent('backend.task.index');
    $trail->push(trans('general.edit_task'), route('backend.task.edit', $element->id));
});

Breadcrumbs::for('backend.video.create', function ($trail) {
    $trail->parent('backend.video.index');
    $trail->push(trans('create video'), route('backend.video.create'));
});

Breadcrumbs::for('backend.video.edit', function ($trail, $element) {
    $trail->parent('backend.video.index');
    $trail->push(trans('general.edit_video'), route('backend.video.edit', $element->id));
});


Breadcrumbs::for('backend.coupon.create', function ($trail) {
    $trail->parent('backend.coupon.index');
    $trail->push(trans('create coupon'), route('backend.coupon.create'));
});

Breadcrumbs::for('backend.coupon.edit', function ($trail, $element) {
    $trail->parent('backend.coupon.index');
    $trail->push(trans('general.edit_coupon'), route('backend.coupon.edit', $element->id));
});

Breadcrumbs::for('backend.client.order.create', function ($trail) {
    $trail->parent('backend.client.order.index');
    $trail->push(trans('create project'), route('backend.client.order.create'));
});

Breadcrumbs::for('backend.client.order.edit', function ($trail, $element) {
    $trail->parent('backend.client.order.index');
    $trail->push(trans('general.edit_project'), route('backend.client.order.edit', $element->id));
});


Breadcrumbs::for('backend.color.create', function ($trail) {
    $trail->parent('backend.color.index');
    $trail->push(trans('create color'), route('backend.color.create'));
});

Breadcrumbs::for('backend.color.edit', function ($trail, $element) {
    $trail->parent('backend.color.index');
    $trail->push(trans('general.edit_color'), route('backend.color.edit', $element->id));
});


Breadcrumbs::for('backend.size.create', function ($trail) {
    $trail->parent('backend.size.index');
    $trail->push(trans('create size'), route('backend.size.create'));
});

Breadcrumbs::for('backend.size.edit', function ($trail, $element) {
    $trail->parent('backend.size.index');
    $trail->push(trans('general.edit_size'), route('backend.size.edit', $element->id));
});

Breadcrumbs::for('backend.country.create', function ($trail) {
    $trail->parent('backend.country.index');
    $trail->push(trans('create country'), route('backend.country.create'));
});

Breadcrumbs::for('backend.country.edit', function ($trail, $element) {
    $trail->parent('backend.country.index');
    $trail->push(trans('general.edit_country'), route('backend.country.edit', $element->id));
});

Breadcrumbs::for('backend.tag.create', function ($trail) {
    $trail->parent('backend.tag.index');
    $trail->push(trans('create tag'), route('backend.tag.create'));
});

Breadcrumbs::for('backend.tag.edit', function ($trail, $element) {
    $trail->parent('backend.tag.index');
    $trail->push(trans('general.edit_tag'), route('backend.tag.edit', $element->id));
});

Breadcrumbs::for('backend.user.create', function ($trail) {
    $trail->parent('backend.home');
    $trail->push(trans('create user'), route('backend.user.create'));
});

Breadcrumbs::for('backend.user.edit', function ($trail, $element) {
    $trail->parent('backend.home');
    $trail->push('users', route('backend.user.index', ['role_id' => $element->role_id]));
    $trail->push(trans('general.edit_user'), route('backend.user.edit', $element->id));
});

Breadcrumbs::for('backend.gallery.create', function ($trail) {
    $trail->parent('backend.gallery.index');
//    $trail->push(request()->type, route('backend.' . request()->type . '.index'));
    return $trail->push(trans('create gallery'), route('backend.gallery.create', ['type' => request()->type, 'element_id' => request()->element_id]));
});

Breadcrumbs::for('backend.gallery.edit', function ($trail, $element) {
    $trail->parent('backend.gallery.index');
    $className = strtolower(class_basename($element->galleryable));
    $trail->push($className, route('backend.' . $className . '.index'));
    return $trail->push(trans('general.edit_gallery'), route('backend.gallery.edit', ['id' => $element->id, 'type' => $className, 'element_id' => $element->galleryable->id]));

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

Breadcrumbs::for('backend.page.create', function ($trail) {
    $trail->parent('backend.page.index');
    $trail->push(trans('create page'), route('backend.page.create'));
});

Breadcrumbs::for('backend.page.edit', function ($trail, $element) {
    $trail->parent('backend.page.index');
    $trail->push(trans('edit page'), route('backend.page.edit', $element->id));
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


Breadcrumbs::for('backend.policy.create', function ($trail) {
    $trail->parent('backend.policy.index');
    $trail->push(trans('create policy'), route('backend.policy.create'));
});

Breadcrumbs::for('backend.policy.edit', function ($trail, $element) {
    $trail->parent('backend.policy.index');
    $trail->push(trans('edit policy'), route('backend.policy.edit', $element->id));
});


Breadcrumbs::for('backend.currency.create', function ($trail) {
    $trail->parent('backend.currency.index');
    $trail->push(trans('create currency'), route('backend.currency.create'));
});

Breadcrumbs::for('backend.currency.edit', function ($trail, $element) {
    $trail->parent('backend.currency.index');
    return $trail->push(trans('edit currency'), route('backend.currency.edit', $element->id));
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



