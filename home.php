<?php include('header.php'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Rwo php update Image</h4>
                </div>
                <div class="card-body">
                    <table class="table table-success table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $connection = mysqli_connect('localhost', "root", "", "image-crud");

                                $fetch_image_query = "SELECT * FROM students";
                                $run_image_query_run = mysqli_query($connection, $fetch_image_query);

                                if(mysqli_num_rows($run_image_query_run) > 0)
                                {
                                    foreach($run_image_query_run as $row)
                                    {
                                        // echo $row['id'];
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td>
                                                    <img src="<?php echo "uploads/".$row['image']; ?>" alt="Student IMage" height="100" width="100">
                                                </td>
                                                <td>
                                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <tr aria-colspan="5">No Record Found</tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>