<!-- Main content -->
<section class="content">
<?php $this->load->view('layouts/_alert') ?>
<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img style="height: 10rem;" class="profile-user-img img-responsive img-circle" src="<?= base_url("images/about/$about->image")?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?=$about->name?></h3>

        <p class="text-muted text-center"><?= $about->profile?></p>

        <strong><i class="fa fa-book margin-r-5"></i> social media</strong>

        <p class="text-muted">
            <?= $about->whatsapp?> <br>
            <?= $about->github?> <br>
            <?= $about->email?>
        </p>

        <hr>

        <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

        <p class="text-muted"><?=$about->address?></p>

        <hr>

        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

        <p>
        <?php 
            foreach($skills as $row) :
        ?>

          <span class="label label-<?= $row->color;?>"><?=$row->title;?></span>

        <?php endforeach; ?>
        </p>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#aboutme" data-toggle="tab">About Me</a></li>
        <li><a href="#settings" data-toggle="tab">Settings</a></li>
      </ul>

      <div class="tab-content">
        <div class="active tab-pane" id="aboutme">
          <form class="form-horizontal" action="<?= base_url('about/aboutme')?>" method="post">
            <input type="hidden" name="id" value="<?= $about->id ?>">
            <div class="form-group">
              <label for="inputAbout" class="col-sm-2 control-label">About Me</label>
              <div class="col-sm-10">
                <textarea  class="form-control" name="aboutme" id="inputAbout" rows="10" placeholder="Enter your about me"><?= $about->about_me ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
          <form class="form-horizontal" action="<?= base_url('about/edit/'.$about->id)?>" method="post" enctype="multipart/form-data">
            
            <?= isset($about->id) ? form_hidden('id', $about->id) : '' ?>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter your name" value="<?= $about->name ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputAddress" class="col-sm-2 control-label">Address</label>
              <div class="col-sm-10">
                <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Enter your address" value="<?= $about->address ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputProfile" class="col-sm-2 control-label">Profile</label>
              <div class="col-sm-10">
                <input type="text" name="profile" class="form-control" id="inputProfile" placeholder="Enter your profile" value="<?= $about->profile ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputWhatsapp" class="col-sm-2 control-label">Whatsapp</label>
              <div class="col-sm-10">
                <input type="text" name="whatsapp" class="form-control" id="inputWhatsapp" placeholder="Enter your whatsapp" value="<?= $about->whatsapp ?>"></input>
              </div>
            </div>

            <div class="form-group">
              <label for="inputGithub" class="col-sm-2 control-label">Github</label>
              <div class="col-sm-10">
                <input type="text" name="github" class="form-control" id="inputGithub" placeholder="Enter your github" value="<?= $about->github ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter your email" value="<?= $about->email ?>">
              </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Gambar</label>
                <div class="col-sm-10">
                  <input type="file" class="file" name="image" placeholder="Foto" value="<?= $about->image?>">
                  <p class="text-danger">Max-size 1MB</p>
                </div>                
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->