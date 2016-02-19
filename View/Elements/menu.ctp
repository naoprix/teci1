<!-- File: /app/View/Elements/menu.ctp -->

<head>
<?php //echo ($this->Html->css('mycss.css')); ?>
</head>

<body>
<div id="login_status"><?php 
//    if (AuthComponent::user()) {
//        echo 'User: '. AuthComponent::user(['username']);
//        echo '  '. $this->Html->link('[Logout]', array('controller'=>'Users', 'action'=>'logout'));
//    }else{
//        echo $this->Html->link('[Login]', array('controller'=>'Users', 'action'=>'login'));    } 
    ?></div>

<div id="sidebar">
<?php //$index_list = $this->requestAction(array('controller'=>'Contracts', 'action'=>'index_list')); ?>
<?php //foreach ($index_list as $data): ?>
    <?php // $code = $data['Contract']['code']; ?>

        <div id="menu"><?php //echo 'Package '. $code ; ?></div>
        <div id="submenu"><?php echo $this->Html->link('トップ', 
                                array('controller'=>'Tops', 
                                    'action'=>'index')); ?><br></div>
        <div id="submenu"><?php echo $this->Html->link('出張予定', 
                                array('controller'=>'StaffSchedules', 
                                    'action'=>'index')); ?><br></div>

                            
<?php //endforeach; ?>


</div>
</body>