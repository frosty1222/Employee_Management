  <?= $this->extend("sub_file/main_view") ?>
  <?= $this->section("title") ?>
  <?= $title ?>
  <?= $this->endSection(); ?>
  <?= $this->section("content") ?>
  <style>
      select {
          width: 100%;
          height: 20px;
      }

      #gender {
          width: 30px;
      }
  </style>
  <div class="form">
      <form action="<?= base_url('save_employee') ?>" method="POST" role="form" enctype="multipart/form-data">
          <legend>Add new Employee</legend>

          <div class="form-group">

              <input type="text" class="form-control" name="name" placeholder="Name...">
          </div>
          <div class="form-group">
              <input type="date" class="form-control" name="birth_of_date" placeholder="Birth_of_date...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="address" placeholder="Address...">
          </div>
          <div class="form-group">
              <span id="phone" style="color:#fff;background-color:transparent"></span>
              <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number...">
          </div>
          <div class="form-group">
              <lable for="">Department_id</lable>
              <select name="department_name">
                  <?php foreach ($department->getResult() as $key => $value) : ?>
                      <option value="<?= $value->department_name ?>"><?= $value->department_name ?></option>
                  <?php endforeach ?>
              </select>
          </div>
          <div class="form-group">
              <input name="gender" id="gender" type="radio" value="male" />Male
              <input name="gender" id="gender" type="radio" value="female" />Female
              <input name="gender" id="gender" type="radio" value="another" />Another
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="salary_rate" placeholder="Salary rate...">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="identify_number" placeholder="Identify number...">
          </div>
          <div class="form-group">
              <input type="file" class="form-control" name="avatar" placeholder="choose file...">
          </div>
          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
      </form>
  </div>
  <?= $this->endSection(); ?>
  <?= $this->section("scripts") ?>
  <script>
      $(document).ready(function() {
          $('#submit').attr("disabled", true);
          $('#phone_number').change(function() {
              var phone_number = $('#phone_number').val();
              if (phone_number != '') {
                  $.ajax({
                      url: "<?= base_url('checkuserphone') ?>",
                      method: "POST",
                      data: {
                          phone_number: phone_number,
                      },
                      success: function(data) {
                          $('#phone').html(data);
                          $('#submit').attr("disabled", false);
                      }
                  });
              }
          });
      });
  </script>
  <?= $this->endSection(); ?>