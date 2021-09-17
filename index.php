<?php
    include 'action.php';
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ucha Se PHP Project</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>     
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <img src="logo.png" alt="UchaSe logo" width=48>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Добавяне</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Резултати</a>
                </li>
                </ul> -->
            </div>
            <form class="form-inline" action="action_page.php">
            <input class="form-control mr-sm-2" id="myInput" type="text" placeholder="Име на любимеца">
                <select class="custom-select mr-3">
                    <option disabled selected value>Изберете вид</option>
                    <option value="1">   </option>
                    <option value="2">Куче</option>
                    <option value="3">Котка</option>
                    <option value="4">Папагал</option>
                </select>
            </form>
        </nav> 
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h3 class="text-center text-dark mt-2">Тестова задача за позиция</h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center text-info">Добави домашен любимец:</h3>
                    <form action="action.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Име на любимеца" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="info" class="form-control" placeholder="Информация за любимеца" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="type" class="form-control" placeholder="Вид животно" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add" class="btn btn-primary btn-block" value="Запиши">
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <?php
                        $query="SELECT * FROM pets ORDER BY date DESC";
                        $stmt=$conn->prepare($query);
                        $stmt->execute();
                        $result=$stmt->get_result();
                    ?>
                    <h3 class="text-center text-info">Домашни любимци в базата данни</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Име</th>
                            <th>Информация</th>
                            <th>Дата на добавяне</th>
                            <th>Вид</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php
                                while($row=$result->fetch_assoc()){
                            ?>
                            <tr>   
                                <td class="col1"><?= $row['name'];?></td>
                                <td><?= $row['info'];?></td>
                                <td><?= $row['date'];?></td>
                                <td class="col4"><?= $row['type'];?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                var inputVal, selectVal;
                $("#myInput").on("keyup", function() {
                    inputVal = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        if(selectVal){
                            // $(this).toggle($(this).text().toLowerCase().indexOf(inputVal) > -1 && $(this).toggle($(this).text().toLowerCase().indexOf(selectVal) > -1));
                            $("#myTable td.col4:contains('" + selectVal + "') td.col1:contains('" + inputVal + "')").parent().show();
                            $("#myTable td.col4:not(:contains('" + selectVal + "')) td.col1:contains('" + inputVal + "')").parent().hide();
                        } else{
                            // $(this).toggle($(this).text().toLowerCase().indexOf(inputVal) > -1);
                            $("#myTable td.col1:contains('" + inputVal + "')").parent().show();
                            $("#myTable td.col1:not(:contains('" + inputVal + "'))").parent().hide();
                        }
                    });
                });

                $(".custom-select").on("change", function() {
                    selectVal = $(this).find(":selected").text().toLowerCase();
                    $("#myTable tr").filter(function() {
                        // $(this).toggle($(this).text().toLowerCase().indexOf(selectVal) > -1);
                        $(this).toggle($(this).text().toLowerCase().indexOf(selectVal) > -1);
                    });
                });
            });

        </script>
    </body>
</html>