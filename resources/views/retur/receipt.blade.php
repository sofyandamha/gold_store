<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda Terima Retur</title>
</head>
<body>
    <h1>Tanda Terima Retur</h1>
    <p>ID Barang: {{ $retur->item_id }}</p>
    <p>Nomor Tanda Terima: {{ $retur->receipt_number }}</p>
    <p>Tanggal: {{ $retur->created_at }}</p>
    
</body>

</html>
