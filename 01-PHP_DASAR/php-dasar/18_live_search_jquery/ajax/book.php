<?php
require "../functions.php";

$keyword = $_GET["keyword"];
$book = query("SELECT * FROM book WHERE 
                title LIKE '%$keyword%' OR
                author LIKE '%$keyword%' OR
                year LIKE '%$keyword%' OR
                publisher LIKE '%$keyword%'
            ");
?>

<table class="table">
        <thead>
          <tr class="table-info">
            <th scope="col">No</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Year</th>
            <th scope="col">Publisher</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach($book as $books) : ?>
          <?php if($i % 2 == 0) : ?>
          <tr class="table-secondary">
          <?php endif; ?>
            <th scope="row"><?= $i; ?></th>
            <td><img src="assets/<?= $books["cover"]; ?>" alt="error" width="50px"></td>
            <td><?= $books["title"]; ?></td>
            <td><?= $books["author"]; ?></td>
            <td><?= $books["year"]; ?></td>
            <td><?= $books["publisher"]; ?></td>
            <!-- button update delete -->
            <td>
              <a href="ubah.php?id=<?= $books["id"]; ?>" class="btn btn-warning" tabindex="-1" role="button" aria-disabled="true">Update</a>
              
              <a href="hapus.php?id=<?= $books["id"]; ?>" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true" onclick="return confirm('Yakin Hapus?')">Delete</a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>