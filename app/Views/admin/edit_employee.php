  <?= $this->extend("sub_file/main_view") ?>
  <?= $this->section("title") ?>
  <?= $title ?>
  <?= $this->endSection(); ?>
  <?= $this->section("content") ?>
  <div class="form">
      <form action="<?= base_url('update_employee/'.$employee['id']) ?>" method="POST" role="form" enctype="multipart/form-data">
          <legend>Add new Employee</legend>

          <div class="form-group">
              <input type="text" class="form-control" name="name" value="<?= $employee['name'] ?>" placeholder="Name...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="birth_of_date" value="<?= $employee['age'] ?>" placeholder="Birth_of_date...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="address" value="<?=$employee['address'] ?>" placeholder="Address...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="phone_number" value="<?=$employee['phone_number'] ?>" placeholder="Phone number...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="department_name" value="<?=$employee['department_name'] ?>" placeholder="Department...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="gender" value="<?=$employee['gender'] ?>" placeholder="Gender...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="salary_rate" value="<?=$employee['salary_rate'] ?>" placeholder="Salary rate...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="identify_number" value="<?=$employee['identify_number'] ?>" placeholder="Identify number...">
          </div>
          <div class="form-group">
              <input type="file" class="form-control" name="avatar" value="<?=$employee['avatar']?>" placeholder="avatar...">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>


  <?= $this->endSection(); ?>