  <?= $this->extend("sub_file/main_view") ?>
  <?= $this->section("title") ?>
  <?= $title ?>
  <?= $this->endSection(); ?>
  <?= $this->section("content") ?>
  <div class="form">
      <form action="<?= base_url('save_department') ?>" method="POST" role="form">
          <legend>Form Add Department</legend>
          <div class="form-group">
              <span id="check_depart" style="color:red; background:transparent"></span>
              <input type="text" class="form-control" name="department_name" id="department" placeholder="Department...">
          </div>

          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
      </form>
  </div>
  <?= $this->endSection(); ?>
  <?= $this->section("scripts") ?>
  <script>
      $(document).ready(function() {
          $('#submit').attr("disabled", true);
          $('#department').change(function() {
              var department_name = $('#department').val();
              if (department_name != '') {
                  $.ajax({
                      url: "<?= base_url('checkdepart') ?>",
                      method: "POST",
                      data: {
                          department_name: department_name,
                      },
                      success: function(data) {
                          $('#check_depart').html(data);
                          $('#submit').attr("disabled", false);
                      }
                  });
              }
          });
      });
  </script>
  <?= $this->endSection(); ?>