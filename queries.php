<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>
<br>
<br>
<h3 class="text-center">Ask Your Queries here!</h3>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="Database/queriesdb.php" method="post">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" name="query" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Queries</label>
            </div><br>
            <div class="d-grid gap-2">
                <button class="btn btn-success float-right" name="queries_submit" type="submit">POST</button>
            </div>
            </form>
        </div>
    </div>
</div>
<br>
<hr>
<div class="container"> 
    <div class="row">
        <div class="col-md-12">

            <?php 
                $get_queries = "SELECT * FROM queries";
                $dbcon = mysqli_connect("localhost","root","","harvest_world");
                $result = mysqli_query($dbcon, $get_queries);
                if (mysqli_num_rows($result) >= 1) {
                    while($row = mysqli_fetch_array($result)){ ?>
                    
                        <div class="card mb-3">
                            <div class="card-header">
                                <?= $row['user_name']; ?>
                            </div>
                            <div class="card-body">
                                <p class="card-title"><?php echo $row['query']; ?></p>
                                <a data-toggle="collapse" href="#collapseviewreply<?php echo $row['id']; ?>">Comments</a>
                                <a data-toggle="collapse" href="#collapse<?= $row['id']; ?>">Reply</a>
                            </div>
                            <div class="collapse" id="collapse<?php echo $row['id'];?>">
                                <div class="row">
                                    <div class="col-md-12 px-5">
                                        <form action="Database/queriesdb.php" method="post">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" name="reply_query" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Queries</label>
                                            </div><br>
                                            <div class="gap-2">
                                                <input type="hidden" id="query_id" name="query_id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-success" name="queries_reply_submit" type="submit">POST</button>
                                                <button class="btn btn-danger" type="reset">Cancel</button>
                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row collapse" id="collapseviewreply<?php echo $row['id']; ?>"> 
                                <?php 
                                    $_SESSION['reply_id'] = $row['id'];
                                    $id = $_SESSION['reply_id'];
                                    $get_reply_queries = "SELECT * FROM reply_query WHERE query_id=$id";
                                    $dbcon = mysqli_connect("localhost","root","","harvest_world");
                                    $replyresult = mysqli_query($dbcon, $get_reply_queries);
                                    if (mysqli_num_rows($replyresult) >= 1) {
                                        while($row2 = mysqli_fetch_array($replyresult)){ ?>
                                            <div class="col-md-12 px-5 mb-1">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $row2['user_name']; ?></h5>
                                                        <p class="card-text"><?php echo $row2['query']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        } 
                                    } 
                                ?>
                        
                            </div>
                        </div>
                        <?php
                    }
                    
                }
            ?>
        </div>
    </div>
</div>



<?php include("include/footer.php"); ?>