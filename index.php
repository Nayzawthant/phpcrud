<?php
    include("includes/header.php");
    include("includes/function.php");
    $dishes = select();
 ?>

    <div class="row">
        <div class="col-12">
            <h3>Home Page</h3>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Search</button>
            </form>
        </div>
        <div class="col-12">
        <table class="table table-dark table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">In_Stock</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($dishes as $dishe):
            ?>
            <tr>
            <th>
                <?php echo $dishe['id']; ?>
            </th>
            <td>
             <?php echo $dishe['name']; ?>
            </td>
            <td>
                <img src="/php/phprefrance/<?php echo $dishe['image']; ?>" alt="" width="30px">
            </td>
            <td>
                <?php echo $dishe['price']; ?>
            </td>
            <td>
                <?php echo $dishe['in_stock']; ?>
            </td>
            <td>
            <?php echo $dishe['created_at']; ?> 
            </td>
            <td>
                <form action="delete.php" method="POST">
                <a href="edit.php?id=<?php echo $dishe['id']; ?>" class="btn text-secondary  btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                </a>
                <input type="hidden" value="<?php echo $dishe['id']; ?>" name="id">
                <button type="submit" class="bg-dark text-secondary" onclick="return confirm('are you sure to delete?')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                    </svg>
                </button>
                </form>
            </td>
            </tr>
            <?php 
                endforeach;
            ?>
        </tbody>
        </table>
        </div>
    </div>

<?php 
    include("includes/footer.php");
?>