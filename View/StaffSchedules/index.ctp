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
    $day1 = new DateTime('first day of'.$today->format('Y-m-d'));
    $day_3mon = new DateTime('last day of'.$today->format('Y-m-d').'+2month 1 second');
    $period = new DatePeriod(
        new DateTime('first day of'.$today->format('Y-m-d')),
        new DateInterval('P1D'),
        new DateTime('last day of'.$today->format('Y-m-d').'+2month 1 second')
    );

?>

<h2><?php echo '出張予定表 ('.$day1->format('Y年m月').'-'.$day_3mon->format('Y年m月').')' ?></h2>

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
                    echo '<th class="date"></th>';
                }
            }
        ?>
    </tr>

    <?php foreach ($staff as $name): ?>

        <?php
        //まず一列ずつのデータを格納する、名前と日付の配列を作ろうと思います。
        $reportdata = array('name' => $name['Member']['name']);//配列を初期化してみたよ。最初のキーは名前。
        foreach ($period as $day){
            $reportdata += array($day->format('Y-m-d') => "");
        }
        ?>

        <?php if (!empty($name['StaffSchedule'])) : ?>
            <?php foreach ($name['StaffSchedule'] as $data) : ?>

                <?php
                //アサイン期間を表示期間内となるように調整しています
                if ($data['from'] <= $day1->format('Y-m-d')) {
                    if ($data['to'] > $day1->format('Y-m-d')) {
                        $data['from'] = $day1->format('Y-m-d');//表示期間以前のアサイン期間を調整
                    }
                }
                if ($data['to'] >= $day_3mon->format('Y-m-d')) {
                    if ($data['from'] < $day_3mon->format('Y-m-d')){
                       $data['to'] = $day_3mon->format('Y-m-d');//表示期間以以後のアサイン期間を調整
                    }
                }

                if (($data['from'] <= $day_3mon->format('Y-m-d'))
                    and ($data['to'] >= $day1->format('Y-m-d'))){
                    ////表示期間にかかっていたら、$assignperiodというオブジェクトを生成します。    
                    $assignperiod = new DatePeriod(
                        new DateTime($data['from']),
                        new DateInterval('P1D'),
                        new DateTime($data['to'].'+1 second')//ここで1秒追加しないと、1日分少なくカウントされる。                    
                        );
                    ////表示期間内にアサインが無い場合は、オブジェクトを生成しないのです。
                }

                $assigndata = array();
                if (!empty($assignperiod)){
                    ////$assignperiodオブジェクトが生成された場合のみ配列を生成します。
                    foreach ($assignperiod as $assign) {
                        $assigndata += array($assign->format('Y-m-d') => $data['destination']);
                    }
                }
                $reportdata = array_merge($reportdata, $assigndata);
                ?>
            
            <?php endforeach; ?>
        <?php endif; ?>

        <?php
                ////
                //ここで各行のデータを吐き出しています。

                echo '<tr>';
                    echo '<td>'
                            .$this->Html->link($reportdata['name'],
                                array('action'=>'view', $reportdata['name']))
                            .'</td>';//名前だよ

                    if (!empty($reportdata[$today->format('Y-m-d')])) {
                        echo '<td>'.$reportdata[$today->format('Y-m-d')].'</td>';
                    }else{
                        echo '<td></td>';
                    }

                    array_shift($reportdata);
                    foreach ($reportdata as $data) {
                        if (!empty($data)){
                            echo '<td class="assign" title="'.$data.'" bgcolor ="red">';
                            //echo key($data);
                            echo '</td>';
                        }else{
                            echo '<td></td>';
                        }
                    }
                echo '</tr>';
        ?>
    <?php endforeach; ?>
    

</table>

 