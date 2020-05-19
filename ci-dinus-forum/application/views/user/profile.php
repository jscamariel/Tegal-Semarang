<div class="container-content">
<div class="pure-g">
  <div class="pure-u-1 pure-u-md-3-8">
    <div class = "padding-box">
      <h2><?php echo $profile_user['username']; ?>'s Profile</h2>
      <div class="pure-g">
        <div class="pure-u-1-2">
          <div class = "avatar-padding">
            <?php if($profile_user_meta['avatar']) : ?>
              <img src = "/assets/img/avatars/<?php echo $profile_user_meta['avatar']; ?>" class = "pure-img">
            <?php else : ?>
              <img src = "/assets/img/avatars/default.jpg" class = "pure-img">
            <?php endif; ?>
          </div>
        </div>
        <div class="pure-u-1-2">
          <p><a href = "<?php echo htmlentities($profile_user_meta['website'], FALSE, 'UTF-8'); ?>" target = "_blank"><?php echo htmlentities($profile_user_meta['website'], FALSE, 'UTF-8'); ?></a></p>
          <p><?php echo htmlentities($profile_user_meta['about'], FALSE, 'UTF-8'); ?></p>
          <?php if($this->session->userdata('id') !== $profile_user['id'] && $this->session->userdata('id')) : ?>
            
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-1-4">
    <?php include_once dirname(__FILE__) .  '/../templates/sidebar.php'; ?>
  </div>
</div>
</div>