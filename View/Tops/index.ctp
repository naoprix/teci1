<!-- File: /app/View/Tops/index.ctp -->

<?php echo $this->Html->css('tops'); ?>
<h1><?php echo ($this->element('menu')); ?> </h1>

<h2>ティーイーシーインターナショナル</h2>
<h2> トップ 画面だよー <h2>

    <?php
        $today =new DateTime();
        $period = new DatePeriod(
            new DateTime($today->format('Y-m-d')),
            new DateInterval('P1D'),
            new DateTime($today->format('Y-m-d').'+2weeks 1 second')
        );
    ?>

<div class="heading"> 出張中の人と帰国予定日　</div>

<table class="trip">
    <tr>
        <th>出張者</th>
        <th>出張先</th>
        <th>帰国予定日</th>
    </tr>

    <?php foreach ($plan as $data): ?>
        <tr>
            <td><?php echo $data['StaffSchedule']['name']; ?></td>
            <td><?php echo $data['StaffSchedule']['destination']; ?></td>
            <td><?php echo $data['StaffSchedule']['to']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<div class="heading"> 出張予定の人　</div>

<table class="trip">
    <tr>
        <th>出張予定者</th>
        <th>出張先</th>
        <th>出発予定日</th>
    </tr>

    <?php foreach ($plan as $data): ?>
        <tr>
            <td><?php echo $data['StaffSchedule']['name']; ?></td>
            <td><?php echo $data['StaffSchedule']['destination']; ?></td>
            <td><?php echo $data['StaffSchedule']['from']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>
<p></p>
<p><?php //if (AuthComponent::user('role')=='admin') {
         //   echo $this->Html->link('Add Contract Data', array('controller' => 'contracts', 'action' => 'add')); } ?></p>


