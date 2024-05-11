<html><head></head><body>
    <?php 
    foreach($certificates as $certificate){
    $photoUrl = Storage::disk('s3')->url('BFI/certificates/' . $certificate->certificate);
    $photoData = file_get_contents($photoUrl);
    $photoBase64 = base64_encode($photoData);
    ?>
<img src="data:image/png;base64,{{$photoBase64}}" width="1000" height="700">
<?php } ?>
</body></html>