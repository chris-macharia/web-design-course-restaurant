<?php include('partials/menu.php') ?>

<!-- Main content section starts -->
<div class="main-content">
  <div class="wrapper">
    <h1> MANAGE CATEGORY</h1>

    <br /> <br /> <br />

    <?php
    if (isset($_SESSION['add']))
    {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    ?>

    <br /> <br /> <br />

    <!-- Button to Add Admin -->
    <button class="btn-primary">
      <a href="<?php echo HOMEURL ?>admin/add-category.php">Add category</a>
    </button>

    <br /> <br /> <br />

    <!-- Table to diplay  All admins in the D.B -->
    <table class="tbl-full">
      <tr>
        <th>#</th>
        <th>Full name</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>

      <tr>
        <td>1.</td>
        <td>Chris Macharia</td>
        <td>Chris Macharia</td>
        <td>
          <button class="btn-secondary" id="update-admin-btn">
            <a href="#">Update admin</a>
          </button>
          <button class="btn-danger">
            <a href="#">Delete admin</a>
          </button>
        </td>
      </tr>
    </table>
  </div>
</div>
<!-- Main section ends -->

<?php include('partials/footer.php') ?>