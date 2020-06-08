<div class="container-content">
  <?= $this->session->flashdata('flash'); ?>
  <div class="card mb-3" style="max-width: 700px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="card-img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $this->session->userdata('username'); ?></h5>
          <h5 class="card-title"><?= $this->session->userdata('email'); ?></h5>
          <h5 class="card-title"><?= $this->session->userdata('nim'); ?></h5>

          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>