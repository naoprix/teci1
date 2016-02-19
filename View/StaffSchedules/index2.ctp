<!-- File: /app/View/StaffSchedules/index.ctp -->


<?php echo $this->Html->css(array('staffschedules', 'tooltipster')); ?>

<script type="text/javascript" src="js/jquery.tooltipster.js"></script>

<script>
    $(document).ready(function() {
        $('.assign').tooltipster();
        }
    });
</script>


<div id="menu_bar"><?php echo ($this->element('menu')); ?> </div>

<?php
    $today =new DateTime();
    $period = new DatePeriod(
        new DateTime('first day of'.$today->format('Y-m-d')),
        new DateInterval('P1D'),
        new DateTime('last day of'.$today->format('Y-m-d').'+2month 1 second')
    );
?>

<h2>出張予定表</h2>

<?php pr($staff); ?>

<table>
    <tr>
        <th class="name">氏 名</th>

        <th class="destination">現在赴任地</th>

        <?php
        foreach ($period as $data) {
            if (($data->format('d')%10 == 0)or($data->format('d') == 1)){
                echo '<th class="date">'.$data->format('d').'</th>';
            }elseif ($data->format('d')%5 == 0){
                echo '<th class="date">'."+".'</th>';  
            }else{
                echo '<th class="date">'."".'</th>';
            }
        }
        ?>
    </tr>

    <?php foreach ($staff as $name): ?>
    <tr>
        <td><?php echo $name['User']['name']; ?></td>
    </tr>

    <tr>
    <?php if (!empty($name['StaffSchedule'])) :?>
        <?php foreach ($name as $data): ?>

            <td class="destination">
            <?php 
                if (($today->format('Y-m-d') >= $data['StaffSchedule']['from'])
                        and($today->format('Y-m-d') <= $data['StaffSchedule']['to'])) {
                    echo $data['StaffSchedule']['destination'];
                }else{
                    echo '('.$data['StaffSchedule']['destination'].')';
                }
            ?>
            </td>


        <?php endforeach; ?>
    <?php endif; ?>
    </tr>
    <?php endforeach; ?>

</table>

<table>
    <tr>
        <th class="name">氏 名</th>

        <th class="destination">現在赴任地</th>

        <?php
        foreach ($period as $data) {
            if (($data->format('d')%10 == 0)or($data->format('d') == 1)){
                echo '<th class="date">'.$data->format('d').'</th>';
            }elseif ($data->format('d')%5 == 0){
                echo '<th class="date">'."+".'</th>';  
            }else{
                echo '<th class="date">'."".'</th>';
            }
        }
        ?>
    </tr>

    <?php foreach ($schedule as $data): ?>
    <tr>
        <td><?php echo $this->Html->link(
                $data['StaffSchedule']['name'],
                array('action' => 'view', $data['StaffSchedule']['id'])); ?></td>

        <td class="destination">
        <?php 
            if (($today->format('Y-m-d') >= $data['StaffSchedule']['from'])
                    and($today->format('Y-m-d') <= $data['StaffSchedule']['to'])) {
                echo $data['StaffSchedule']['destination'];
            }else{
                echo '('.$data['StaffSchedule']['destination'].')';
            }
        ?>
        </td>

        <?php
        foreach ($period as $day) {
            if ($day->format('Y-m-d') < $data['StaffSchedule']['from']) {
                if ($day->format('Y-m-d') != $today->format('Y-m-d')) {
                    echo '<td class="date"></td>';
                }else{
                    echo '<td class="date">'."*".'</td>';
                }
            }elseif ($day->format('Y-m-d') <= $data['StaffSchedule']['to']){
                if ($day->format('Y-m-d') != $today->format('Y-m-d')) {
                    echo '<td 
                            class="assign" 
                            title="' 
                                .$data['StaffSchedule']['destination']
                                //.$data['StafSchedule']['from']
                                //.$data['StafSchedule']['to']
                                .'" bgcolor="red"></td>';
                }else{
                    echo '<td 
                            class="assign" 
                            title="' 
                                .$data['StaffSchedule']['destination']
                                //.$data['StafSchedule']['from']
                                //.$data['StafSchedule']['to']
                                .'" bgcolor="red">*</td>';
                }
            }else{
                if ($day->format('Y-m-d') != $today->format('Y-m-d')) {
                    echo '<td class="date"></td>';
                }else{
                    echo '<td class="date">'."*".'</td>';
                }
            }
        }
        ?>
        
    </tr>
    <?php endforeach; ?>

</table>