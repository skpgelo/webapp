<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title ?> || PPID BBPPKS Bandung</title>
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/img/Kemensos.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <div class="container-fluid px-4">
                        <h1 class="mt-4">[<?= $db ?>]</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                        <div class="col-xl-4">
            <div class="card mb-4">
                                    <div class="card-header">
        <div class="card-body">
        <div class="text-center">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
  <div id="tree"></div>
  <script src="https://balkan.app/js/orgchart.js"></script>
  <script src="<?= base_url(); ?>org/org-chart/orgchart.js"></script>
    <script> 
    var chart = new OrgChart(document.getElementById("tree"), {
        nodeBinding: {
            field_0: "name"
        },
        nodes: [
            { id: 1, pid: 0, name: "Amber McKenzie" },
            { id: 2, pid: 1, name: "Ava Field" },
            { id: 3, pid: 2, name: "Peter Stevens" },
            { id: 4, pid: 2, name: "aAva Field" },
            { id: 6, pid: 4, name: "aaAva Field" },
            { id: 5, pid: 3, name: "aPeter Stevens" }
        ]
    });
    </script>
            </div>
            </div>
            </div>
            </div>
    </div>
    </div>
</body>
</html>