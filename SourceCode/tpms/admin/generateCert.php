<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body {
    font-family: Arial, sans-serif;
}

.certificate {
    text-align: center;
    width: 80%;
    margin: 0 auto;
    border: 2px solid #000;
    padding: 20px;
    background-color: #f9f9f9;
}

h1 {
    color: #333;
}

h2 {
    color: #555;
}

h3 {
    color: #777;
}

#printButton {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

  </style>
</head>
<body>
    <div class="card">
      <div class="card-body">
        <div class="certificate">
          <h1>Certificate of Achievement</h1>
          <p>This is to certify that</p>
          <h2 id="recipientName">John Doe</h2>
          <p>has successfully completed the course</p>
          <h3 id="courseName">Web Development</h3>
          <p>on <span id="completionDate">October 16, 2023</span></p>
      </div>
      <button id="printButton">Print Certificate</button>
      </div>
    </div>

    <script>
      document.getElementById("printButton").addEventListener("click", function() {
    var printContents = document.querySelector(".certificate").outerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
});

    </script>
</body>
</html>
