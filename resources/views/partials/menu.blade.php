<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('setting_access')
                <li class="{{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                    <a href="{{ route("admin.settings.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.setting.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('folder_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-folder">

                        </i>
                        <span>{{ trans('cruds.folder.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('case_file_access')
                            <li class="{{ request()->is("admin/case-files") || request()->is("admin/case-files/*") ? "active" : "" }}">
                                <a href="{{ route("admin.case-files.index") }}">
                                    <i class="fa-fw fas fa-folder-open">

                                    </i>
                                    <span>{{ trans('cruds.caseFile.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('contract_access')
                            <li class="{{ request()->is("admin/contracts") || request()->is("admin/contracts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contracts.index") }}">
                                    <i class="fa-fw fas fa-folder-open">

                                    </i>
                                    <span>{{ trans('cruds.contract.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('company_contract_access')
                            <li class="{{ request()->is("admin/company-contracts") || request()->is("admin/company-contracts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.company-contracts.index") }}">
                                    <i class="fa-fw fas fa-folder-open">

                                    </i>
                                    <span>{{ trans('cruds.companyContract.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('other_case_access')
                            <li class="{{ request()->is("admin/other-cases") || request()->is("admin/other-cases/*") ? "active" : "" }}">
                                <a href="{{ route("admin.other-cases.index") }}">
                                    <i class="fa-fw fas fa-folder-open">

                                    </i>
                                    <span>{{ trans('cruds.otherCase.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('customers_control_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-user-cog">

                        </i>
                        <span>{{ trans('cruds.customersControl.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('customer_access')
                            <li class="{{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.customers.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.customer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('payment_access')
                            <li class="{{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                <a href="{{ route("admin.payments.index") }}">
                                    <i class="fa-fw fas fa-money-bill-wave">

                                    </i>
                                    <span>{{ trans('cruds.payment.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('court_access')
                <li class="{{ request()->is("admin/courts") || request()->is("admin/courts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.courts.index") }}">
                        <i class="fa-fw fas fa-balance-scale">

                        </i>
                        <span>{{ trans('cruds.court.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('lawyer_access')
                <li class="{{ request()->is("admin/lawyers") || request()->is("admin/lawyers/*") ? "active" : "" }}">
                    <a href="{{ route("admin.lawyers.index") }}">
                        <i class="fa-fw fas fa-male">

                        </i>
                        <span>{{ trans('cruds.lawyer.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('basi_access')
                <li class="{{ request()->is("admin/basis") || request()->is("admin/basis/*") ? "active" : "" }}">
                    <a href="{{ route("admin.basis.index") }}">
                        <i class="fa-fw fas fa-book-open">

                        </i>
                        <span>{{ trans('cruds.basi.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('proccess_access')
                <li class="{{ request()->is("admin/proccesses") || request()->is("admin/proccesses/*") ? "active" : "" }}">
                    <a href="{{ route("admin.proccesses.index") }}">
                        <i class="fa-fw fas fa-tasks">

                        </i>
                        <span>{{ trans('cruds.proccess.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('procedural_process_access')
                <li class="{{ request()->is("admin/procedural-processes") || request()->is("admin/procedural-processes/*") ? "active" : "" }}">
                    <a href="{{ route("admin.procedural-processes.index") }}">
                        <i class="fa-fw fas fa-archive">

                        </i>
                        <span>{{ trans('cruds.proceduralProcess.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('case_type_access')
                <li class="{{ request()->is("admin/case-types") || request()->is("admin/case-types/*") ? "active" : "" }}">
                    <a href="{{ route("admin.case-types.index") }}">
                        <i class="fa-fw fas fa-qrcode">

                        </i>
                        <span>{{ trans('cruds.caseType.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('case_status_access')
                <li class="{{ request()->is("admin/case-statuses") || request()->is("admin/case-statuses/*") ? "active" : "" }}">
                    <a href="{{ route("admin.case-statuses.index") }}">
                        <i class="fa-fw fas fa-columns">

                        </i>
                        <span>{{ trans('cruds.caseStatus.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('one_time_fee_access')
                <li class="{{ request()->is("admin/one-time-fees") || request()->is("admin/one-time-fees/*") ? "active" : "" }}">
                    <a href="{{ route("admin.one-time-fees.index") }}">
                        <i class="fa-fw fas fa-dollar-sign">

                        </i>
                        <span>{{ trans('cruds.oneTimeFee.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('contract_type_access')
                <li class="{{ request()->is("admin/contract-types") || request()->is("admin/contract-types/*") ? "active" : "" }}">
                    <a href="{{ route("admin.contract-types.index") }}">
                        <i class="fa-fw fas fa-box">

                        </i>
                        <span>{{ trans('cruds.contractType.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('company_type_access')
                <li class="{{ request()->is("admin/company-types") || request()->is("admin/company-types/*") ? "active" : "" }}">
                    <a href="{{ route("admin.company-types.index") }}">
                        <i class="fa-fw far fa-building">

                        </i>
                        <span>{{ trans('cruds.companyType.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('company_contract_alteration_access')
                <li class="{{ request()->is("admin/company-contract-alterations") || request()->is("admin/company-contract-alterations/*") ? "active" : "" }}">
                    <a href="{{ route("admin.company-contract-alterations.index") }}">
                        <i class="fa-fw fas fa-chalkboard-teacher">

                        </i>
                        <span>{{ trans('cruds.companyContractAlteration.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('other_case_type_access')
                <li class="{{ request()->is("admin/other-case-types") || request()->is("admin/other-case-types/*") ? "active" : "" }}">
                    <a href="{{ route("admin.other-case-types.index") }}">
                        <i class="fa-fw far fa-folder-open">

                        </i>
                        <span>{{ trans('cruds.otherCaseType.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('hearing_access')
                <li class="{{ request()->is("admin/hearings") || request()->is("admin/hearings/*") ? "active" : "" }}">
                    <a href="{{ route("admin.hearings.index") }}">
                        <i class="fa-fw fas fa-gavel">

                        </i>
                        <span>{{ trans('cruds.hearing.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('finance_access')
                <li class="{{ request()->is("admin/finances") || request()->is("admin/finances/*") ? "active" : "" }}">
                    <a href="{{ route("admin.finances.index") }}">
                        <i class="fa-fw fas fa-hand-holding-usd">

                        </i>
                        <span>{{ trans('cruds.finance.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('calendar_access')
                <li class="{{ request()->is("admin/calendars") || request()->is("admin/calendars/*") ? "active" : "" }}">
                    <a href="{{ route("admin.calendars.index") }}">
                        <i class="fa-fw fas fa-calendar-alt">

                        </i>
                        <span>{{ trans('cruds.calendar.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('foldernumber_access')
                <li class="{{ request()->is("admin/foldernumbers") || request()->is("admin/foldernumbers/*") ? "active" : "" }}">
                    <a href="{{ route("admin.foldernumbers.index") }}">
                        <i class="fa-fw fas fa-list-ol">

                        </i>
                        <span>{{ trans('cruds.foldernumber.title') }}</span>

                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>