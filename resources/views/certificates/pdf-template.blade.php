<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate</title>
  <style>
    @page {
      size: A4 landscape;
      margin: 0;
    }
    body {
      font-family: 'Georgia', serif;
      margin: 0;
      padding: 40px;
      background: linear-gradient(135deg, #0a1628 0%, #1a3260 100%);
      color: #ffffff;
      text-align: center;
    }
    .certificate-container {
      width: 100%;
      min-height: 800px;
      border: 10px solid #f59e0b;
      padding: 60px;
      background: rgba(255, 255, 255, 0.05);
      position: relative;
    }
    .certificate-title {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #f59e0b;
      text-transform: uppercase;
      letter-spacing: 3px;
    }
    .certificate-subtitle {
      font-size: 18px;
      margin-bottom: 60px;
      color: rgba(255,255,255,0.8);
    }
    .recipient-name {
      font-size: 36px;
      margin: 40px 0;
      color: #ffffff;
      font-weight: bold;
    }
    .certificate-type {
      font-size: 24px;
      margin-bottom: 40px;
      color: #f59e0b;
    }
    .date {
      font-size: 16px;
      margin-top: 60px;
      color: rgba(255,255,255,0.7);
    }
    .signatures {
      margin-top: 80px;
      display: flex;
      justify-content: space-around;
    }
    .signature-item {
      text-align: center;
    }
    .signature-line {
      width: 150px;
      border-bottom: 2px solid #ffffff;
      margin: 0 auto 10px auto;
    }
  </style>
</head>
<body>
  <div class="certificate-container">
    <h1 class="certificate-title">Certificate of Excellence</h1>
    <p class="certificate-subtitle">This certificate is proudly presented to</p>
    <div class="recipient-name">{{ $name }}</div>
    <p class="certificate-type">{{ $type }}</p>
    <p class="date">Issued on: {{ \Carbon\Carbon::parse($date)->format('F d, Y') }}</p>
    <div class="signatures">
      <div class="signature-item">
        <div class="signature-line"></div>
        <p>Sr. Admin</p>
      </div>
      <div class="signature-item">
        <div class="signature-line"></div>
        <p>TMCS Leadership</p>
      </div>
    </div>
  </div>
</body>
</html>
