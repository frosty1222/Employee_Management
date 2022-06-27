  <?= $this->extend("sub_file/main_view") ?>
  <?= $this->section("title") ?>
  <?= $title ?>
  <?= $this->endSection(); ?>
  <?= $this->section("content") ?>
  <div class="table-cover">
      <style>
          li {
              background-color: #4CAF50;
              /* Green */
              border: none;
              color: white;
              padding: 7px 25px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
          }

          li a {
              color: black;
              text-decoration: none;
          }

          .paginate {
              margin-top: 10px;
          }

          .paginate2 {
              margin-left: 40%;
              margin-right: auto;
          }

          .clear {
              clear: both;
          }
      </style>
      <table class="table">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Birth Of Date</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Department_id</th>
                  <th>Gender</th>
                  <th>Salary Rate</th>
                  <th>Identify Number</th>
                  <th>Avatar</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php $n = 1; ?>
              <?php foreach ($employee as $row) : ?>
                      <tr>
                          <td><?= $n++ ?></td>
                          <td><?= $row['name'] ?></td>
                          <td><?= $row['age'] ?></td>
                          <td><?= $row['address'] ?></td>
                          <td><?= $row['phone_number'] ?></td>
                          <td><?= $row['department_name'] ?></td>
                          <td><?= $row['gender'] ?></td>
                          <td><?= $row['salary_rate'] ?></td>
                          <td><?= $row['identify_number'] ?></td>
                          <td><img src="<?= base_url('public') ?>/uploads/<?= $row['avatar'] ?>" alt="" width="50px" height="50px"></td>
                          <td>
                              <a href="<?= base_url('delete_employee/' . $row['id']) ?>"><i class="fa fa-trash"></i></a>
                              <a href="<?= base_url('edit_employee') ?>/<?= $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                          </td>
                      </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <div class="clear"></div>
      <div class="pagination1">
          <div class="paginate"> <span><?= $pager->links('employee') ?></span></div>
          <div class="paginate2"> <span><?= $pager->simplelinks('employee') ?></span></div>
      </div>
  </div>
  <?= $this->endSection(); ?>