<header>
  <div class="content">
    <?php
    $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_unico = {$_SESSION['id_unico']}");
    if (mysqli_num_rows($sql) > 0) {
      $row = mysqli_fetch_assoc($sql);
    }
    ?>
    <img src="..\imgs\icons/<?php echo $row['img']; ?>" alt="">
    <div class="detalhes">
      <span><?php echo $row['nome'] ?></span>
      <p><?php echo $row['tipo']; ?></p>
    </div>
  </div>
  <a href="../backend/logout.php?php echo $row['id_unico']; ?>" class="logout">Logout</a>
</header>