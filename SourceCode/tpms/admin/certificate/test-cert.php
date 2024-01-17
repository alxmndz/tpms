<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baptismal Certificate</title>
    <link rel="icon" type="image/x-icon" href="../../assets/icons/team_icon/admin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
    <style>
        @import url('https://fonts.cdnfonts.com/css/tr-dauphin');
        @import url('https://fonts.googleapis.com/css2?family=Bitter&family=Montserrat&family=Poppins&family=Raleway&family=Varela+Round&display=swap');

        h5 {
            font-family: 'TR Dauphin', sans-serif;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 12px; /* Adjust font size for printing */
            }

            .container-fluid {
                width: 50%; /* Set the width to 50% of the paper */
                margin: 0;
                padding: 0;
            }

            .card-body {
                page-break-before: always;
                margin: 0;
                padding: 0;
            }

            .certificate {
                border: 2px solid black;
                padding: 5%; /* Use percentage-based padding for responsiveness */
                text-align: center;
                margin-top: 30px;
                width: 100%;
            }

            .certificate-title {
                margin-bottom: 5%; /* Use percentage-based margin for responsiveness */
            }

            .certificate-content {
                margin-top: 5%;
            }

            .baptized-by {
                margin-top: 5px;
            }

            .left-side,
            .right-side {
                margin: 0;
                padding: 0;
            }

            .noPrint {
                display: none;
            }

            /* Remove URL and page number */
            @page {
                margin: 0;
            }

            body::after {
                content: none !important;
            }

            body::before {
                content: none !important;
            }

            /* Additional elements to hide when printing */
            .btn,
            .navbar,
            .footer {
                display: none;
            }
            .certificate-title {
                display: flex;
                justify-content: center;
                margin-bottom: 5%;
                text-align: center;
            }

            .certificate-title h2,
            .certificate-title h5 {
                margin: 0;
                white-space: nowrap; /* Prevent text from breaking to the next line */
            }
            .certificate-content h5,
            .certificate-content h4 {
                margin: 0;
                font-size: 1em; /* Example: Set font size to the default size */
            }

            .baptized-by h5 {
                margin: 0;
                font-size: 0.8em; /* Example: Set font size to 80% of the default size */
            }

            @page {
            margin: 0;
            }

            body::after {
                content: none !important;
            }

            body::before {
                content: none !important;
            }
            
        }
    </style>
</head>

<body>

    <?php
    include_once '../../php/dbconn.php';
    $result = mysqli_query($conn, "SELECT * FROM certbap WHERE id='" . $_GET['id'] . "'");
    $row = mysqli_fetch_array($result);
    ?>

    <div class="container-fluid">
        <button class="btn btn-success btn-sm mb-2 mt-3 noPrint" onclick="printCertificate()"><i class="fas fa-print"></i> Print</button>
        <button class="btn btn-danger btn-sm mb-2 mt-3 noPrint" onclick="back()"><i
                class="fas fa-right-from-bracket"></i> Return</button>
        <div class="card-body mb-5" style="text-align: center;">
            <div id="certificate" class="landscape">
                <div class="certificate" style="border: 2px solid black; padding: 100px;">
                    <div class="certificate-title" style="text-align: center; margin-right: 150px;">
                    <div class="text-center">
                        <div class="row justify-content-center align-items-center">
                            <!-- Logo on the left of the Text -->
                            <div class="col-6 text-end">
                                <img src="../../assets/icons/logo.png" alt="Logo" class="img-fluid rounded-circle" style="width: 40px;">
                            </div>

                            <!-- Text -->
                            <div class="col-6 text-start">
                                <h2 class="fw-bold" style="font-family: 'TR Dauphin', sans-serif; font-size: 24px;">Baptismal Certificate</h2>
                                <h5 class="fw-bold" style="font-family: 'Times New Roman', Times, serif; font-size: 15px;">Saint Vincent Ferrer Parish</h5>
                            </div>
                        </div>
                    </div>
                    </div>
                    <hr>

                    <div class="certificate-content" style="margin-top: 30px;">
                        <h5 class="fw-bold">This is to certify that</h5>
                        <h4 class="fw-bold"
                            style="font-family: 'TR Dauphin', sans-serif; text-transform: uppercase; font-size: 20px;">
                            <?php echo strtoupper($row['name']); ?>
                        </h4>
                        <div class="mt-3" style="font-family: 'TR Dauphin', sans-serif;">
                            <h5>Child of <?php echo $row['fatherName']; ?></h5>
                            <h5>and <?php echo $row['motherName']; ?></h5>
                            <h5>Born in <?php echo $row['birthPlace']; ?></h5>
                            <h5>on the <?php echo date("F j, Y", strtotime($row["birthDate"])); ?></h5>
                            <h5>has received</h5>
                            <h4><b style="font-family: 'TR Dauphin', sans-serif; font-size: 20px;"
                                    class="mt-3">The Holy Sacrament of Baptism</b></h4>
                            <h5>according to the rite of the Roman Catholic Church</h5>
                            <div class="mt-5">
                                <h5>on the <b><?php echo date("F j, Y", strtotime($row["birthDate"])); ?></b></h5>
                                <h5>By the <?php echo $row['priest']; ?></h5>
                                <h5>The sponsors being <?php echo $row['sponsor1']; ?></h5>
                                <h5>and <?php echo $row['sponsor2']; ?></h5>
                            </div>
                            <div class="mt-5">
                                <h5>As appears on the Baptismal Register No. <?php echo $row['id']; ?> of this
                                    church.</h5>
                            </div>
                        </div>
                    </div>

                    <div class="baptized-by mt-5">
                        <div class="left-side" style="float: left; margin-left: 20px;">
                            <h5>
                                Date Issued: <?php echo date("M d, Y", strtotime($row["generatedDate"])); ?>
                            </h5>
                            <h5>
                                Purpose: For Record/Reference
                            </h5>
                        </div>
                        <div class="right-side"
                            style="float: right; margin-right: 20px;margin-left: 50px;">
                            <h5 class="fw-bold">
                                Rev. Fr. Leo Edgardo Villostas
                            </h5>
                            <h5 class="fw-bold">Parish Priest</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printCertificate() {
            window.print();
        }

        function back() {
            // Your back function implementation
            // You can use window.history.back() or other navigation logic
        }

        document.addEventListener("DOMContentLoaded", function () {
            var printButton = document.querySelector('.print-btn');
            printButton.addEventListener('click', printCertificate);
        });
    </script>

