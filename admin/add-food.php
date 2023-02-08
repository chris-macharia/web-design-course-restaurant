<?php include('./partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Food</h1>

    <br><br>

    <form action="" method="POST" enctype="multipart/form-data">

      <table class="tbl-30">

        <tr>
          <td>Title: </td>
          <td>
            <input type="text" name="title" placeholder="Title">
          </td>
        </tr>

        <tr>
          <td>Description: </td>
          <td>
            <textarea name="description" cols="30" rows="5" placeholder="Add some desription of the food"></textarea>
          </td>
        </tr>

        <tr>
          <td>Price: </td>
          <td>
            <input type="number" name="price">
          </td>
        </tr>

        <tr>
          <td>Select Image: </td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>

        <tr>
          <td>Category: </td>
          <td>
            <select name="category">

              <?php
              //Display categories from the DB
              //1.Fetch from DB
              $sql =  "SELECT * FROM tbl_category WHERE active='Yes'";

              $res = mysqli_query($conn, $sql);

              $count = mysqli_num_rows($res);

              if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                  $id = $row['id'];
                  $title = $row['title'];
              ?>

                  <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                <?php
                }
              } else {
                ?>
                <option value="0">No Categories Found</option>
              <?php
              }
              ?>

            </select>
          </td>
        </tr>

        <tr>
          <td>Featured: </td>
          <td>
            <input type="radio" name="featured" value="Yes">Yes
            <input type="radio" name="featured" value="No"> No
          </td>
        </tr>

        <tr>
          <td>Active: </td>
          <td>
            <input type="radio" name="active" value="Yes">Yes
            <input type="radio" name="active" value="No"> No
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Food" class="btn-secondary">
          </td>
        </tr>


      </table>

    </form>
  </div>
</div>


<?php include('./partials/footer.php'); ?>