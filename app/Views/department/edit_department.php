  <?= $this->extend("sub_file/main_view") ?>
  <?= $this->section("title") ?>
  <?= $title ?>
  <?= $this->endSection(); ?>
  <?= $this->section("content") ?>
  <div class="form">
      
      <form action="<?=base_url('update_department/'.$department['id'])?>" method="POST" role="form">
          <legend>Form Add Department</legend>
          <div class="form-group">
              <label for="">Department</label>
              <input type="text" class="form-control" name="department_name" value="<?php echo $department['department_name']?>"placeholder="">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
  </div>
  <?= $this->endSection(); ?>