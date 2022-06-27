  <?= $this->extend("sub_file/main_view") ?>
  <?= $this->section("title") ?>
  <?= $title ?>
  <?= $this->endSection(); ?>
  <?= $this->section("content") ?>
  <style>
      li{
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
      .clear{
          clear: both;
      }
  </style>
  <ul class="ul">
      <?php foreach ($employee as $row) : ?>
          <li id="li">
              <img id="img" src="<?= base_url('public') ?>/uploads/<?= $row['avatar'] ?>" alt="" width="173px" height="210px">
              <br>
              <span><?= $row['name'] ?></span>
              <a href="<?=base_url('employee_detail')?>/<?=$row['id']?>"><i class="fa fa-plus fa-2x"></i></a>
          </li>
      <?php endforeach; ?>
  </ul>
  <div class="clear"></div>
  <div class="pagination1">
      <div class="paginate"> <span><?= $pager->links('employee') ?></span></div>
      <div class="paginate2"> <span><?= $pager->simplelinks('employee') ?></span></div>
  </div>
  <?= $this->endSection(); ?>