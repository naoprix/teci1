<!-- app/View/Members/add.ctp -->

<div class="users form">

<h2>出張者の情報を登録してください</h2>

<?php echo $this->Form->create('Member'); ?>
    <fieldset>
        <legend><?php echo __('出張者を追加します'); ?></legend>
        <?php 
        	echo $this->Form->input('staff_code');
        	echo $this->Form->input('name');
        	echo $this->Form->input('group');
        	echo $this->Form->input('staff_order', array('value' => 'z', 'type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('登録')); ?>
</div>