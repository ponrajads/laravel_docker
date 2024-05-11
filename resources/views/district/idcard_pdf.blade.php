<!DOCTYPE html>
<html>
<head>
    <title>ID Card</title>
</head>
<body style="background-color: #f4f3f3;">
    <div>
        <img src="{{ Storage::disk('s3')->url($idCardPaths['front']) }}" alt="Front ID Card">
    </div>
    <div style="page-break-before: always;"></div> <!-- Add page break -->
    <div>
        <img src="{{ Storage::disk('s3')->url($idCardPaths['back']) }}" alt="Back ID Card">
    </div>
</body>
</html>
