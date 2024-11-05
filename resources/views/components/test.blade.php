<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Example</title>
  <style>
    /* General styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Footer styles */
    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
      margin-top: auto;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      width: 100%;
    }

    .footer-section {
      flex: 1;
      min-width: 250px;
      margin: 10px;
    }

    .footer-section h2 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .footer-section p {
      font-size: 14px;
      line-height: 1.6;
    }

    .footer-section ul {
      list-style: none;
      padding: 0;
    }

    .footer-section ul li {
      margin-bottom: 8px;
    }

    .footer-section ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 14px;
    }

    .footer-section ul li a:hover {
      text-decoration: underline;
    }

    /* Social media icons */
    .social-icons a {
      margin-right: 10px;
      text-decoration: none;
      color: #fff;
      font-size: 18px;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: #ddd;
    }

    /* Bottom footer */
    .footer-bottom {
      text-align: center;
      padding: 10px;
      font-size: 12px;
      border-top: 1px solid #444;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <!-- Footer HTML -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-section about">
          <h2>About Us</h2>
          <p>We are a team dedicated to providing the best services and information. Follow us on social media to stay updated.</p>
        </div>

        <div class="footer-section links">
          <h2>Quick Links</h2>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>

        <div class="footer-section social">
          <h2>Follow Us</h2>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f">Facebook</i></a>
            <a href="#"><i class="fab fa-twitter">Twitter</i></a>
            <a href="#"><i class="fab fa-instagram">Instagram</i></a>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        &copy; 2024 YourWebsite | Designed by You
      </div>
    </div>
  </footer>

</body>
</html>
