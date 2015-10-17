<div class="block_item">
    <div class="content">
        <h1 class="title">Đăng nhập</h1>
        <?php echo $this->Session->flash('auth'); ?>
        <div class="clear"></div>
        <?php echo $this->Form->create('User',array('inputDefaults'=>array('label'=>false))) ?>    
            <div class="contact_form">
            <div class="contact_content form">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="title">Tên đăng nhập: (<span>*</span>)</td>
                            <td colspan="2">
                            <?php echo $this->Form->input('username',array('size'=>'40' ,'maxlength'=>'30')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Mật khẩu: (<span>*</span>)</td>
                            <td>
                            <?php echo $this->Form->input('password',array('type'=>'password','size'=>'40' ,'maxlength'=>'50')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php echo $this->Form->button('Đăng nhập',array('type'=>'submit','class'=>'input_button')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Nếu bạn chưa co tài khoản,vui lòng nhấn vào chữ <?php echo $this->Html->link('đăng ký','/dang-ky') ?> để đăng ký tài khoản và tiếp tục sử dụng các dịch vụ của hệ thống.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo $this->Form->end() ?>
    </div>
</div>