  <?= $this->extend("sub_file/main_view") ?>
  <?= $this->section("title") ?>
  <?= $title ?>
  <?= $this->endSection(); ?>
  <?= $this->section("content") ?>
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
      .paginate2{
          margin-left: 40%;
          margin-right:auto;
      }
  </style>
  <div class="table-cover">
      <div class="sub-link"><a href="<?= base_url('add_department') ?>">Add new department</a></div>
      <table class="table">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>Department</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php $n = 1; ?>
              <?php foreach ($department as $row) : ?>
                  <tr>
                      <td><?= $n++ ?></td>
                      <td><?= $row['department_name'] ?></td>
                      <td>
                          <a href="<?= base_url('delete_department/' . $row['id']) ?>" title="delete field"><i class="fa fa-trash"></i></a>
                          <a href="<?= base_url('edit_department/' . $row['id']) ?>" title="edit field"><i class="fa fa-pencil"></i></a>
                      </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <div class="paginate"> <span><?= $pager->links('department') ?></span></div>
      <div class="paginate2"> <span><?= $pager->simplelinks('department') ?></span></div>
  </div>
  <?= $this->endSection(); ?>