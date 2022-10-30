<?php
$logo = asset(Storage::url('uploads/logo/'));
$company_logo = \App\Models\Utility::GetLogo();

$users = \Auth::user();
$profile = asset(Storage::url('uploads/avatar/'));
$currantLang = $users->currentLanguage();

?>


<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <nav class="dash-sidebar light-sidebar transprent-bg">
<?php else: ?>
    <nav class="dash-sidebar light-sidebar">
<?php endif; ?>




    <div class="navbar-wrapper">
        <div class="m-header main-logo">
            <a href="<?php echo e(route('home')); ?>" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                

                    <img src="<?php echo e($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png')); ?>"
                    alt="<?php echo e(config('app.name', 'HRMGo')); ?>" width="70" class="logo logo-lg">

              </a>
        </div>
        <div class="navbar-content">
            <ul class="dash-navbar">

                <!-- dashboard-->
                <!-- <li class="dash-item">
                    <a href="<?php echo e(route('home')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-home"></i></span><span
                            class="dash-mtext"><?php echo e(__('Dashboard')); ?></span></a>
                </li> -->
                <li
                        class="dash-item dash-hasmenu  <?php echo e(Request::segment(1) == 'null' ? 'active dash-trigger' : ''); ?>">
                        <a href="#" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-home"></i></span><span
                                class="dash-mtext"><?php echo e(__('Dashboard')); ?></span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu ">
                            <li class="dash-item <?php echo e(( Request::segment(1) == null   || Request::segment(1) == 'report') ? ' active dash-trigger' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('home')); ?>"><?php echo e(__('Overview')); ?></a>
                            </li>

                            <?php if(Gate::check('Manage Report')): ?>
                    <li class="dash-item dash-hasmenu">
                        <a href="#!" class="dash-link"><span class=""><i
                                    class=""></i></span><span
                                class="dash-mtext"><?php echo e(__('Report')); ?></span><span
                                class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Report')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.income-expense')); ?>"><?php echo e(__('Income Vs Expense')); ?></a>
                                </li>

                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.monthly.attendance')); ?>"><?php echo e(__('Monthly Attendance')); ?></a>
                                </li>

                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.leave')); ?>"><?php echo e(__('Leave')); ?></a>
                                </li>


                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.account.statement')); ?>"><?php echo e(__('Account Statement')); ?></a>
                                </li>








                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.timesheet')); ?>"><?php echo e(__('Timesheet')); ?></a>
                                </li>
                            <?php endif; ?>


                        </ul>
                    </li>
                <?php endif; ?>


                </ul>
            </li>
                <!--dashboard-->

                <!-- user-->
                <?php if(\Auth::user()->type == 'super admin'): ?>
                    <li class="dash-item">
                        <a href="<?php echo e(route('user.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-user"></i></span><span
                                class="dash-mtext"><?php echo e(__('Center')); ?></span></a>
                    </li>
                <?php else: ?>
                    <?php if(Gate::check('Manage User') || Gate::check('Manage Role') || Gate::check('Manage Employee Profile') || Gate::check('Manage Employee Last Login')): ?>
                        <li class="dash-item dash-hasmenu">
                            <a href="#!" class="dash-link"><span class="dash-micon"><i
                                        class="ti ti-users"></i></span><span
                                    class="dash-mtext"><?php echo e(__('Staff')); ?></span><span class="dash-arrow"><i
                                        data-feather="chevron-right"></i></span></a>
                            <ul class="dash-submenu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage User')): ?>
                                    <li class="dash-item">
                                        <a class="dash-link"
                                            href="<?php echo e(route('user.index')); ?>"><?php echo e(__('User')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Role')): ?>
                                    <li class="dash-item">
                                        <a class="dash-link"
                                            href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('Role')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Employee Profile')): ?>
                                    <li class="dash-item">
                                        <a class="dash-link"
                                            href="<?php echo e(route('employee.profile')); ?>"><?php echo e(__('Employee Profile')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Employee Last Login')): ?>
                                    <li class="dash-item">
                                        <a class="dash-link"
                                            href="<?php echo e(route('lastlogin')); ?>"><?php echo e(__('Last Login')); ?></a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- user-->

                <!-- employee-->
                <?php if(Gate::check('Manage Employee')): ?>
                    <?php if(\Auth::user()->type == 'employee'): ?>
                        <?php
                            $employee = App\Models\Employee::where('user_id', \Auth::user()->id)->first();
                        ?>
                        <li class="dash-item <?php echo e(Request::segment(1) == 'employee' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id))); ?>"
                                class="dash-link"><span class="dash-micon"><i
                                        class="ti ti-user"></i></span><span
                                    class="dash-mtext"><?php echo e(__('Employee')); ?></span></a>
                        </li>
                    <?php else: ?>
                        <li class="dash-item <?php echo e(Request::segment(1) == 'employee' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('employee.index')); ?>" class="dash-link"><span
                                    class="dash-micon"><i class="ti ti-user"></i></span><span
                                    class="dash-mtext"><?php echo e(__('Employee')); ?></span></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- employee-->

                <!-- payroll-->




















                <!-- payroll-->





















                <!-- timesheet-->
                <?php if(Gate::check('Manage Attendance') || Gate::check('Manage Leave') || Gate::check('Manage TimeSheet')): ?>
                    <li class="dash-item dash-hasmenu">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-clock"></i></span><span
                                class="dash-mtext"><?php echo e(__('Timesheet')); ?></span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage TimeSheet')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('timesheet.index')); ?>"><?php echo e(__('Timesheet')); ?></a>
                                </li>
                            <?php endif; ?>






                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Attendance')): ?>
                                <li class="dash-item dash-hasmenu">
                                    <a href="#!" class="dash-link"><span
                                            class="dash-mtext"><?php echo e(__('Attendance')); ?></span><span
                                            class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="dash-submenu">
                                        <li class="dash-item">
                                            <a class="dash-link"
                                                href="<?php echo e(route('attendanceemployee.index')); ?>"><?php echo e(__('Marked Attendance')); ?></a>
                                        </li>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Attendance')): ?>
                                            <li class="dash-item">
                                                <a class="dash-link"
                                                    href="<?php echo e(route('attendanceemployee.bulkattendance')); ?>"><?php echo e(__('Bulk Attendance')); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <!--timesheet-->

                <!-- performance-->






























                <!--performance-->

                <!--fianance-->
                <?php if(Gate::check('Manage Account List') || Gate::check('Manage Payee') || Gate::check('Manage Payer') || Gate::check('Manage Deposit') || Gate::check('Manage Expense') || Gate::check('Manage Transfer Balance')): ?>
                    <li class="dash-item dash-hasmenu">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-wallet"></i></span><span
                                class="dash-mtext"><?php echo e(__('Finance')); ?></span><span class="dash-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Account List')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('accountlist.index')); ?>"><?php echo e(__('Account List')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View Balance Account List')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('accountbalance')); ?>"><?php echo e(__('Account Balance')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payee')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('payees.index')); ?>"><?php echo e(__('Payees')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payer')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('payer.index')); ?>"><?php echo e(__('Payers')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Deposit')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('deposit.index')); ?>"><?php echo e(__('Deposit')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Expense')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('expense.index')); ?>"><?php echo e(__('Expense')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Transfer Balance')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('transferbalance.index')); ?>"><?php echo e(__('Transfer Balance')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <!-- fianance-->

                <!--trainning-->

























                <!-- tranning-->


                <!-- HR-->


















































                <!-- HR-->

                <!-- recruitment-->































































                <!-- recruitment-->

                <!--chats-->








                <!-- ticket-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Ticket')): ?>
                    <li class="dash-item <?php echo e(Request::segment(1) == 'ticket' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('ticket.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-ticket"></i></span><span
                                class="dash-mtext"><?php echo e(__('Ticket')); ?></span></a>
                    </li>
                <?php endif; ?>

                <!-- Event-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Event')): ?>
                    <li class="dash-item">
                        <a href="<?php echo e(route('event.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-calendar-event"></i></span><span
                                class="dash-mtext"><?php echo e(__('Event')); ?></span></a>
                    </li>
                <?php endif; ?>


                <!--meeting-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Meeting')): ?>
                    <li class="dash-item <?php echo e(Request::segment(1) == 'meeting' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('meeting.index')); ?>" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-calendar-time"></i></span><span
                                class="dash-mtext"><?php echo e(__('Meeting')); ?></span></a>
                    </li>
                <?php endif; ?>


                <!-- Zoom meeting-->
                <?php if(\Auth::user()->type != 'super admin'): ?>
                    <li class="dash-item <?php echo e(Request::segment(1) == 'zoommeeting' ? 'active' : ''); ?>">
                        <a href="#" class="dash-link"><span
                                class="dash-micon"><i class="ti ti-video"></i></span><span
                                class="dash-mtext"><?php echo e(__('Zoom Meeting')); ?></span></a>




                    </li>
                <?php endif; ?>

                <!-- assets-->
                <?php if(Gate::check('Manage Assets')): ?>
                    <li class="dash-item">
                        <a href="<?php echo e(route('account-assets.index')); ?>" class="dash-link"><span
                                class="dash-micon"><i class="ti ti-medical-cross"></i></span><span
                                class="dash-mtext"><?php echo e(__('Assets')); ?></span></a>
                    </li>
                <?php endif; ?>


                <!-- document-->
                <?php if(Gate::check('Manage Document')): ?>
                    <li class="dash-item">
                        <a href="#" class="dash-link"><span
                                class="dash-micon"><i class="ti ti-file"></i></span><span
                                class="dash-mtext"><?php echo e(__('Document')); ?></span>
                        </a>





                    </li>
                <?php endif; ?>

                <!--company policy-->




















































                <!--report-->
                <?php if(Gate::check('Manage Report')): ?>
                    <li class="dash-item dash-hasmenu">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i
                                    class="ti ti-list"></i></span><span
                                class="dash-mtext"><?php echo e(__('Report')); ?></span><span
                                class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Report')): ?>
                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.income-expense')); ?>"><?php echo e(__('Income Vs Expense')); ?></a>
                                </li>

                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.monthly.attendance')); ?>"><?php echo e(__('Monthly Attendance')); ?></a>
                                </li>







                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.account.statement')); ?>"><?php echo e(__('Account Statement')); ?></a>
                                </li>








                                <li class="dash-item">
                                    <a class="dash-link"
                                        href="<?php echo e(route('report.timesheet')); ?>"><?php echo e(__('Timesheet')); ?></a>
                                </li>
                            <?php endif; ?>


                        </ul>
                    </li>
                <?php endif; ?>


                <!--constant-->
                <?php if(Gate::check('Manage Department') ||
                    Gate::check('Manage Designation') ||
                    Gate::check('Manage Document Type') ||
                    Gate::check('Manage Branch') ||
                    Gate::check('Manage Award Type') ||
                    Gate::check('Manage Termination Types') ||
                    Gate::check('Manage Payslip Type') ||
                    Gate::check('Manage Allowance Option') ||
                    Gate::check('Manage Loan Options') ||
                    Gate::check('Manage Deduction Options') ||
                    Gate::check('Manage Expense Type') ||
                    Gate::check('Manage Income Type') ||
                    Gate::check('Manage Payment Type') ||
                    Gate::check('Manage Leave Type') ||
                    Gate::check('Manage Training Type') ||
                    Gate::check('Manage Job Category') ||
                    Gate::check('Manage Job Stage')): ?>
                    <li class="dash-item dash-hasmenu">




                        <!-- <ul class="dash-submenu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Branch')): ?>
                                <li class="dash-item <?php echo e(request()->is('branch*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('branch.index')); ?>"><?php echo e(__('Branch')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Department')): ?>
                                <li class="dash-item <?php echo e(request()->is('department*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('department.index')); ?>"><?php echo e(__('Department')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Designation')): ?>
                                <li class="dash-item <?php echo e(request()->is('designation*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('designation.index')); ?>"><?php echo e(__('Designation')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Document Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('document*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('document.index')); ?>"><?php echo e(__('Document Type')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Award Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('awardtype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('awardtype.index')); ?>"><?php echo e(__('Award Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Termination Types')): ?>
                                <li
                                    class="dash-item <?php echo e(request()->is('terminationtype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('terminationtype.index')); ?>"><?php echo e(__('Termination Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payslip Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('paysliptype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('paysliptype.index')); ?>"><?php echo e(__('Payslip Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Allowance Option')): ?>
                                <li
                                    class="dash-item <?php echo e(request()->is('allowanceoption*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('allowanceoption.index')); ?>"><?php echo e(__('Allowance Option')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Loan Option')): ?>
                                <li class="dash-item <?php echo e(request()->is('loanoption*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('loanoption.index')); ?>"><?php echo e(__('Loan Option')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Deduction Option')): ?>
                                <li
                                    class="dash-item <?php echo e(request()->is('deductionoption*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('deductionoption.index')); ?>"><?php echo e(__('Deduction Option')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Expense Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('expensetype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('expensetype.index')); ?>"><?php echo e(__('Expense Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Income Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('incometype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('incometype.index')); ?>"><?php echo e(__('Income Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payment Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('paymenttype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('paymenttype.index')); ?>"><?php echo e(__('Payment Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Leave Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('leavetype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('leavetype.index')); ?>"><?php echo e(__('Leave Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Termination Type')): ?>
                                <li
                                    class="dash-item <?php echo e(request()->is('terminationtype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('terminationtype.index')); ?>"><?php echo e(__('Termination Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Goal Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('goaltype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('goaltype.index')); ?>"><?php echo e(__('Goal Type')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Training Type')): ?>
                                <li class="dash-item <?php echo e(request()->is('trainingtype*') ? 'active' : ''); ?>">
                                    <a class="dash-link"
                                        href="<?php echo e(route('trainingtype.index')); ?>"><?php echo e(__('Training Type')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(\Auth::user()->type !== 'hr'): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Job Category')): ?>
                                    <li
                                        class="dash-item <?php echo e(request()->is('job-category*') ? 'active' : ''); ?>">
                                        <a class="dash-link"
                                            href="<?php echo e(route('job-category.index')); ?>"><?php echo e(__('Job Category')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(\Auth::user()->type !== 'hr'): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Job Stage')): ?>
                                    <li
                                        class="dash-item <?php echo e(request()->is('job-stage*') ? 'active' : ''); ?>">
                                        <a class="dash-link"
                                            href="<?php echo e(route('job-stage.index')); ?>"><?php echo e(__('Job Stage')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <li
                                class="dash-item <?php echo e(request()->is('performanceType*') ? 'active' : ''); ?>">
                                <a class="dash-link"
                                    href="<?php echo e(route('performanceType.index')); ?>"><?php echo e(__('Performance Type')); ?></a>
                            </li>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Competencies')): ?>
                                <li class="dash-item <?php echo e(request()->is('competencies*') ? 'active' : ''); ?>">

                                    <a class="dash-link"
                                        href="<?php echo e(route('competencies.index')); ?>"><?php echo e(__('Competencies')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul> -->
                <?php endif; ?>
                <!--constant-->


                <?php if(Gate::check('Manage Company Settings') || Gate::check('Manage System Settings')): ?>
                    <li class="dash-item ">
                        <a href="<?php echo e(route('settings.index')); ?>" class="dash-link"><span
                                class="dash-micon"><i class="ti ti-settings"></i></span><span
                                class="dash-mtext"><?php echo e(__('System Setting')); ?></span></a>

                    </li>
                <?php endif; ?>

</ul>

</div>
</div>
</nav>
<?php /**PATH /Users/owaisimam/PhpStormProjects/al_qaim_trust/resources/views/partial/Admin/menu.blade.php ENDPATH**/ ?>