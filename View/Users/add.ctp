<!-- app/View/Users/add.ctp -->

<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('ユーザを追加します'); ?></legend>
        <?php 
        	echo $this->Form->input('staff_code');
        	echo $this->Form->input('name');
        	echo $this->Form->input('username');
	        echo $this->Form->input('password');
            echo $this->Form->input('auth', array('value' => 'user', 'type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('登録')); ?>
</div>
