  <?= $this->extend("sub_file/main_view") ?>
  <?= $this->section("title") ?>
  <?= $title ?>
  <?= $this->endSection(); ?>
  <?= $this->section("content") ?>
  <div class="detail-container">
      <div class="main-detail">
              <div class="left-img">
                  <img src="<?= base_url('public') ?>/uploads/<?=$employee['avatar']?>" alt="">
              </div>
              <div class="right-info">
                  <ul>
                      <li><span>ID:</span>
                          <?= $employee['id'] ?>
                      </li>
                      <li><span>Name:</span>
                          <?= $employee['name'] ?>
                      </li>
                      <li><span>Age:</span>
                          <?= $employee['age'] ?>
                      </li>
                      <li><span>Address:</span>
                          <?= $employee['address'] ?>
                      </li>
                      <li><span>Phone Number:</span>
                          <?= $employee['phone_number'] ?>
                      </li>
                      <li><span>Department Name:</span>
                          <?= $employee['department_name'] ?>
                      </li>
                      <li><span>Gender:</span>
                          <?= $employee['gender'] ?>
                      </li>
                      <li><span>Salary Rate:</span>
                          <?= $employee['salary_rate'] ?>
                          $
                      </li>
                      <li><span>Identify Number:</span>
                          <?= $employee['identify_number'] ?>
                      </li>
                      <span id="return"><a href="<?=base_url('employee_view')?>">Return View</a></span>
                  </ul>
              </div>
      </div>
  </div>
  <?= $this->endSection(); ?>