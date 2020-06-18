<div class="container-content">
  <?= $this->session->flashdata('flash'); ?>
  <div class="card mb-3" style="max-width: 600px;">
    <div class="row no-gutters">

      <div class="col-md-8">
        <div class="card-body ">
          <div class="image-profile">
            <img class="img-profile rounded-circle float-left mr-3" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">
            <h5 class="card-title"><?= $user['username']; ?> - <?= $user['nim']; ?></h5>

            <p class="card-text"><small class="text-muted">Join since <?= $user['date_created']; ?></small></p>
            <a href="<?= base_url('user/edit'); ?>">
              <h6 class="ml-4">Edit Profile</h6>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>