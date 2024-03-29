<?php $__env->startSection('page-title'); ?>
   <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>


    <?php if(\Auth::user()->type == 'employee'): ?>
        

        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Calendar')); ?></h5>
                </div>
                <div class="card-body">
                    <div id='event_calendar' class='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Mark Attandance')); ?></h5>
                </div>
                <div class="card-body">
                    <p class="text-muted pb-0-5">
                        <?php echo e(__('My Office Time: ' . $officeTime['startTime'] . ' to ' . $officeTime['endTime'])); ?></p>
                        <div class="row">
                            <div class="col-md-6 float-right border-right">
                                <?php echo e(Form::open(['url' => 'attendanceemployee/attendance', 'method' => 'post'])); ?>

                                <?php if(empty($employeeAttendance) || $employeeAttendance->clock_out != '00:00:00'): ?>
                                    <button type="submit" value="0" name="in" id="clock_in"
                                        class="btn btn-primary"><?php echo e(__('CLOCK IN')); ?></button>
                                <?php else: ?>
                                    <button type="submit" value="0" name="in" id="clock_in"
                                        class="btn btn-primary disabled"
                                        disabled><?php echo e(__('CLOCK IN')); ?></button>
                                <?php endif; ?>
                                <?php echo e(Form::close()); ?>

                            </div>
                            <div class="col-md-6 float-left">
                                <?php if(!empty($employeeAttendance) && $employeeAttendance->clock_out == '00:00:00'): ?>
                                    <?php echo e(Form::model($employeeAttendance, ['route' => ['attendanceemployee.update', $employeeAttendance->id], 'method' => 'PUT'])); ?>

                                    <button type="submit" value="1" name="out" id="clock_out"
                                        class="btn btn-danger"><?php echo e(__('CLOCK OUT')); ?></button>
                                <?php else: ?>
                                    <button type="submit" value="1" name="out" id="clock_out"
                                        class="btn btn-danger disabled"
                                        disabled><?php echo e(__('CLOCK OUT')); ?></button>
                                <?php endif; ?>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                </div>
            </div>
            <div class="card" style="height: 402px;">
                <div class="card-header card-body table-border-style">
                    <h5><?php echo e(__('Meeting schedule')); ?></h5>
                </div>
                <div class="card-body" style="height: 320px">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Meeting title')); ?></th>
                                    <th><?php echo e(__('Meeting Date')); ?></th>
                                    <th><?php echo e(__('Meeting Time')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($meeting->title); ?></td>
                                        <td><?php echo e(\Auth::user()->dateFormat($meeting->date)); ?></td>
                                        <td><?php echo e(\Auth::user()->timeFormat($meeting->time)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-body table-border-style">
                    <h5><?php echo e(__('Announcement List')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Title')); ?></th>
                                    <th><?php echo e(__('Start Date')); ?></th>
                                    <th><?php echo e(__('End Date')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($announcement->title); ?></td>
                                        <td><?php echo e(\Auth::user()->dateFormat($announcement->start_date)); ?></td>
                                        <td><?php echo e(\Auth::user()->dateFormat($announcement->end_date)); ?></td>
                                        <td><?php echo e($announcement->description); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-lg-2 col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="theme-avtar bg-primary">
                                <i class="ti ti-users"></i>
                            </div>
                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                            <h6 class="mb-3"><?php echo e(__('Staff')); ?></h6>
                            <h5 class="mb-0 text-primary"><?php echo e($countUser + $countEmployee); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="theme-avtar bg-info">
                                <i class="ti ti-ticket"></i>
                            </div>
                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                            <h6 class="mb-3"><?php echo e(__('Ticket')); ?></h6>
                            <h5 class="mb-0 text-info"><?php echo e($countTicket); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-4">
                    <div class="card dash-card" >
                        <div class="card-body">
                            <div class="theme-avtar bg-warning">
                                <i class="ti ti-wallet"></i>
                            </div>
                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                            <h6 class="mb-3"><?php echo e(__('Account Balance')); ?></h6>
                            <h5 class="mb-0 text-warning"><?php echo e(\Auth::user()->priceFormat($accountBalance)); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="theme-avtar bg-primary">
                                <i class="ti ti-cast"></i>
                            </div>
                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                            <h6 class="mb-3"><?php echo e(__('Jobs')); ?></h6>
                            <h5 class="mb-0 text-primary"><?php echo e($activeJob + $inActiveJOb); ?></h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="theme-avtar bg-info">
                                <i class="ti ti-cast"></i>
                            </div>
                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Active')); ?></p>
                            <h6 class="mb-3"><?php echo e(__('Jobs')); ?></h6>
                            <h5 class="mb-0 text-info"><?php echo e($activeJob); ?></h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-4">
                    <div class="card dash-card" >
                        <div class="card-body">
                            <div class="theme-avtar bg-warning">
                                <i class="ti ti-cast"></i>
                            </div>
                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Inactive')); ?></p>
                            <h6 class="mb-3"><?php echo e(__('Jobs')); ?></h6>
                            <h5 class="mb-0 text-warning"><?php echo e($inActiveJOb); ?></h5>

                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="col-xxl-12">
            <div class="row">
              <div class="col-xl-5">

                <div class="card">
                    <div class="card-header card-body table-border-style">
                        <h5><?php echo e(__('Meeting schedule')); ?></h5>
                    </div>
                    <div class="card-body" style="height: 290px; overflow:auto">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Title')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Time')); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($meeting->title); ?></td>
                                            <td><?php echo e(\Auth::user()->dateFormat($meeting->date)); ?></td>
                                            <td><?php echo e(\Auth::user()->timeFormat($meeting->time)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header card-body table-border-style">
                        <h5><?php echo e(__("Today's Not Clock In")); ?></h5>
                    </div>
                    <div class="card-body" style="height: 295px; overflow:auto">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Name')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php $__currentLoopData = $notClockIns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notClockIn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($notClockIn->name); ?></td>
                                            <td><span class="absent-btn"><?php echo e(__('Absent')); ?></span></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              </div>
              <div class="col-xl-7">
                <div class="card">
                    <div class="card-header">
                    <h5><?php echo e(__('Calendar')); ?></h5>
                    </div>
                    <div class="card-body card-635 " style="overflow:auto " >
                        <div id='calendar' class='calendar'></div>
                    </div>
                </div>
              </div>
            </div>
        </div>
        
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-body table-border-style">
                    <h5><?php echo e(__('Announcement List')); ?></h5>
                </div>
                <div class="card-body" style="height: 270px; overflow:auto">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Title')); ?></th>
                                    <th><?php echo e(__('Start Date')); ?></th>
                                    <th><?php echo e(__('End Date')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($announcement->title); ?></td>
                                        <td><?php echo e(\Auth::user()->dateFormat($announcement->start_date)); ?></td>
                                        <td><?php echo e(\Auth::user()->dateFormat($announcement->end_date)); ?></td>
                                        <td><?php echo e($announcement->description); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <?php endif; ?>
<?php $__env->stopSection(); ?>




<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/main.min.js')); ?>"></script>
    <script type="text/javascript">
        (function() {
            var etitle;
            var etype;
            var etypeclass;
            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek,dayGridMonth'
                },
                buttonText: {
                    timeGridDay: "<?php echo e(__('Day')); ?>",
                    timeGridWeek: "<?php echo e(__('Week')); ?>",
                    dayGridMonth: "<?php echo e(__('Month')); ?>"
                },
                themeSystem: 'bootstrap',

                slotDuration: '00:10:00',
                navLinks: true,
                droppable: true,
                selectable: true,
                selectMirror: true,
                editable: true,
                dayMaxEvents: true,
                handleWindowResize: true,
                events: <?php echo json_encode($arrEvents); ?>,


            });

            calendar.render();
        })();
    </script>
    
    <script>

        (function() {
            var etitle;
            var etype;
            var etypeclass;
            var calendar = new FullCalendar.Calendar(document.getElementById('event_calendar'), {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek,dayGridMonth'
                },
                buttonText: {
                    timeGridDay: "<?php echo e(__('Day')); ?>",
                    timeGridWeek: "<?php echo e(__('Week')); ?>",
                    dayGridMonth: "<?php echo e(__('Month')); ?>"
                },
                themeSystem: 'bootstrap',

                slotDuration: '00:10:00',
                navLinks: true,
                droppable: true,
                selectable: true,
                selectMirror: true,
                editable: true,
                dayMaxEvents: true,
                handleWindowResize: true,
                events: <?php echo json_encode($arrEvents); ?>,


            });

            calendar.render();
        })();
    </script>
    
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\al_qaim_trust\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>