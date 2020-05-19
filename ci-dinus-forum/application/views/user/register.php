<div class="container-content">
<div class="pure-g">
  <div class="pure-u-1">
    <div class = "padding-box">
      <h2>Register an Account</h2>
      <div class="card">
        <div class="card-body">
    
      <?php echo validation_errors(); ?>
      <?php
        $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'registration-form');
        echo form_open('/register', $attributes); 
      ?>
        <div class="form-group">
          <label for = "username">Username</label> <input class="form-control" id = "username" name = "username" type = "text" placeholder = "Username" value="<?php echo set_value('username'); ?>">
        </div>
        <div class="form-group">
          <label for = "email">Email</label> <input class="form-control" id = "email" name = "email" type = "text"  placeholder = "Email" value="<?php echo set_value('email'); ?>">
        </div>
        <div class="form-group">
          <label for = "password">Password</label> <input class="form-control" id = "password" name = "password" type = "password" placeholder = "Password" value="<?php echo set_value('password'); ?>">
        </div>
        <div class="form-controls">
          <input class="btn btn-primary float-right" type = "submit" value = "Submit">
        </div>
      </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>