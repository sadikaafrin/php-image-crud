<?php include('header.php'); ?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

            <?php
            if (isset($_SESSION['status']) && $_SESSION !='')
             {
               
                ?>
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well</h4> <?php echo $_SESSION['status']; ?>
                </div>
                <?php
                unset($_SESSION['status']);
            }
            ?>

                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Row php Edit Image Crud</h4>
                    </div>

                    <?php
                        $connection = mysqli_connect('localhost', "root", "", "image-crud");

                        $id = $_GET["id"];
                        $fetch_image_query = "SELECT * FROM students WHERE id ='$id'";
                        $fetch_image_query_run = mysqli_query($connection, $fetch_image_query);

                        if(mysqli_num_rows($fetch_image_query_run) > 0)
                        {
                            foreach($fetch_image_query_run as  $row)
                            {
                                // echo $row['id'];
                                ?>
                                
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                    <div class="row">
                                            <div class="form-group mb-2 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Enter Your Namae">
                                            </div>
                                            <div class="form-group mb-2 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <label for="">Phone Number</label>
                                                <input type="number" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" placeholder="Enter Your Phone Number">
                                            </div>
                                            <div class="form-group mb-2 col-sm-12 col-md-12  col-lg-6 col-xl-6">
                                                <label for="">Email</label>
                                                <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Enter Your Email">
                                            </div>
                                            <div class="form-group mb-2 col-sm-12 col-md-12  col-lg-6 col-xl-6">
                                                <label for="">User Image</label>
                                                <input type="file" name="image" class="form-control">
                                                <input type="hidden" name="image_old" value="<?php echo $row['image'] ?>">
                                                <img src="<?php echo "uploads/".$row['image']; ?>" alt="upload Image" width="100" height="100">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12  col-lg-6 py-2">
                                                <button type="submit" name="update_image" class="btn btn-primary">Update</button>
                                            </div>
                                    </div>
                                    </div>
                                </form>
                                <?php
                            }
                        }
                        else
                        {

                        }
                    ?>


                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php'); ?>