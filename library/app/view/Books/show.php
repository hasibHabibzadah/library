<?php require APPROOT . "/view/inc/header.php"; ?>
<?php require APPROOT . "/view/inc/nav.php"; ?>

<div class="container-fluid">
    <table class="table table-hover mt-3 w-75 mx-auto">

        <thead>
            <tr>
                <th>#</th>
                <th>Book ISBN</th>
                <th>Book Name</th>
                <th>Book Author</th>
                <th>Book Edition</th>
                <th>Book published Year</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $x = 0;
            foreach ($data['book_list'] as $key) :
            ?>
                <tr>
                    <th><?php echo ++$x?></th>
                    <td><?php echo $key->isbn ?></td>
                    <td><?php echo $key->book_name ?></td>
                    <td><?php echo $key->book_author ?></td>
                    <td><?php echo $key->book_edition ?></td>
                    <td><?php echo $key->published_year ?></td>
                    <td><a href="<?php echo URLROOT ?>/books/update/<?php echo $key->id ?>" class="btn btn-primary">Update</a></td>
                    <td>
                        <form class="pull-right" action="<?php echo URLROOT ?>/Books/delete/<?php echo $key->id?>" method="post">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>


                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</div>

<?php require APPROOT . "/view/inc/footer.php"; ?>