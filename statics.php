<?php
include "functions/database.php";
include "functions/count.php";
include "admin/functions/time.php";

$data = $db->query("SELECT * FROM settings");
$info = $db->fetch_array($data);

$ads = $db->query("SELECT * FROM ads");
$ads_info = $db->fetch_array($ads);
?>
<!DOCTYPE html>
<html class="full" lang="en">

<head>
    <?php
    $pageName = "Thống kê rút link";
    include "functions/header.php";
    ?>
    <style>
        .nav-tabs>li,
        .nav-pills>li {
            float: none;
            display: inline-block;
        }

        .nav-tabs {
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    include "functions/menu.php";
    ?>
    <div class="container">
        <div class="row logo">
            <div class="col-lg-12" style="text-align:center">
                <?php
                include "functions/logo.php";
                include "functions/darkmode.php";
                ?>
            </div>
        </div>
    </div>
    <div class="container animated fadeIn">

        <div class="col-lg-8 col-lg-offset-2">
            <ul class="nav nav-tabs statics-tabs">
                <li class="active"><a href="#new" data-toggle="tab">Mới nhất</a></li>
                <li class=""><a href="#pop" data-toggle="tab">Click nhiều</a></li>
                <li class=""><a href="#rec" data-toggle="tab">Vừa xem</a></li>
                <li class=""><a href="#find" data-toggle="tab">Tìm link</a></li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="row" style="margin-top:-10px">
                        <div class="table-responsive">
                            <table id="file" class="statics table table-bordered table-striped table-hover">

                                <?php
                                $result = $db->query("SELECT * FROM links WHERE pass = '' ORDER BY date DESC LIMIT 10 ");
                                ?>
                                <thead>
                                    <tr>
                                        <th>URL</th>
                                        <th>Short Link</th>
                                        <th>Ngày tạo</th>
                                        <th>Thống kê</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $db->fetch_array($result)) {
                                        $count01 = mb_strlen($row['URL']);
                                        if ($count01 > 50) {
                                            $myurl =  substr($row['URL'], 0, 50) . "...";
                                        } else {
                                            $myurl = $row['URL'];
                                        }
                                    ?>

                                        <tr class="record">
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
                                                    <div style="height:100%;width:100%">
                                                        <?php echo $myurl; ?>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
                                                    <div style="height:100%;width:100%">
                                                        <?php echo $row['link']; ?>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><?php echo time_ago($row['date']); ?></td>
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/stats.php?id=' . $row['link']; ?>" target="_blank">
                                                    <div class="fa fa-signal" style="height:100%;width:100%">
                                                        Xem
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pop">
                    <div class="row" style="margin-top:-10px">
                        <div class="table-responsive">
                            <table id="file" class="statics table table-bordered table-striped table-hover">

                                <?php
                                $result = $db->query("SELECT * FROM links WHERE pass = '' ORDER BY hits DESC LIMIT 10 ");
                                ?>
                                <thead>
                                    <tr>
                                        <th>URL</th>
                                        <th>Link</th>
                                        <th>Created</th>
                                        <th>Stats</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $db->fetch_array($result)) {
                                        $count01 = mb_strlen($row['URL']);
                                        if ($count01 > 50) {
                                            $myurl =  substr($row['URL'], 0, 50) . "...";
                                        } else {
                                            $myurl = $row['URL'];
                                        }
                                    ?>

                                        <tr class="record">
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
                                                    <div style="height:100%;width:100%">
                                                        <?php echo $myurl; ?>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
                                                    <div style="height:100%;width:100%">
                                                        <?php echo $row['link']; ?>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><?php echo time_ago($row['date']); ?></td>
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/stats.php?id=' . $row['link']; ?>" target="_blank">
                                                    <div class="fa fa-signal" style="height:100%;width:100%">
                                                        Stats
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="rec">
                    <div class="row" style="margin-top:-10px">
                        <div class="table-responsive">
                            <table id="file" class="statics table table-bordered table-striped table-hover">

                                <?php
                                $result = $db->query("SELECT * FROM links WHERE pass = '' ORDER BY last_visit DESC LIMIT 10 ");
                                ?>
                                <thead>
                                    <tr>
                                        <th>URL</th>
                                        <th>Link</th>
                                        <th>Created</th>
                                        <th>Stats</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $db->fetch_array($result)) {
                                        $count01 = mb_strlen($row['URL']);
                                        if ($count01 > 50) {
                                            $myurl =  substr($row['URL'], 0, 50) . "...";
                                        } else {
                                            $myurl = $row['URL'];
                                        }

                                    ?>

                                        <tr class="record">
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
                                                    <div style="height:100%;width:100%">
                                                        <?php echo $myurl; ?>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/' . $row['link']; ?>" target="_blank">
                                                    <div style="height:100%;width:100%">
                                                        <?php echo $row['link']; ?>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><?php echo time_ago($row['date']); ?></td>
                                            <td>
                                                <a href="<?php echo $info['URL'] . '/stats.php?id=' . $row['link'];
                                                            $db->close_connection(); ?>" target="_blank">
                                                    <div class="fa fa-signal" style="height:100%;width:100%">
                                                        Stats
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="find">
                    <div class="row search-box">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <input id="search-field" class="form-control cz-shorten-input" name="searchlink" value="" placeholder="Nhập slug để tìm" type="text" data-validation-error-msg=" ">
                                <span class="input-group-btn">
                                    <button class="btn btn-large btn-primary cz-shorten-btn" type="submit" id="btnFind">Tìm</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <label id="lblError" for="" class="text-danger">Không có dữ liệu</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tblFindResult" class="statics table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>URL</th>
                                        <th>Link</th>
                                        <th>Created</th>
                                        <th>Stats</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        const HOST = "https://go1.day/";
        const API_FIND_ENDPOINT = `${window.location.href}/api-find.php?search=`;
        const oResultTable = $("#tblFindResult");
        const oLblError = $("#lblError");
        const LEO_KIT = {
            init: function() {
                document.getElementById('btnFind').addEventListener('click', () => LEO_KIT.find());
                document.getElementById('search-field').addEventListener("keyup", function(event) {
                    if (event.key === "Enter") {
                        LEO_KIT.find()
                    }
                });
                oResultTable.hide();
                oLblError.hide();
            },
            find: function() {
                const search = $("#search-field").val();
                console.log("Search:", search);
                const xhr = new XMLHttpRequest();
                xhr.open('GET', './api-find.php?search=' + search, true);
                xhr.onload = function() {
                    console.log("Load Json Status", xhr.status);
                    if (xhr.status === 200) {
                        try {
                            const resData = JSON.parse(xhr.responseText);
                            LEO_KIT.updateData(resData);
                        } catch (err) {
                            alert("Can not load JSON content! Please contact Admin");
                            console.log("Parse JSON failed: ", err);
                        }
                    }
                };
                xhr.send();
            },
            updateData: function(resData) {

                if (!resData.data) {
                    oLblError.show()
                    oResultTable.hide();
                    return;
                }
                const jsonData = resData.data;
                oLblError.hide()
                oResultTable.show();
                const tableBody = document.querySelector("#tblFindResult tbody");
                tableBody.innerHTML = '';
                for (let i = 0; i < jsonData.length; i++) {
                    let row = tableBody.insertRow();

                    let urlCell = row.insertCell(0);
                    let linkCell = row.insertCell(1);
                    let dateCell = row.insertCell(2);
                    let statsCell = row.insertCell(3);

                    urlCell.innerHTML = '<a href="' + jsonData[i].URL + '" target="_blank">' + jsonData[i].URL.substring(0, 50) + '...</a>';
                    linkCell.innerHTML = '<a href="' + HOST + jsonData[i].link + '" target="_blank">' + jsonData[i].link + '</a>';
                    dateCell.textContent = jsonData[i].date;

                    statsCell.innerHTML = '<a href="' + HOST + "stats.php?id=" + jsonData[i].link + '" target="_blank"><div class="fa fa-signal"></div></a>';
                }
            }
        };
        LEO_KIT.init();
    </script>


</body>

</html>