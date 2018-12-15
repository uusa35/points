@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body">
            <div class="pricing-content-1">
                <div class="row">
                    <div class="col-md-3">
                        <div class="price-column-container border-active">
                            <div class="price-table-head bg-blue">
                                <h2 class="no-margin">Budget</h2>
                            </div>
                            <div class="arrow-down border-top-blue"></div>
                            <div class="price-table-pricing">
                                <h3>
                                    <span class="price-sign">$</span>24</h3>
                                <p>per month</p>
                            </div>
                            <div class="price-table-content">
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">3 Members</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-drawer"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">50GB Storage</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-screen-smartphone"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">Single Device</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-refresh"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">Weekly Backups</div>
                                </div>
                            </div>
                            <div class="arrow-down arrow-grey"></div>
                            <div class="price-table-footer">
                                <button type="button" class="btn grey-salsa btn-outline sbold uppercase price-button">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="price-column-container border-active">
                            <div class="price-table-head bg-red">
                                <h2 class="no-margin">Solo</h2>
                            </div>
                            <div class="arrow-down border-top-red"></div>
                            <div class="price-table-pricing">
                                <h3>
                                    <span class="price-sign">$</span>39</h3>
                                <p>per month</p>
                            </div>
                            <div class="price-table-content">
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">5 Members</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-drawer"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">100GB Storage</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-screen-smartphone"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">Single Device</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-refresh"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">Weekly Backups</div>
                                </div>
                            </div>
                            <div class="arrow-down arrow-grey"></div>
                            <div class="price-table-footer">
                                <button type="button" class="btn grey-salsa btn-outline price-button sbold uppercase">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="price-column-container border-active">
                            <div class="price-table-head bg-green">
                                <h2 class="no-margin">Start up</h2>
                            </div>
                            <div class="arrow-down border-top-green"></div>
                            <div class="price-table-pricing">
                                <h3>
                                    <span class="price-sign">$</span>59</h3>
                                <p>per month</p>
                                <div class="price-ribbon">Popular</div>
                            </div>
                            <div class="price-table-content">
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-user-follow"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">20 Members</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-drawer"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">500GB Storage</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-cloud-download"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">Cloud Syncing</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-refresh"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">Daily Backups</div>
                                </div>
                            </div>
                            <div class="arrow-down arrow-grey"></div>
                            <div class="price-table-footer">
                                <button type="button" class="btn green price-button sbold uppercase">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="price-column-container border-active">
                            <div class="price-table-head bg-purple">
                                <h2 class="no-margin">Enterprise</h2>
                            </div>
                            <div class="arrow-down border-top-purple"></div>
                            <div class="price-table-pricing">
                                <h3>
                                    <span class="price-sign">$</span>128</h3>
                                <p>per month</p>
                            </div>
                            <div class="price-table-content">
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-users"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">100 Members</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-drawer"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">2TB Storage</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-cloud-download"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">Cloud Syncing</div>
                                </div>
                                <div class="row mobile-padding">
                                    <div class="col-xs-3 text-right mobile-padding">
                                        <i class="icon-refresh"></i>
                                    </div>
                                    <div class="col-xs-9 text-left mobile-padding">Weekly Backups</div>
                                </div>
                            </div>
                            <div class="arrow-down arrow-grey"></div>
                            <div class="price-table-footer">
                                <button type="button" class="btn grey-salsa btn-outline price-button sbold uppercase">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
